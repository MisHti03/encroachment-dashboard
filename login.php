<?php
include 'connection.php';
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo("<script>alert('You are already logged in.');
     window.location.href='page.php';</script>
    ");
}
$login = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

   
  
    if(!$conn){
        die("sorry we failed to connect: ". mysqli_connect_error());
    }
    else{
        $sql= "SELECT * FROM userid_tb WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password, $row['password'])){
                        $role = $row['usertype'];
                       
                        $login = true;
                        
                        $_SESSION['loggedin']=true;
                        $_SESSION['username']=$username;
                        $_SESSION['usertype'] = $usertype;
                        
                        //header("Location: View.php");
                }
                else{
                    $showError = "Invalid Credentials";
                }
            }
        } 
        else{
            $showError = "Invalid Credentials";
        }
    }
    header('location:page.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css"/> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>J&k Administration</title>
</head>
<body>
<div class="body">
<?php
      if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Loggedin Successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> ';
    }
    if($showError){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    
    }
?>
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

    <p>Jammu & Kashmir Revenue Department</p>
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Government_of_Jammu_and_Kashmir.svg/
        640px-Government_of_Jammu_and_Kashmir.svg.png" alt="logo" width="128" height="120">
</div>
    
<div class="topbar2">

</div>
<div class="login-form">
    
        <form method="post">
            <div class="form-title">
                LOGIN
              </div>
        <div class="form-input">
            <label for="username" id="un">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Name" >
            <!--<small id="namevalid" class="form-text text-muted invalid-feedback mt-2">
                Username must be 2-10 characters long and should not start with a number.
            </small>-->
        </div>
        <div class="form-input">
            <label for="pass" id="p1">Password</label>
            <input type="password" class="form-control" name="password" id="pass"  placeholder=" Enter your password" >
           <small id="passwordvalid" class="form-text text-muted invalid-feedback mt-2">
                Password must contains atleast 6 characters, <br>Atleast one number,<br>Includes both lower and uppercase letters and special characters
            </small>
        </div>
        <div class="form-group">
            <label for="">User type</label>
            <select name="usertype" id="usertype">
            <option selected="selected" value="user">Superadmin</option>
            <option value="admin">Admin</option>
            <!-- <option  value="superadmin">Inspection User</option> -->
           
            </select>
          <!-- <div class="captcha">
            <label for="captcha-input">Enter Captcha</label>
            <div class="preview"></div>
            <div class="captcha-form">
              <input type="text" id="captcha-form" placeholder="Enter captcha text">
              <button class="captcha-refresh">
                <i class="fa fa-refresh"></i>
              </button>
            </div>
          </div> -->
          <div class="form-input">
            <button onclick="location.href='page.html'" id="login-btn">Submit</button>
            <a href="signup.php">New User?</a>
    
           <!-- <button onclick="location.href='signup.html'" id="signup-btn">Sign Up</button > -->
    </div>
            </form>
    
    
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
    </script>
    <script src="login.js"></script>
</div>
</div>
   <div id="footer">
        <div id="newsletter">
             <div class="footbox">
          <h2>Image Gallery</h2>     
               <a href="Gallery.aspx">  <img class="btmspace-15" src="images/ofiice/gallery.jpg" alt=""/> </a>
        </div>
        
        </div>
           <div class="footbox">     
       <a href="http://meity.gov.in/divisions/national-e-governance-plan" target="_blank"> <img src="images/ofiice/negp.jpg" width="290" height="80" /></a>    
                </div>
          <div class="footbox">
          <h2>Contact Us</h2>
         <ul>
          <li> Srinagar, Room No. 173, 1st Floor</li>
           <li>  Civil Secretariat, 190001</li>
           <li>  Jammu, Room No. 3/36, 3rd Floor, Mini Block</li>
           <li>  Civil Secretariat, 180001</li>
           <li>Tel. No.:- 0191-2572733</li> 
         </ul>     
          </div>
          
       
       
        <br class="clear" />
      </div>
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
               <div class="copyright-content"> Website Content Managed by <strong>Department Name, Ministry Name,
                    </strong> 
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