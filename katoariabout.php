<!--

Name: Anselmo D. Oduca 
Course: BSIT - 2nd Year
Subject: ITMC231 - Platform Technologies
Mideterm Requirement

Honor Code:

This is my own work and I have not received any unauthorized help in completing this. I have not copied from my classmate, friend, nor any unauthorized resource. I am well aware of the policies stipulated in the handbook regarding academic dishonesty. If proven guilty, I won't be credited any points for this endeavor.



-->

<?php  
    include_once 'C:\wamp\www\Katoari Website\dbh.inc.php';
    ini_set('display_errors', '1');
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();
    ob_start();
        
    function function_alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    if(!isset($_SESSION['sess_user'])){
        header("Location: katoari.php");
    }    
    else
    {
       
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About Katoari</title>
        <link rel = "icon" href = "K.png" type = "image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
        <style type="text/css">
            *{
                margin: 0 auto;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }
            body{
                background-color: #C0C0C0;
                height: 100%;
            }
            .navbar{
                font-size: 18px;
            }
            .navbar-brand{
                margin-left: 5vh;
                font-size:28px;
                width: 65%;
                
            }
            .nav-item{
                padding: 0px 20px 0px 20px;
                
            }
            .about-contain{
                background-color: #f8f6ed;
                width: 60%;
                height: 50%;
                margin: 0 auto;
                margin-top: 20px;
                border-radius: 20px;
            }
            .about-content{
                text-align: justify;
            }
            .about-pic{
                width:50%; display: block;
            }
            .about-footer{
                text-align: center;
            }
            .about-name{
                font-weight: bold;
                padding: 5px;
                font-size: 20px;
            }
            .about-contact{
                font-size: 12px;
                text-align: justify;
                margin: 0 auto;
                width: 15%;
            }            
             @media only screen and (max-width: 768px){
                .about-contain{
                    width: 95%;
                }
                .about-contact{
                    width: 37%;
                }    
            }                         
        </style>
        
    </head>
    <body>
            <!-- Navigation Bar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <a class="navbar-brand" href="katoarihome.php">KATOARI</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item ">
                    <a class="nav-link" href="katoarihome.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="katoariabout.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="katoariwork.php">FAQ</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="katoarilogin.php"><i class='fas fa-user-circle'></i></a>
                  </li>
                </ul>
              </div>
            </nav>

            <div class="about-contain">
                <div class="w3-container" id="about">
                  <div class="w3-content" style="max-width:700px">
                    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ABOUT KATOARI</span></h5>
                    <div class="about-content">
                        <p>Katoari was founded in Philippines by Anselmo Oduca in lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                      <p><strong>Website Developer</strong></p>
                    </div>
                    <img src="community-outreach.jpg" class="about-pic">
                    <div class="about-footer">
                        <div class="about-name">Anselmo Oduca</div>
                        <div class="about-contact">
                                anoduca@gbox.adnu.edu.ph 
                        </div>
                        <div class="about-contact" style="padding-bottom: 15px;">
                                09774765587
                        </div>

                    </div>
                  </div>
                </div>
            </div>
            <script type="text/javascript">


            </script>
    </body>
</html>
<?php

    }
?>