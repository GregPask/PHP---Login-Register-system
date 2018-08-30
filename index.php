<?php 
use PHPMailer\PHPMailer\PHPMailer;
session_start();
if(!isset($_SESSION['user'])){
    header("location: login.php");
    echo "You must log in first";
}


if(isset($_POST['btn2'])){


    $name = $_POST['name2'];
    $email = $_POST['email2'];
    $message = $_POST['message'];


    $msg2 = "";
	
	include_once "PHPMailer/PHPMailer.php";
	
	
        $mail = new PHPMailer();


		$mail->addAddress("gregp63@hotmail.co.uk");
		$mail->setFrom($email);
		$mail->Subject = "Feedback Reply...";
		$mail->isHTML(true);
		$mail->Body = $message;
		// $mail->addAttachment($file);

        
        
        if($mail->send()){
            $msg2 = "Email successfully sent, please check your inbox";
            

        } 
        
        else {
            $msg2 = "Unable to send verification email!";
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
<style>
/* <!-- GENERAL  --> */


body {
    font-family: 'Work Sans', sans-serif;
    overflow: scroll;
    min-width: 400px;
}
p {
   font-family: 'Work Sans', sans-serif;
}

h1,h2,h3,h4,h5,h6 {
    font-family: 'Crimson Text', serif;
}


/* <!-- SECTION A ------------------------------------------------------------- --> */

    #sectionA{
        background-color: #DDAB1B;
        height: 100vh;
        position: relative;
        color: #212529;

    }

    #text {
        position:absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        text-align: center;
    }
    #text h1{font-size: 8em;}
    #text h4{font-size: 2em;}

    #text a {
        background-color: #155D74;
        color: #fff;
        padding: 1em 2.5em;
        border-radius: 5px;
        font-size: 1.3em;
        text-decoration: none;
    }
    #text a:hover{
        background-color: rgb(28, 126, 158);
    }

    #sectionA button {
        background-color: #DDAB1B;
        border: 0;
        font-size: 1.3em;
        position:fixed;
        right: 20px;
        top: 10px;
        color: #fff;
        line-height: 50px;
        background-color: #21252957;
        border-radius: 0.3em;
        padding: 0.1em 0.7em;
        cursor: pointer;
    }
    #sectionA button:hover{
        background-color: #212529f8;
    }

/* <!-- SIDE NAV-------------------------=-------------------------- --> */
   
    #card {
        background-color: #155D74;
        width: 300px;
        position: fixed;
        top: 0;
        left: -300px;
        color: #fff;
        height: 100%;
        z-index: 100;
        border: 2px solid rgba(0, 0, 0, 0.411);
        opacity: 0.96;
        
    }
    #card a { 
        text-decoration: none;
        color: #fff;
        padding: 0 0;
        margin-bottom: 1em;
        font-size: 1.5em;
    }

    #space div:hover {  
        background-color: rgb(26, 124, 156);
    }

    #space1,#space2,#space3,#space4 {
        padding: 1em;
    }

    #space4 {
      position: absolute;
      bottom: 20px;
      
      width: 100%;
    }

      #space4 div:hover {  
        background-color: rgb(156, 30, 26);
    }

    #close {
        position: absolute;
        right: 20px;
        top: 8px;
       background-color:#212529a8;
        color: #fff;
        padding: 0.2em 0.5em;
        border-radius: 5px;
        cursor: pointer;

    }

    #header {
        padding: 1em;
    }


/* <!-- SECTION B ------------------------------------------------------ --> */

    #sectionB{
        background-color: #F8F9FA;
        width: 100%;
        height: auto;
        text-align: center;
        font-size: 1.5em;
        padding: 1em;
    }

    #sectionB h1 {
        font-size: 4em;
    }
    #sectionB a {
        font-size: 1.2em;
        margin-top: 1em;
        padding: 0.3em 1.8em;
    }

/* <!-- SECTION C ------------------------------------------------------- --> */

    #sectionC{
        background-color: #1D809F;
        height: auto;
        text-align: center;
        color: #fff;
        font-size: 1.2em;
        padding: 1em;
    }
    #sectionC h1 {
        font-size: 4em;
    }
    #sectionC img {
        border-radius: 3em;
        height: 190px;
    }


