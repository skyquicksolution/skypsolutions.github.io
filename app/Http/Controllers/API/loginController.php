<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Validator;
use App\Models\Loginapi;

class loginController extends Controller
{
    public function login(Request $req) {
    	try {
    		$rules = [
    			'name' => 'required|max:200',
    			'email' => 'required|email|unique:users,email'
    		];

    		$customMsg = [
    			'required' => 'The :attribute field is required',
    			'email.required' => 'The Email Field is required'
    		];

    		$validator = Validator::make($req->all(), $rules, $customMsg);
    		if ($validator->fails()) {
    			$err = $validator->getMessageBag();
    			return Response::json(array('status' => 'error', 'message' => $err))->withHeaders([
    				'Content-Type' => 'application/json',
    				'Accept' => 'application/json'
    			]);
    		}else {
    			$name = $req->name;
    			$email = $req->email;
    			$loginModel = new loginapi;
    			$loginModel->name = $name;
    			$loginModel->email = $email;
    			$loginModel->save();
    			return Response::json(['status' => 'success', 'message' => 'Successfully Inserted '])->withHeaders([
    				'Content-Type' => 'application/json',
    				'Accept' => 'application/json'
    			]);
    			
    		}


    	}catch(QueryException $ex) {
    		return Response::json(['status' => 'error', 'message' => $er->getMessage()])->withHeaders([
    			'Content-Type' => 'application/json',
    			 'Accept' => 'application/json'
    			]);

    	}
    }

    // select Data from table 
    public function selectInfo(Request $req) {
    	try {
    		$data = Loginapi::get();
    		if(count($data) > 0) {
    			return Response::json(['status' => 'success', 'message' => 'Successfully Fatched', 'data' => $data])->withHeaders([
    				'Content-Type' => 'application/json',
    				'Accept' => 'application/json'
    			]);
    		}else {
    			return Response::json(['status' => 'success', 'message' => 'No Data Is Available Now'])->withHeaders([
    				'Content-Type' => 'application/json',
    				'Accept' => 'application/json'
    			]);

    		}

    	}catch(QueryException $ex) {
    		return Response::json(['status' => 'error', 'message' => $ex->getMessage()])->withHeaders([
    			'Content-Type' => 'application/json',
    			'Accept' => 'application/json'
    		]);

    	}

    }

    // Delete Data from table by id
    public function DeleteInfo(Request $req) {
    	try {
    		$rules = [
    			'id' => 'required|numeric'
    		];
    		$validator = Validator::make($req->all(), $rules);
    		if($validator->fails()) {
    			$err = $validator->getMessageBag();
    			return Response::json(['status' => 'success', 'message' =>$err])->withHeaders([
    				'Content-Type' => 'application/json',
    				'Accept' => 'application/json'
    			]);

    		}else {
    			$res = loginapi::where('id', $req->id)->delete();
    			print($res);die();
    		if(count($res) > 0) {
    			return Response::json(['status' => 'success', 'message' => 'Delete Successfully', 'data' => $data])->withHeaders([
    				'Content-Type' => 'application/json',
    				'Accept' => 'application/json'
    			]);
    		}else {
    			return Response::json(['status' => 'success', 'message' => 'No Data Is Available Now'])->withHeaders([
    				'Content-Type' => 'application/json',
    				'Accept' => 'application/json'
    			]);

    		}
    		}

    	}catch(QueryException $ex) {
    		return Response::json(['status' => 'error', 'message' => $ex->getMessage()])->withHeaders([
    			'Content-Type' => 'application/json',
    			'Accept' => 'application/json'
    		]);

    	}

    } 
}
