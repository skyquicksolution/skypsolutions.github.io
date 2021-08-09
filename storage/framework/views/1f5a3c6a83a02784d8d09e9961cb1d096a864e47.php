
<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">

  <?php if(!empty($msg)): ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?php echo e($msg); ?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
<!--or-->
<?php if($errors->any()): ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?php echo e($errors->first()); ?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
	<form action="<?php echo e(url('login_user')); ?>" method="post">
    <?php echo csrf_field(); ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" value="login" name="submit">Submit</button>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foreignKeyConcept\resources\views/login.blade.php ENDPATH**/ ?>