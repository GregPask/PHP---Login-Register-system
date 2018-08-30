<?php 



function connection(){

    try {
    $db = new PDO('mysql:host=localhost;dbname=loginsystem',"root","");
    
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $db;

    }
    
    catch(PDOException $e){
        exit($e->getMessage());
    }

}





class Database{


public function RegisterUser($name,$email,$username,$password){

    try {
        $db = connection();
        $query = $db->prepare("INSERT INTO `users`(`name`,`email`,`username`,`password`) VALUES(:name,:email,:user,:pass)");
        $query->bindParam(":name",$name);
        $query->bindParam(":email",$email);
        $query->bindParam(":user",$username);
        $query->bindParam(":pass",$password);
        $query->execute();

        $_SESSION['register'] = "register";
    
        }
        
        catch(PDOException $e){
            exit($e->getMessage());
        }
    

}


public function LoginUser($username,$password){

    try {
        $db = connection();
        $query = $db->prepare("SELECT * FROM `users` WHERE email = :username AND (password=:password)");
        
        $query->bindParam(":username",$username);
        $query->bindParam(":password",$password);
       
        $query->execute();

        if($query->rowCount()> 0){
             $results = $query->fetchObject();
             return $results;
        } else {
           
        }

      


    }

        
        catch(PDOException $e){
            exit($e->getMessage());
        }



}

public function IsEmail($email){
    
    try {
        $db = connection();
        $query = $db->prepare("SELECT * FROM `users` WHERE email = :email");
        
        $query->bindParam(":email",$email);
        $query->execute();

        if($query->rowCount() > 0){
           return true;
        } else {
           return false;
        }
    }
    catch(PDOException $e){
         exit($e->getMessage());
    }

}


public function IsUsername($user){
    
    try {
        $db = connection();
        $query = $db->prepare("SELECT * FROM `users` WHERE username = :username");
        
        $query->bindParam(":username",$username);
      
       
        $query->execute();

        if($query->rowCount() > 0){
           return true;
        } else {
           return false;
        }
    }

     catch(PDOException $e){
            exit($e->getMessage());
    }
}





}























?>