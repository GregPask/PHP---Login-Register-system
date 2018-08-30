<?php 

ob_start();
session_start();
require("database.php");


// echo $_SESSION['pass'];

$loginErrors = [];
$loginuser = new Database();

//Login --------------------------------------

if(isset($_POST['loginBtn'])){

    $username = strtolower($_POST['username']);
    $password = $_POST['password'];

//Error Handling -----------------------------

    if($username == ""){
        array_push($loginErrors,"Please enter your username!");
    } 
   
    else if($password == ""){
        array_push($loginErrors,"Please enter your password!");
    } 
    else {
        
        if(count($loginErrors) == 0){
      
        $result1 = $loginuser->LoginUser($username,$password);
        
      
           
            $_SESSION['user'] = "hello";
           
            header("location: index.php");
            exit();

        }
        
        
        
    
       
    }


}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Crimson+Text|Work+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php 
            if(isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <button id="close" class="close">&times;</button>
                    <?php echo $_SESSION['msg']; ?>
                    <?php unset($_SESSION['success']); ?>
                </div>
            <?php endif ?>
        
        
        
<div class="card">
    <div class="card-header">
        <h1>Login</h1>
    </div>
    <div class="card-body">

    <?php 
        if(count($loginErrors) > 0) : ?>
            <div class="alert alert-danger">
                <ul style="margin: 0; padding: 0 1em;">
                    <?php foreach ($loginErrors as $value) : ?>
                            <li> <?php echo $value ?> </li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
    
        <form action="login.php" method="POST">
            <label for="username">Email</label>
            <input value="<?php if(isset($_POST['username'])) echo $username ?>" name="username" type="text" class="form-control" placeholder="Someone@example.com" >
            <br>
            <label for="password">Password</label>
            <input name="password"   type="password" class="form-control" placeholder="Password" >
            <hr>
            <button name="loginBtn" type="submit"  class="btn btn-block btn-dark">Login</button>
            <br>
            <p> Not a member yet? Register <a href="register.php">here</a> </p>







        </form>
    </div>


</div>
</div>


<script>

$("#close").click(function(){
    $(this).parent().hide(1000);
});






</script>
</body>
</html>