<?php 

if(!isset($_SESSION)){
   session_start();
}


include_once("connections/connection.php");

$con = connection();

if(isset($_POST['login'])){
  
   $username = $_POST['username'];
   $password = $_POST['password'];

  $sql = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password'";
   $user = $con->query($sql) or die ($con->error);
   $row = $user->fetch_assoc();
   $total = $user->num_rows;

if($total > 0){
   
   $_SESSION['UserLogin'] = $row['username'];
   $_SESSION['Access'] = $row['access'];
   echo header("Location: index.php");
}else{
   echo "No user found!.";
}

}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">


   
</head>
<body id="formlogin">
   
   <div class="login-container">
      <h2>Login Page</h2>
      <br/>

      <div class="form-logo">
       <img src="img/pen.png" alt="" height="240px"; weight="240px">
      </div>

      <form action="" method="post">
         
         <div class="form-element">
               <label>Username</label>
               <input type="text" name="username" id="username" autocomplete="off" placeholder="Enter your username" required>
         </div>    

         <div class="form-element">
               <label>Password</label>
               <input type="password" name="password" id="password" placeholder="Enter your password" required>
         </div>
         
            <button type="Submit" name="login">Sign in</button>
     
      </form>
   
   </div>

</body>
</html>