<!DOCTYPE html>
<html>
<head>
<title>Page Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Login form</h2>
        <form name="logIn" action="<?php echo constant("HOST")?>/LogIn/checkLogIn" onsubmit="return validateForm()" method="POST" required> 
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        function validateForm() {
            var x = document.forms["logIn"]["username"].value;
            var y = document.forms["logIn"]["password"].value;
            if (x == "" || y == "") {
                alert("Username and Password must be filled out");
                return false;
            } else if (/\s/g.test(x) || /\s/g.test(x)){
                alert("Username and Password must not have space");
                return false;
            }
        }
    </script>
</body>
</html>