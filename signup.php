<?php
include 'connection.php';
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo("<script>alert('You are already logged in. Please Loggout to create new profile.');
     window.location.href='View.php';</script>
    ");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
global $username, $email, $phonenumber, $password,  $usertype,$designation;
$username= $_POST['username'];
$email = $_POST['email'];
$phonenumber = $_POST['phone'];
$password = $_POST['pass'];

$usertype = $_POST['select'];
$designation=$_POST['designation'];
   
        
        function validUser(){
            if(!preg_match('/^[a-zA-Z]([0-9a-zA-Z]){2,10}$/',$GLOBALS['username'])){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Invaild Username!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                return false;
            }
            return true;
        }
        function validEmail(){
            if(!preg_match('/^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/',$GLOBALS['email'])){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Invaild Email!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                return false;
            }
            return true;
        }
        function validPhone(){
            if(!preg_match('/^([0-9]){10}$/',$GLOBALS['phonenumber'])){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Invaild Phone No!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                return false;
            }
            return true;
        }
        // function validPass(){
        //     if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/',$GLOBALS['password'])){
        //         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //         <strong>Error!</strong> Invaild Password!
        //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //       </div>';
        //         return false;
        //     }
        //     return true;
        // }
        // function validC_Pass(){
        //     if($GLOBALS['Password']!=$GLOBALS['C_Password']){
        //         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //         <strong>Error!</strong> Password does not match!
        //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //       </div>';
        //         return false;
        //     }
        //     return true;
        // }
        if(!$conn){
            die("sorry we failed to connect: ". mysqli_connect_error());
        }
        else{
            $sql_u = "SELECT * FROM userid_tb WHERE username='$username'";
            $res_u = mysqli_query($conn, $sql_u);
            if (mysqli_num_rows($res_u) > 0) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Username Already Exist!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              }
              else{
                if(validUser()&&validEmail()&&validPhone()){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `userid_tb` (`username`, `email`, `phonenumber`, `password`, `usertype`,`designation`) VALUES ('$username', '$email', '$phonenumber', '$hash', '$usertype','$designation');";
                $result = mysqli_query($conn,$sql);
                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You are Registered Successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                }
                }
              }
        }
        header('location:login.php');
    }
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css"/>
    <title>J&k Administration</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
        crossorigin="anonymous">
    -->
    
</head>
<body>
    <!-- <div id="success" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are Registered Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <div id="failure" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Wrong Entries Found, Try Again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> -->
      
      <div class="topbar">
        <ul>
            
            <li>
              <a href="login.html">Home</a>
            </li>
            <li class="last">
                <a href="#">Contact Us</a>
            </li>
        </ul>
        <br class="clear">
    </div>
    <div class="logo">
    
        <img src="images/Logo.png">
    </div> 
    <div class="jk">
    
        <p>Jammu & Kashmir Revenue Department </p>
        <!--<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Government_of_Jammu_and_Kashmir.svg/
            640px-Government_of_Jammu_and_Kashmir.svg.png" alt="logo" width="128" height="120">-->
    </div>
        
    <div class="topbar2">
    <marquee behavior="" direction="" style="color: antiquewhite;">J&K Revenue Department Encroachment Drive</marquee>
    </div>
<form method="post">
            <div class="signup-form">
            
        <div class="form-title">
            SIGN UP
          </div>
       <!--<action="/PHP/Signup.php" method="post">-->
        <div class="form-input">
            <label for="username" id="un">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Name" >
            <!--<small id="namevalid" class="form-text text-muted invalid-feedback mt-2">
                Username must be 2-10 characters long and should not start with a number.
            </small>-->
        </div>
        <div class="form-input">
            <label for="email" id="eml">Email</label>
            <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email" >
            <!--<small id="emailvalid" class="form-text text-muted invalid-feedback mt-2">
                Invalid Email!
            </small>-->
        </div>
        <div class="form-input">
            <label for="phone" id="ph">Phone No</label>
            <input type="input" class="form-control" name="phone" id="phone" placeholder="Enter your Phone No" >
            <!--<small id="phonevalid" class="form-text text-muted invalid-feedback mt-2">
                Invaild Phone No!
            </small>-->
        </div>
        <div class="form-input">
            <label for="pass" id="p1">Password</label>
            <input type="password" class="form-control" name="pass" id="pass"  placeholder="Create your Password" >
            <!--<small id="passwordvalid" class="form-text text-muted invalid-feedback mt-2">
                Password must contains atleast 6 characters, <br>Atleast one number,<br>Includes both lower and uppercase letters and special characters
            </small>-->
        </div>
        
        <div class="form-input">
            <label for="select" id="s1">Role</label>
            <select class="form-select" name="select" id="select">
                <option selected>Select your Role</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
              </select>
             </div>
            <div  class="form-input">
              <label for="select" id="s1">Designation</label>
            <select class="form-select" name="designation" id="select">
                <option selected>Select your Designation</option>
                <option value="dc">DC</option>
                <option value="tehsildar">Tehsildar</option>
              </select>
        </div>
        <div class="form-input">
            <button id="login-btn">Register</button>
            <a href="Login.html">Already a User?</a>
             
          </div>
</div>
</form>
<!--<div id="form-input">
    <a href="Login.html">Already a User?</a>
</div>-->

    <script src="login.js"></script>  
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="script.js"></script>-->
    <div class="container common-container four_content carousel-container">
        <div id="flexCarousel" class="flexslider carousel">
           <ul class="slides">
              <li><a target="_blank" href="http://digitalindia.gov.in/"
                    title="Digital India, External Link that opens in a new window"><img
                       src="images/digital.jpeg" alt="Digital India"></a></li>
              <li><a target="_blank" href="http://www.makeinindia.com/"
                    title="Make In India, External Link that opens in a new window"> <img
                       src="Images/makeinindia.jpeg" alt="Make In India"></a></li>
              
              <li><a target="_blank" href="https://data.gov.in/"
                    title="Data portal, External Link that opens in a new window"><img
                       src="images/data.jpeg" alt="Data portal"></a></li>
              <li><a target="_blank" href="https://mygov.in/"
                    title="MyGov, External Link that opens in a new window"><img
                       src="images/mygov.jpeg" alt="MyGov Portal"></a></li>
           </ul>
        </div>
     </div>
<div class="footer-bottom-wrapper">
 <div class="footer-bottom-wrapper">
    <div class="container common-container four_content footer-bottom-container">
       <div class="footer-content">
          <!-- <div class="copyright-content"> Website Content Managed by <strong>Department Name, Ministry Name,
             </strong> -->
             <span>Designed, Developed and Hosted by
                <a target="_blank" title="JaKeGA, External Link that opens in a new window" href="https://jakega.jk.gov.in/">
                   <strong>Jammu and Kashmir eGovernance Agency</strong>
                </a>
                <strong> ( JaKeGA )</strong>
             </span>
          </div>
          <div class="last-updated">
             <strong>Last Updated: 23-01-2023</strong>
          </div>
       </div>
    </div>
</div>

    
</body>
</html>