<!--

Name: Anselmo D. Oduca 
Course: BSIT - 2nd Year
Subject: ITMC231 - Platform Technologies

Honor Code:

This is my own work and I have not received any unauthorized help in completing this. I have not copied from my classmate, friend, nor any unauthorized resource. I am well aware of the policies stipulated in the handbook regarding academic dishonesty. If proven guilty, I won't be credited any points for this endeavor.



-->

<?php
    include_once 'C:\wamp\www\Katoari Website\dbh.inc.php';
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();
    ob_start();

    $query = "SELECT * FROM register";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
      
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Welcome to Katoari</title>
        <link rel = "icon" href = "K.png" type = "image/x-icon"> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

        <style type="text/css">
            *{
                margin: 0 auto;
                padding: 0;
                box-sizing: border-box;
                font-size: 62.5%;
                font-size: 15px;

            }
            body{
                background-color: #C0C0C0;
                height: 100%;
                background-image: url("gamingpc.jpg");
                background-position: center;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-size: cover;  
            }

            .design{
                background-color: rgb(128,128,128,0.6);
                border-radius: 10px;
                position: fixed;
                left: 100px;
                top: 250px;
                width: 48%;
                //border: 1px solid black;
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                overflow: hidden;


            }
            .text-endorse{
                font-family: 'Poppins', sans-serif;
                color: rgb(226,226,226);
                font-size: 72px;
                padding: 25px;
            }
            .header{
                height: 100vh;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                user-select: none;
                color: rgb(226,226,226);

            }
            .login-header{
                text-align: center;
                background-color: #090B0B;
                padding: 30px;
                border-radius: 20px;
                transition: 0.5s;
                margin-right: 120px;
                


            }
            .login-header:hover{
                -webkit-box-shadow: -16px -13px 17px 0px rgba(0,0,0,0.27);
                -moz-box-shadow: -16px -13px 17px 0px rgba(0,0,0,0.27);
                 box-shadow: -16px -13px 17px 0px rgba(0,0,0,0.27);
            }
            .login-header h1{
                font-size: 3rem;
                font-family: 'Poppins', sans-serif;
            }
            .login-header hr{
                width: 50%;
                margin: auto;
                padding: 5px;
                background-color: #44ccd3;
                border: none;
                font-family: 'Barlow', sans-serif;

            }
            .login-header h3{
                margin: 20px;
                font-size: 1.5rem;
                font-family: 'Barlow', sans-serif;



            }
            .login-header input{
                width: 90%;
                padding: 10px;
                margin: 20px 0px;
                border: none;
                border-bottom: 1px solid rgb(226,226,226);
                font-size: 1.3rem;
                background-color: #E1E5EE;
                outline: none;
                border-radius: 5px;


            }
            ::placeholder{
                color: darkgrey;
            }
            .login-header .button{
                font-size: 1.2rem;
                background: #44ccd3;
                border: none;
                border-radius: 50px;
                outline: none;
                color: white;
                width: 50%;
            
            }
            .login-header .button:hover{
                transform: scale(1.1);
            }
            .signup-text{
                font: 'Barlow', sans-serif;
                font-weight: bold;
                padding: 10px 5px 0px 0px;
            }
            .signup-text a{
                text-decoration: none;
                color: #44ccd3;
                cursor: pointer;
            }                
            .signup-logo-text{
                text-align: center;
                padding: 40px;
                margin-top: 10px;
                
                
            }
            .signup-logo-text img{
                height: 125px;
                width: 150px;
                
                
            }            
            .container input[type=text], 
            .container input[type=password] { 
                width: 90%; 
                padding: 20px; 
                margin: 20px; 
                display: inline-block;  
                display: flex;
                justify-content: center;
                border: none;
                border-radius: 10px;



            } 
            button { 

                background-color:#090B0B; 
                color: white; 
                padding: 15px; 
                margin: 8px; 
                cursor: pointer;
                //width: 50; 
                border:none;
                border-radius: 5px;
            }
            button:hover { 
                background-color: #C0C0C0;

            }              
            /*set styles for the cancel button*/ 
            .cancelbtn { 
    
                background-color: #44ccd3;

            } 
            /*float cancel and signup buttons and add an equal width*/ 
            .cancelbtn, 
            .signupbtn {
                padding: 10px;
                margin: 20px; 
             
                width: 45% 
            } 
            /*add padding to container elements*/ 
            .container {
               padding: 50px;
               border-radius: 20px;
               color: #090B0B;

            }
            .container label b{
                font-family: 'Barlow', sans-serif;
            }
            .terms{
                padding: 10px;
                font-family: 'Barlow', sans-serif;
                width: 95%;
            }
            /*define the modal’s background*/ 
              
            .modal { 
                display: none; 
                position: fixed; 
                z-index: 1; 
                left: 0; 
                top: 0; 
                width: 100%; 
                height: 100%; 
                overflow: auto;

                background-color: rgb(0, 0, 0); 
                background-color: rgba(0, 0, 0, 0.4); 
                padding-top: 60px; 
            } 
            /*define the modal-content background*/ 
              
            .modal-content { 
                background-color: #E1E5EE; 
                margin: 5% auto 15% auto; 
                border: 1px solid #888; 
                width: 90%; 
            } 
            /*define the close button*/ 
              
            .close { 
                position: absolute; 
                right: 25px; 
                top: 10px; 
                color: #44ccd3; 
                font-size: 40px; 
                font-weight: bold; 
            } 
            /*define the close hover and focus effects*/ 
              
            .close:hover, 
            .close:focus { 
                color: red; 
                cursor: pointer; 
            } 
              
            .clearfix::after { 
                content: ""; 
                clear: both; 
                display: table; 
            } 
              
            @media screen and (max-width: 300px) { 
                .cancelbtn, 
                .signupbtn { 
                    width: 100%; 
                } 
            }          
            @media screen and (max-width: 768px){
                body{
                    overflow-x: hidden;
                    font-size: 8px;
                }

                .design{
                    z-index: 1;
                    position: absolute;
                    left: 40px;
                    top: 100px;
                    width: 85%;
                    //border: 1px solid black;

                }
                .text-endorse{
                    text-align: left;
                    font-size: 28px;
                    padding: 25px;
                }
                .login-header {
                    position: relative;
                    left: 60px;
                    top: 15vh;
                    width: 100%;
                }
            }

        </style>
        
    </head>
    <body>

            <div class="design">
                <h1 class="text-endorse">
                    Find and share now your own personal computer specification
                </h1>
            </div>

                        <!-- Login form-->

            <div class="header">          
                <form class="login-header" method="POST" action="#">
                    <h1>Sign In</h1>
                    <hr/>
                    <h3>Login now to your Katoari account</h3>
                    <p><input type="email"  placeholder="Username" name="username" autocomplete="off"></p>
                    <p><input type="password"  placeholder="Password" name="password" autocomplete="off"></p>

                    <p class="signup-text">Dont have account? <a onclick="document.getElementById('id01').style.display='block'">Sign Up now</a></p>
                    <p><input type="submit" name="submit" class="button"></p>

                </form>
            <?php
                    /*$con = new mysqli('localhost', 'katoari', 'anselmo21')
                     or die(mysqli_error());

                    $db = mysqli_select_db($con, 'katoari') or die("database not found");            */
                    if (isset($_POST["submit"])) {
                        if (!empty($_POST['username']) && !empty($_POST['password'])) {
                            $user = mysqli_real_escape_string($conn, $_POST['username']);
                            $pass = mysqli_real_escape_string($conn, $_POST['password']);


                            $select = "SELECT * FROM register WHERE email = '$user' && password = '$pass'";

                            $query = mysqli_query($conn, $select);
                  
                            if (mysqli_num_rows($query) > 0) {
                                if (mysqli_num_rows($query) == 1) {
                                    $rown = mysqli_fetch_assoc($query);
                                    $_SESSION['sess_user']=$rown['user_ID'];
                                    //echo "<script> alert('$rown[user_ID]'); </script>";
                                    header('location:katoarihome.php');
                                }
                                else{
                                    header('location:katoari.php');
                                }
                            }
                            else{
                            
                            ?>
                    <script>alert('Invalid username or password');</script>
            <?php
                            }
                        } else{
                            ?>
                    <script>alert('Required all felds');</script>    
            <?php
                        }
                    }
                    
                    
            ?>
            <!-- -->
            <div id="id01" class="modal"> 
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span> 
                
                <form class="modal-content animate" action="#" method="POST"> 

                    <div class="container">
                        <div class="signup-logo-text">
                            <img src="K.png">
                            <h1 >Sign Up Form</h1>
                        </div>


                        <label><b>Name</b></label> 
                        <input type="text" placeholder="Enter Name" name="name-sign" required class="signup-input" autocomplete="off">

                        <label><b>Email</b></label> 
                        <input type="text" placeholder="Enter Email" name="email-sign" required class="signup-input" autocomplete="off"> 
          
                        <label><b>Password</b></label> 
                        <input type="password" placeholder="Enter Password" name="password-sign" required class="signup-input" autocomplete="off"> 
          
                        <label><b>Repeat Password</b></label> 
                        <input type="password" placeholder="Repeat Password" name="psw-repeat" required autocomplete="off"> 
                        <div class="terms">
                            <input type="checkbox"> Remember me 
                            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> 
                        </div>
                        <div class="clearfix"> 
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> 
                            <button type="submit" class="signupbtn" name="submit-sign">Sign Up</button> 
                        </div> 
                    </div> 
                </form> 
            </div>
            </div>
            <?php
                $host = "localhost";
                $dbusername = "katoari";
                $dbpassword = "anselmo21";
                $dbname = "katoari";

                // Create connection

                $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
                $name = mysqli_real_escape_string($conn, $_POST['name-sign']);
                $password = mysqli_real_escape_string($conn, $_POST['password-sign']);
                $repassword = mysqli_real_escape_string($conn, $_POST['psw-repeat']);


                if ($repassword != $password) {
                    ?>
                <script type="text/javascript">
                    alert("Password should be match");
                </script>
            <?php
                }
                else{
                    if (!empty($name) || !empty($email) || !empty($password)) {


                        if(mysqli_connect_error()){
                            die('Connect Error (' . mysqli_connect_errno(). ')'. mysqli_connect_errno());
                        }
                        else{
                            $email = $_POST['email-sign'];
                            $sql = "INSERT INTO register(name, email, password) values ('$name', '$email', '$password')";
                            if ($conn->query($sql) == TRUE) {
                                echo "New record is inserted successfully";
                                
                                $_SESSION['sess_user']=mysqli_insert_id($conn);
                                //echo "<script> alert('$_SESSION[sess_user]'); </script>";
                                header("Location: katoarihome.php");
                            }
                            else{
                                echo "Error: ". $sql . "<br>" . $conn->error;
                            }

                            
                            $conn->close();
                        }
                    }
                    else{
                        ?>
                    <script type="text/javascript">
                        //alert("")
                    </script>

            <?php
                    }       
                }
                ob_end_flush();    
            ?>

            <script type="text/javascript">
                var modal = document.getElementById('id01'); 
                window.onclick = function(event) { 
                    if (event.target == modal) { 
                        modal.style.display = "none"; 
                    } 
                } 
            </script>
            

    </body>
</html>
