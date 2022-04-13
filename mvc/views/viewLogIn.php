<!DOCTYPE html>
<html>
<head>
<title>Page Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo constant("HOST")?>/mvc/public/css/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
	    <h2>Login form</h2>
	    <?php if ($data["status"] == 3) { ?>
		    <div class="alert alert-success">
			    Register success! Please login!
		    </div>
	    <?php } ?>
        <form name="logIn" action="<?php echo constant("HOST")?>/LogIn/checkLogIn" method="POST" id="login-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
	        <?php $msg = $data["status"] == 2 ? 'The username and password are not correct!' : ''; ?>
	        <div class="error-login mb-2"><?php echo $msg ?></div>
            <button type="submit" class="btn btn-primary">Log In</button>
        </form>
	    <p>You don't have account.<a href="<?php echo constant("HOST")?>/Register"> Register here!</a></p>
    </div>
    <script>
        jQuery(document).ready(function ($) {
            $("#login-form").submit(function(e){
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