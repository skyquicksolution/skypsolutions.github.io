<?php

namespace App\Http\Controllers;

use App\Models\mainModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Validator,Redirect,Response,File;
//use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\LoginDetails;
use App\Models\Login;
use Carbon\Carbon;
use DB;
use File;
use Mail;
//use Illuminate\Support\Facades\DB;
use Session;
use Redirect; // for Redirect::back()

class mainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('index');
    }

    public function contact() {
        return view('contact');
    }

    public function SaveContact(Request $req) {
        // 'file.*' => 'mimes:doc,pdf,docx,txt,zip,jpeg,jpg,png'
        //'mobile' => 'required|max:12|numeric|digits_between: 0,9',
        //'mobile' => 'required|numeric|min:10|max:10|regex:/^\d{1}-\d{4}-\d{3}$/',
        //required|image|mimes:jpeg,png,jpg,gif,svg|max:2048
        //
        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|email|max:60|unique:users,email',
            'mobile' => 'required|string|max:10|min:10',
            'password' =>'required|string|max:80',
            'gender' => 'required',
            'state' => 'required|not_in:0',
            'city' => 'required|not_in:0',
            'hobbies' => 'required',
            'address' => 'required',
            'file' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ];

        $customMessages = [
        'required' => 'The :attribute field is required.',
        'mobile.required' => 'Plz Enter the valid mobile Number'
        ];

        $validator = Validator::make($req->all(), $rules, $customMessages);
        if ($validator->fails()) {
            $errMsg = $validator->getMessageBag();
            return redirect('contact')->withErrors($errMsg);
        }else {
            $model = new Student;
            $model->name = $req->name;
            $model->email = $req->email;
            $model->mobile = $req->mobile;
            $model->password = $req->password;
            $model->gender = $req->gender;
            $model->hobbies = implode(",", $req->hobbies);
            $model->state = $req->state;
            $model->city = $req->city;
            // get file
           $file = $req->file('file');
           // get file original name
           //echo '<br>';
            $original_name = time().'_'.$req->file->getClientOriginalName();
            //echo '<br>';
            // to send table 
            $model->profile = $original_name;
            // get file extention
            $file_extention = $file->getClientOriginalExtension();
            //echo '<br>';
            // get file path 
            $file_path = $file->getRealPath();
            //echo '<br>';
            // get file size
            $file_size = $file->getSize();
            //echo '<br>';
            // file File Mime Type
            $file_mimes = $file->getMimeType();
            //echo '<br>';

            $model->address = $req->address;
            $model->date = Carbon::now();
            $res = $model->save();
            // move file to destination 
            if (!empty($res)) {

                    $image_path = "public/uploads/".$original_name;
                    if(File::exists($image_path)) {
                       
                    }
              //Move Uploaded File
                $destinationPath = 'public/uploads/';
                $file->move($destinationPath,$original_name);
            }
/*
file uploading
if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
*/
            $last_insertId = DB::table('students')->latest('id')->first();
            // print_r($last_insertId->id);
            $reg_id = $last_insertId->id;
            //echo gettype($reg_id);
            $login = new Login;
            $login->email = $req->email;
            $login->password = $req->password;
            $login->reg_id = $reg_id;
            $login->save();
            $data = [
              'name' => $req->name,
              'email' => $req->email,
              'mobile' => $req->mobile,
              'password' => $req->password,
              'profile' => $req->file('file')->getClientOriginalName()
               ];
            $user['to'] = $req->email;

            Mail::send('mail', $data, function($message) use ($user){
              $message->to($user['to']);
              $message->subject('Registration Confirmation  ');
              $message->sender('rajapurhostproject@gmail.com', 'Er S K Yadav');
              $message->cc('yourskyadav@gmail.com', 'S K Yadav');
              $message->bcc('skyaduvanshi7619@gmail.com', 'Sant Yadav');
              $message->attach('$message->embed(public_path() . '/uploads/'.$profile)');
            });
            return redirect('custom_login')->with('status', 'successfully');
        }
    }

    public function login(Request $req) {
        // get message that is send by redirect('custom_login') 
        $msg = session()->get('msg'); 
        //print_r($msg);
            //return view('login', ['msg' => session()->get('msg')]); // work 
        //return view('login')->with('msg', session()->get('msg')); // work
        return view('login')->withErrors(session()->get('msg'));

    }

    public function login_user(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $user = Login::where([
            ['email', $email],
            ['password', $password],
        ])->get()->toArray();
        //print_r($user);die();
        //$reg_id = $user['reg_id'];
        if (!empty($user)) {
          session([
        'email' => $user[0]["email"],
         'password' => $user[0]["password"],
          'reg_id' => $user[0]["reg_id"],
      ]);
      //print_r($user[0]["email"]);
        return redirect('profile');   
        }else {
            //return view('login', ['msg'=> 'Invalid email id or password']); // work 

            return redirect('custom_login')->with('msg', 'Invalid email id or password');

            // another way
            //return Redirect::back()->withErrors('invalid email or password'); // work

        }
        
    }
    public function profile() {
        return view('profile');
    }
    public function about() {
        return view('about');
    }
    public function edit_user(Request $req) {
        $data = Student::where('id', $req->id)->get(); 
        return json_encode(['result' => $data]); //
        //return (json_encode(array('result' => $data)));
        // then work with $.each(res, function (i, item) { } or 

        //return json_encode($data); 
        // then work with res.forEach(function(i){ alert(i.name)}
    }
    public function updateInfo(Request $req) {
      return json_encode("hi");
      // die();
      // if ($files = $req->file('file')) {
      //       $name = $req->name;
      //       $email = $req->email;
      //       $mobile = $req->mobile;
      //       $password = $req->password;
      //       $gender = $req->gender;
      //       $hobbies = implode(",", $req->hobbies);
      //       $state = $req->state;
      //       $city = $req->city;
      //       $address = $req->address;
      //          // get file
      //      $file = $req->file('file');
      //      // get file original name
      //      //echo '<br>';
      //       $original_name = time().'_'.$req->file->getClientOriginalName();
      //       }else {
      //         $name = $req->name;
      //       $email = $req->email;
      //       $mobile = $req->mobile;
      //       $password = $req->password;
      //       $gender = $req->gender;
      //       $hobbies = implode(",", $req->hobbies);
      //       $state = $req->state;
      //       $city = $req->city;
      //       $address = $req->address;
      //       }
            
      //       $data = ["name" => $name, "email" => $email, "mobile" => $mobile, "password" => $password, "gender" => $gender, "hobbies" => $hobbies, "state" => $state, "city" => $city,"address" =>$address];
      //       $log = ["email" =>$email, "password" => $password];
      //      $res = Student::where('id', $id)->update($data);
      //      $log_res = Login::where('reg_id', $id)->update($log);
            
      // return Redirect::back()->with('status', 'Updated Successfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mainModel  $mainModel
     * @return \Illuminate\Http\Response
     */
    public function show_user(Student $student)
    {
       $info = $student->get();
       //print_r($info);
       //return view('userinfo')->with('data', $info); // string
       return view('userinfo', ['data' => $info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mainModel  $mainModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
       echo "Yes";
    }
public function model() {
    return view('model');
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mainModel  $mainModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mainModel $mainModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mainModel  $mainModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, $id)
    {
        //$res = $student->where('id', $id)->get()->toArray();
        $res = $student::find($id);
            $image_path = "public/uploads/".$res['profile'];  // Value is not URL but directory
            if(File::exists($image_path)) {
            File::delete($image_path); 
            // unlink("uploads/".$image->image_name);
            $del = $student->where('id', $id)->delete();   
            }else {
                $del = $student->where('id', $id)->delete();
            }
        if ($res) {
           return Redirect::back()->with('status', 'Successfully Removed');
        }else {
            return Redirect::back()->with('status', 'Something went wrong');
        }
    }
}
