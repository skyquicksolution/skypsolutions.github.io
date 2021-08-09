<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Confirmation </title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="co-sm-12">
				<div class="2">
					
				</div>
				<div class="8">
					<h2>Your Details</h2>
					<table border="1">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Password</th>
								<th>Profile</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo e($name); ?></td>
								<td><?php echo e($email); ?></td>
								<td><?php echo e($mobile); ?></td>
								<td><?php echo e($password); ?></td>
								<td><img src="<?php echo e($message->embed(public_path() . '/uploads/'.$profile)); ?>" /> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>
	
</body>
</html><?php /**PATH C:\xampp\htdocs\foreignKeyConcept\resources\views/mail.blade.php ENDPATH**/ ?>