/* <!-- SECTION D ------------------------------------------------------------ --> */

    #sectionD {
        background-color: #DDAB1B;
        height: auto;
        padding: 1em;
        color: #fff;
        text-align: center;
    }
    #sectionD h1 {
        font-size: 4em;
    }

    #sectionD form {
        background-color: rgb(255, 254, 254);
        padding: 1em;
        color: black;
        width: 350px;
        
        border-radius: 1em;
        border: 1px solid rgba(0, 0, 0, 0.473);
        box-shadow: 1px 1px 5px 0.2px black;
        margin: auto;
        text-align: start;
    }

    form input[type=text]{
        background-color: #f1f1f1;
    }
    form textarea{
        background-color: #f1f1f1;
    }


/* <!-- SECTION E ------------------------------------------------------------------------------- --> */

    #sectionE {
        background-color: #fff;
        text-align: center;
        height: auto;
        padding: 2em 1em;
    }

    #fa {
        padding: 0.8em;
        font-size: 6em;
        background-color: #212529bd;
        border-radius: 10px;
    }
    #fa:hover{
        background-color: #212529f5;
    }

    #sectionE h1 {
        font-size: 4em;
    }



    #mid {
        background-color: #155D74;
        height: 200px;
        width: 100%;
    }

/* <!-- section F ----------------------------------------------------------------------- --> */

    #sectionF {
        height: 500px;
        width: 100%;
    }
    #box {
        height: 500px;
        border: 1px solid rgba(0, 0, 0, 0.459);

    }


/* <!-- FOOOTER --> */

    footer {
        background-color:#212529;
        color: #fff;
        text-align: center;
        padding: 2.7em;
        font-size: 1.5em;
        height: 200px;
    }

    #btn1 {
        z-index: 1000;
    }




/* <!-- MEDIA -----------------------------------------------------------------------------------------> */
@media (max-width: 992px){
    #fa{
        margin-bottom: 0.5em;
    }

}
@media (max-width: 768px){
    #sectionA {
        height: 60vh;
    }
    #text h1 {
        font-size: 6.5em;
    }

    #fa {
        margin-top: 1em;
    }

    #bottom {
        margin-bottom: 2.5em;
    }

      #sectionD form{
          width: 100%;
      }
}
</style>
</head>
<body>

<!-- SECTION A ----------------------------------------------------------------------------------------- -->

<div id="sectionA">
    
        <div id="card" >
         <div id="header">
                <h2>Portfolio <span id="close" class="float-right">&times;</span></h2>
                <hr>
         </div>
         <div id="space">
        
        
        <div id="space1">
            <a id="about" href="#sectionB">About</a>
        </div>
        
        <div id="space2">
            <a id="education" href="#sectionC">Hobbies & Intrests</a>
        </div>

        <div id="space3">
            <a id="contact" href="#sectionD">Contact</a>
        </div>

         <div id="space4">
            <a id="contact" href="logout.php">Sign out</a>
        </div>


        </div>

           
        </div>
    <button  id="btn1">&#9776</button>




   
    <div id="text">
    

    <h1>Pasky101</h1>
    <h4>My Portfolio Website</h4>
    <br><br>
    <a href="logout.php">Sign out</a>
    </div>

</div>


<!-- SECTION B ------------------------------------------------------------------------------------------- -->

<div id="sectionB">
    <div class="container">
        <br>    
    <h1>About</h1>
        <p>My name is Greg Pask, I am 22 years old and was born in Liverpool, England.</p>
        <p>A recent graduate with a 2:1 BSc (hons) in Mathematics, seeking a position as an entry level programmer. With
            sound fundamentals in Statistical programming languages, I am working to advance my skills, with my current
            focus on web development.</p>
            <hr>
            <a class="btn btn-lg btn-dark" href="https://www.ljmu.ac.uk/study/courses/undergraduates/2018/mathematics" target="_blank">Course Details</a>
</div>
</div>


<!-- SECTION C --------------------------------------------------------------------------------------------- -->

