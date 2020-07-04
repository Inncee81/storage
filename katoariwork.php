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
        <title>FAQ's</title>
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
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }
            body{
                background-color: #C0C0C0;
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
            .header-faq{
                text-align: center;
                margin: 20px 56vh 0px 56vh;
                padding: 20px;
                color: white;
                background: #292929;


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
                <ul class="navbar-nav ml-auto" style="margin: 0 auto;">
                  <li class="nav-item">
                    <a class="nav-link" href="katoarihome.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="katoariabout.php">About</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="katoariwork.php">FAQ</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="katoarilogin.php"><i class='fas fa-user-circle'></i></a>
                  </li>
                </ul>
              </div>
            </nav>

            <div class="header-faq">
                <h1 class="display-4">Frequent Asked Questions</h1>
            </div>
            <div class="container py-3">
                <div class="row">
                    <div class="col-10 mx-auto">
                        <div class="accordion" id="faqExample">
                            <div class="card">
                                <div class="card-header p-2" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Q: How to create Katoari account?
                                        </button>
                                      </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqExample">
                                    <div class="card-body">
                                        <b>Answer:</b> Go to this login page <a href="katoari.php">link</a> and click sign up now. Fill
                                        the details needed and click the button to create
                                        your account.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-2" id="headingTwo">
                                    <h5 class="mb-0">
                                    <button class="btn btn-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Q: What is Katoari?
                                    </button>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
                                    <div class="card-body">
                                        Katoari is a web platform which allows users to post and view computer specifications for
                                        them to effortlessly know what kind of parts they need to build for their own personal computer
                                        or etc. Basically, the website allows users to post their specific information regarding what kind
                                        specifications they have. For which other users or people can view.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-2" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          Q. How to login?
                                        </button>
                                      </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqExample">
                                    <div class="card-body">
                                        Go to this <a href="">link</a> and fill the details
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-2" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          Q. How do I update my profile?
                                        </button>
                                      </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqExample">
                                    <div class="card-body">
                                        Go to the profile settings where you can the icon of user and click the button to change the photo.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--/row-->
            </div>
            <!--container-->
 



        <script type="text/javascript">



        </script>
    </body>
</html>
<?php

    }
?>