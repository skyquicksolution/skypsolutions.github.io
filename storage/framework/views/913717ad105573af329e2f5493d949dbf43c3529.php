

<?php $__env->startSection('title', 'Contact'); ?>
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
  <form action="<?php echo e(url('SaveContact')); ?>" method="POST" enctype="multipart/form-data">
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
  <input class="form-check-input" type="radio" name="gender" id="male" value="male">
  <label class="form-check-label" for="male">Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="female" value="female">
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
  <input class="form-check-input" type="checkbox" id="chk2" name="hobbies[]" value="cricket">
  <label class="form-check-label" for="cricket">Cricket</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="chk2" name="hobbies[]" value="chess">
  <label class="form-check-label" for="chess">Chess</label>
</div> 
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="chk3" name="hobbies[]" value="cooking">
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
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foreignKeyConcept\resources\views/contact.blade.php ENDPATH**/ ?>