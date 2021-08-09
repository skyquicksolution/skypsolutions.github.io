

<?php $__env->startSection('title', 'User Info'); ?>
<?php $__env->startPush('style'); ?>
<style type="text/css">
  form {
    width: 70%;
    margin: 0 auto;
}
span {
  color: red;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="container my-4">
  <?php if(!empty($status)): ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?php echo e($status); ?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
<table border="1" width="100%" id="myTable">
  <thead>
  <tr>
    <th>S.No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Profile</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  </thead>
  <tbody>

    <?php if(!empty($data)): ?>
    <?php 

      $a=0;
      ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $a++;
    ?>
    <tr>
      <td class="nr"><?php echo e($user->id); ?></td>
      <td><?php echo e($a); ?></td>
      <td><?php echo e($user->name); ?></td>
      <td><?php echo e($user->email); ?></td>
      <td><img src="<?php echo e(url('public/uploads/'.$user->profile)); ?>" height="100"></td>
      <td class="use-address" style="cursor: pointer;">edit</td>
      <td><a onclick="return confirm('Are you sure?')" href="<?php echo e(url('delete/'.$user->id)); ?>">Delete</a></td>
    </tr>
    <!-- Modal -->
<div class="modal fade" id="myModel"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button"  class="btn-close modClose" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" id="modForm">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
    <span><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email">
    <span><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
  </div>
  <div class="mb-3">
    <label for="number" class="form-label">Mobile Number</label>
    <input type="text" class="form-control" id="mobile" name="mobile">
    <span><?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    <span><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
  </div>
  <div class="mb-3">
    <label for="gender" class="form-label">Gender</label>
    <div class="form-check form-check-inline">
  <input class="form-check-input male" type="radio" name="gender"  value="male">
  <label class="form-check-label " for="male">Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input male" type="radio" name="gender"  value="female">
  <label class="form-check-label" for="female">Female</label>
  <span><?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
</div>
  </div>
  <div class="mb-3">
    <label for="hoby" class="form-label">Hobbies</label>
    <div class="form-check form-check-inline">
  <input class="form-check-input chk" type="checkbox" id="chk2" name="hobbies[]" value="cricket">
  <label class="form-check-label" for="cricket">Cricket</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input chk" type="checkbox" id="chk2" name="hobbies[]" value="chess">
  <label class="form-check-label" for="chess">Chess</label>
</div> 
<div class="form-check form-check-inline">
  <input class="form-check-input chk" type="checkbox" id="chk3" name="hobbies[]" value="cooking">
  <label class="form-check-label" for="cooking">Cooking</label>
  <span><?php $__errorArgs = ['hobbies'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
</div>    
  </div>
  <div class="mb-3">
    <label for="profile" class="form-label">Profile</label>
    <input type="file" class="form-control" id="file" name="file" multiple="multiple">
    <span><?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
  </div>
  <div class="mb-3">
  <label for="state" class="form-label">State</label>
  <select class="form-select" aria-label="Default select example" name="state" id="state">
  <option value="0">select State</option>
  <option value="UP">UP</option>
  <option value="Delhi">Delhi</option>
  <option value="MP">MP</option>
</select>
<span><?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
</div>
<div class="mb-3">
  <label for="city" class="form-label">City</label>
  <select class="form-select" aria-label="Default select example" name="city" id="city">
  <option value="0"> select City</option>
  <option value="Gonda">Gonda</option>
  <option value="Lucknow">Lucknow</option>
  <option value="Basti">Basti</option>
</select>
<span><?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
</div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Address</label>
  <textarea class="form-control" id="address" name="address" rows="3"></textarea>
  <span><?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
</div>
  <button type="submit" class="btn btn-primary" name="submit" id="subBtn">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary modClose" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  </tbody>
</table>
</div>
<script type="text/javascript">
  // to read checked radio value by jquery
  //  var radioValue = $("input[name='gender']:checked").val();
  // jQuery(document).ready(function($){
  $(document).ready(function() {
    $(".use-address").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var id = $row.find(".nr").text(); // Find the text
    // Let's test it out
    //alert(id);
       var ajaxurl = '';
       $.ajax({
            type: 'GET',
            url: 'edit_user/',
            data: {'id' : id},
            headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  },
  success: function (data) {
              //alert(data); // data is array 
              var res = $.parseJSON(data);
              // // res is array 
              //var arrayValues = data.split(',');
              //alert(arrayValues);
              // //data = jQuery.parseJSON(data);
              $.each(res, function (i, item) {
               var trainindIdArray = item[0].hobbies.split(','); // convert array
               //alert(trainindIdArray.length); // find length
               //alert(item[0].id);
               $("#custId").val(item[0].id);
               $("#name").val(item[0].name);
               $("#email").val(item[0].email);
               $("#mobile").val(item[0].mobile);
               $("#password").val(item[0].password);
               // $('input[type=radio][name="gender"][value='+item[0].gender+']').prop('checked', true);
               $('.male[value='+item[0].gender+']').prop('checked', true);
              //$('input[name="hobbies"]').val(item[0].hobbies);
              $.each(trainindIdArray, function(i, val){
              $(".chk[value='" + val + "']").prop('checked', true);
              });
              $("#state").val(item[0].state);
              $("#city").val(item[0].city);
              $("#address").val(item[0].address);

              });

              /*
              res.forEach(function(i){
            alert(i.name);
            });
            */

            // change action when click submit 
          // $("#subBtn").on("click", function(){
          // $('#modForm').attr('action', 'updateInfo?id=' +item[0].id).submit();
          // });
          // end change action 
            },
            error: function () {
                alert('Error')
            }
        });
       
       $('#myModel').modal('show');
//        $('#modClose').on('click', function (e) {
//   $("#modForm").find("input,textarea,select").val('').end()
//   .find("input[type=checkbox], input[type=radio]")
//   .prop("checked", false).end();
// });

// second way worked
$('.modClose').on('click', function () {
  $('#modForm').trigger("reset");
 });

// clear select 
// $('.bd-example-modal-sm').on('hidden.bs.modal', function () { 
//       $(this).find("select").val('').end(); // Clear dropdown content
//       $("ul").empty();   // Clear li content 
// });
}); 

$("#subBtn").on("click", function(){
  var data = {
    name : $("#name").val(),
    email : $("#email").val(),
    mobile : $("#mobile").val(),
    password : $("#password").val(),
    gender : $("#gender").val(),
    hobbies : $("#hobbies").val(),
    profile : $("#file").val(),
    state : $("#state").val(),
    city : $("#city").val(),
    address : $("#address").val()
  };
 // alert(data.profile);
$.ajax({
            type: 'PUT',
            url: 'update_user/',
            data: data,
            headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
  },
  success: function (response) {
    alert(response);
  }
});
  
          // $('#modForm').attr('action', 'updateInfo?id=' +item[0].id).submit();
           });

  });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foreignKeyConcept\resources\views/userinfo.blade.php ENDPATH**/ ?>