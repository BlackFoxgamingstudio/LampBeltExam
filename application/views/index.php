<html>
<head>
	<title>Login/Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Welcome!</h1>
				<h4><?= $this->session->flashdata('msg') ?></h4>
				<div class="col-sm-6">
					<h2>Register</h2>
					<h4 class="errors"><?= $this->session->flashdata('reg_errors') ?></h4>
					<form action="/register/validation" method="post">
						<div class="form-group">
						<label for="name">Name*</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?= set_value('name') ?>">
						</div>
						<div class="form-group">
						<label for="username">Username*</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="<?= set_value('username') ?>">
						</div>
						<div class="form-group">
						<label for="password_register">Password*</label>
						<input type="password" class="form-control" name="password_register" id="password_register" placeholder="Password">
						<p>*Password should be at least 8 characters</p>
						</div>
						<div class="form-group">
						<label for="confirm_password_register">Confirm Password*</label>
						<input type="password" class="form-control" name="confirm_password_register" id="confirm_password_register" placeholder="Confirm Password">
						</div>
						<button type="submit" class="btn btn-default">Register</button>
					</form>
				</div>
				<div class="col-sm-6">
					<h2>Login Page</h2>
					<h4 class="errors"><?= $this->session->flashdata('log_errors') ?></h4>
					<form action ="/login/validation" method="post">
						<div class="form-group">
							<label for="username_login">Username</label>
						    <input type="username" class="form-control" id="username_login" name="username_login" placeholder="Enter Username">
						</div>
						<div class="form-group">
							<label for="password_login">Password</label>
							<input type="password" class="form-control" id="password_login" name="password_login" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-default">Login</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</body>
</html>