<div id="sectionC">
   
    <br>
    <div class="container">
            <h1>Hobbies & Intrests</h1>
            <br>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <img class="img-fluid" src="https://images.pexels.com/photos/34074/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=350" alt="">
            <h3>Music</h3>
            <p id="bottom">I regularly enjoy listening & playing music</p>
        </div>
        <div class="col-lg-3 col-md-6">
            <img class="img-fluid" src="https://images.pexels.com/photos/34676/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=350" alt="">
            <h3>Programming</h3>
            <p id="bottom">On my way to becoming a coding God.</p>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/0/02/Anfield_Football_Stadium_-_geograph.org.uk_-_90357.jpg" alt="">
            <h3>Thing1</h3>
            <p id="bottom">Avid Lfc football fan</p>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <img class="img-fluid" src="https://images.pexels.com/photos/841130/pexels-photo-841130.jpeg?auto=compress&cs=tinysrgb&h=350" alt="">
            <h3>Thing1</h3>
            <p id="bottom">Staying fit and active</p>
        </div>

        </div>
    </div>
</div>

<!-- SECTION D ------------------------------------------------------------------------------------------ -->


<div id="sectionD">
    <div class="container">
        <h1>Contact Me</h1>
        <p>feel free to contact me with any points of discussion!</p>

        <?php
            if(isset($_POST['btn2'])) : ?>
                <div class="alert alert-success">
                    <?php echo $msg2; ?>
                    <button id="btn3" class="close float-right" >&times;</button>
                </div>

            <?php endif ?>
        
        
        <div>
            <br>
            <form id="form1" action="index.php#sectionD" method="POST">
                <label for="name">Name</label>
                <input name="name2" type="text" placeholder="Name" class="form-control">
                <hr>
                <label for="name">Email</label>
                <input  name="email2"type="text" placeholder="email" class="form-control">
                <hr>
                <label for="name">Message</label>
                <textarea name="message" style="background-color: #f1f1f1;" placeholder="message" class="form-control" name="" id="" cols="30" rows="10"></textarea> 
                <br>
                <button type="submit" name="btn2" class="btn btn-block btn-dark">Send Email</button>
                <hr>
            </form>
        </div>
    </div>


</div>


<div id="sectionE">
    <div class="container">
    <h1>Social Media</h1>
    <hr>
    <div class="row">
            <div class="col-lg-3 col-md-6">
               <a target="_blank" href="http://github.com"><span id="fa"  style="color: black;" class="fa fa-github-square"></span></a>
               
            </div>
            <div class="col-lg-3 col-md-6">
                    <a target="_blank" href="http://facebook.com" ><span  id="fa" style="color: rgb(0, 17, 255);" class="fa fa-facebook-square"></span></a>
                   
            </div>
            
            <div class="col-lg-3 col-md-6">
                    <a target="_blank" href="http://twitter.com" ><span id="fa" style="color: rgb(14, 125, 153);"  class="fa fa-twitter-square"></span></a>
                    
            </div>
            
            <div class="col-lg-3 col-md-6">
                    <a target="_blank" href="http://youtube.com" ><span id="fa" style="color: rgb(163, 22, 22);"  class="fa fa-youtube-square"></span></a>
                   
            </div>
    
    </div>
    </div>

</div>
<br><br><br>

<div id="sectionF">
    <div id="box">

    </div>
</div>


<footer>
    <p>Brought to you by <a href="#">Greg Pask</a> </p>
</footer>






<script>



$("#btn3").click(function(){
    $(this).parent().hide(750);
});

$("#close2").click(function(){
    $(this).parent().hide(750);
});


$("#btn1").click(function(){
    $("#card").animate({left: '0'});
});


$("#close").click(function(){
    $("#card").animate({left: '-301px'})
});


$("#about").scrollTop(400);

     var map;
        function initMap() {
          map = new google.maps.Map(document.getElementById('box'), {
            center: {lat: 53.4084, lng: -2.9916},
            zoom: 5
          });


          market = new google.maps.Marker({
              position: {lat: 53.4084, lng: -2.9916},
              map: map
          })


        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3-0PvF-e8_ytcUFFYsxrqDs7FN74vfNI&callback=initMap"
      async defer></script>



</body>
</html>