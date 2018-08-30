<?php 

//Pre requirements --------------------------------------
ob_start();
    session_start();
    require("database.php");

    $registerErrors = [];

    $regMessage = "";

    
    use PHPMailer\PHPMailer\PHPMailer;
  
    
    
    require 'PHPMailer/PHPMailer.php';
 



//Create registerClass instance -------------------------

    $registerUser = new Database();

    $msg = "";

//Assign variables --------------------------------------

function getPassword(){
    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $characterLength = strlen($characters);

    $total = "";
    for($x = 0; $x < 6; $x ++){
        $randLetter = $characters[random_int(0,$characterLength)];
        $total .= $randLetter;
        // echo $total;
    }
    return $total;
}





if(isset($_POST['registerBtn'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    // $pass = $_POST['pass'];

    // echo strlen($pass);
//Error handling ----------------------

    if($name == ""){
        array_push($registerErrors,"Please enter your fullname?");
    } 
    else if($email == ""){
        array_push($registerErrors,"Please enter your email");
    } 
    // else if($registerUser->IsEmail($email)){
    //     array_push($registerErrors,"Email already in use!");
    //}
    
     
    else if($registerUser->IsUsername($user)){
        array_push($registerErrors,"Username already in use!");
    }
    else if($user == ""){
        array_push($registerErrors,"Please enter your username");
    }
   
    else
        {
        if(count($registerErrors) == 0){
            
            echo "no errors";
//MAIL OUT PASSWORD ----------------------------------------------------------------------------------
$randomPassword =  getPassword();
$_SESSION['pass'] = $randomPassword;
echo $randomPassword;


$registerUser->RegisterUser($name,$email,$user,$randomPassword);

            $mail = new PHPMailer();

                    //Recipients
            $mail->setFrom('gregp63@hotmail.co.uk');
            $mail->addAddress($email);     // Add a recipient
            $mail->addAddress('gregp63@hotmail.co.uk');               // Name is optional
          

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Your Password key';
            $mail->Body    = 'Your password key is' . $randomPassword . " copy and paste into the login section!";
           

            if($mail->send()){
                $msg = "Email successfully sent, please check your inbox";
                $_SESSION['success'] = "yes";
                $_SESSION['msg'] = "Registration successful, please check your email inbox for verification key";
                
                header("location: login.php");


            } 
            
            else {
                $msg = "Unable to send verification email!";
            }
         
        }
         else {
            array_push($registerErrors,"Unknown error");
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
            if($regMessage != "") : ?>
            <div class="alert alert-success">
                <?php echo $regMessage; ?>
                <button class="float-right">&times;</button>
            </div>

            <?php endif ?>
        

<div class="card">
    <div class="card-header">
        <h1>Register</h1>
    </div>
    <div class="card-body">

    <?php 
        if(count($registerErrors) > 0) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($registerErrors as $value) : ?>
                        <li> <?php echo $value ?> </li>
                    <?php  endforeach ?>
                </ul>
            </div>
        <?php endif  ?>
    


        <form action="register.php" method="POST">
            <label for="username">Fullname</label>
            <input value="<?php if(isset($_POST['name'])) echo $name ?>" name="name" type="text" class="form-control" placeholder="" >
            <br>
            <label for="password">Email</label>
            <input value="<?php if(isset($_POST['email'])) echo $email ?>" name="email" type="email" class="form-control" placeholder="someone@example.com" >
            <br>
            <label for="password">Username</label>
            <input value="<?php if(isset($_POST['user'])) echo $user ?>" name="user" type="text" class="form-control" placeholder="" >
            <br>
           
            <hr>
            <button name="registerBtn" class="btn btn-block btn-dark">Register</button>
            <br>
            <p> Already a member? Login <a href="login.php">here</a> </p>







        </form>
    </div>


</div>
</div>




</body>
</html>