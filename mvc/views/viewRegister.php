<!DOCTYPE html>
<html>
<head>
<title>Page Register</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo constant("HOST")?>/mvc/public/css/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
	<?php
		switch ($data["status"]) {
			case 0:
				$message = '';
				break;
			case 1:
				$message = 'The username has already been taken';
				break;
			case 3:
				$message = 'The username and password fields is required';
				break;
			default:
				$message = 'Register error';
				break;
		}
	?>
    <div class="container mt-5">
        <h2>Register form</h2>
        <form name="Register" action="<?php echo constant("HOST")?>/Register/checkRegister" id="register-form" method="POST" >
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
            </div>
	        <div class="form-group">
		        <label for="username">Username:</label>
		        <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
	        </div>
	        <div class="form-group">
		        <label for="email">Email:</label>
		        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
	        </div>
	        <div class="form-group">
		        <label for="phonenumber">PhoneNumber:</label>
		        <input type="number" class="form-control" id="phonenumber" placeholder="Enter PhoneNumber" name="phonenumber">
	        </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
	        <div class="error-login mb-2"><?php echo $message ?></div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <script>
        jQuery(document).ready(function ($) {
            $("#register-form").submit(function(e){
                let user = $("#username").val();
                let pass = $("#password").val()
                if (user === "" || pass === "") {
                    $(".error-login").text("The username and password fields is required");
                    e.preventDefault();
                } else if(/\s/g.test(user) || /\s/g.test(pass)) {
                    $(".error-login").text("The username and password fields must not have spaces");
                    e.preventDefault();
                }
            });
        })
    </script>
</body>
</html>