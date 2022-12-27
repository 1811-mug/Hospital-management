<! DOCTYPE html>  
<html lang="en" >  
<head>  
  <meta charset="UTF-8">  
  <title> Login to your account </title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
</head>  
<style>  
/* html {   
    height: 100%;   
}   */
body {   
    height: 100%;   
    background-color: #f5f5f5;
}   
.global-container {  
    height: 100%;  
    display: flex;  
    align-items: center;  
    justify-content: center;  
      
}  
form {  
    padding-top: 10px;  
    font-size: 14px;  
    margin-top: 30px;  
}  
.card-title {   
font-weight: 300;  
 }  
.btn {  
    font-size: 14px;  
    margin-top: 20px;  
}  
.login-form {   
    width: 330px;  
    margin: 20px;  
}  
.forgot {  
    text-align: center;  
    padding: 20px 0 0;  
}  
.alert {  
    margin-bottom: -30px;  
    font-size: 13px;  
    margin-top: 20px;  
}  
</style>  
<body>  
<div class="pt-5">  

<?php include "config.php"; ?>
  <div class="global-container">  
    <div class="card login-form">  
    <div class="card-body">  
        <h3 class="card-title text-center">Login To Your Account</h3>  
        <div class="card-text">  
            <form method="POST" action="login_ser.php">  
                <div class="form-group">  
                    <label for="user"> Enter Username </label>  
                    <input type="text" class="form-control form-control-sm" id="user" name="user" required>  
                </div>  
                <div class="form-group">  
                    <label for="pwd">Enter Password </label>  
                      
                    <input type="password" class="form-control form-control-sm" id="pwd" name="pwd" required>  
                </div>  
                <div class="form-group">
                    <label for="type">Type</label>
                    <select id="type" name="type" class="form-control">
                        <option selected>--Select--</option>
                        <option>Admin</option>
                        <option>Doctor</option>
                        <option>Attendies</option>
                    </select>
                </div>
                <center>
                <input type="submit" name="login" id="login" class="btn btn-primary">  
                </center>
                <div class="forgot">  
                    Forgot Password ? <a href="#"> reset </a>  
                </div>  
            </form>  
        </div>  
    </div>  
</div>  
</div>  
</body>  
</html>  