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
        <?php
            $id = $_SESSION['sess_user'];
            //echo "<script> alert('$id'); </script>";
            $query = "SELECT * FROM register where user_ID='$id';";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            }
        ?>

        <title>Welcome <?php echo $row['name'];?></title>
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
            .card {
                position: relative;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid #e5e9f2;
                border-radius: .2rem
            }

            .card>hr {
                margin-right: 0;
                margin-left: 0
            }

            .card>.list-group:first-child .list-group-item:first-child {
                border-top-left-radius: .2rem;
                border-top-right-radius: .2rem
            }

            .card>.list-group:last-child .list-group-item:last-child {
                border-bottom-right-radius: .2rem;
                border-bottom-left-radius: .2rem
            }

            .card-body {
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
                padding: 1.25rem
            }

            .card-title {
                margin-bottom: .75rem
            }

            .card-subtitle {
                margin-top: -.375rem
            }

            .card-subtitle,
            .card-text:last-child {
                margin-bottom: 0
            }

            .card-link:hover {
                text-decoration: none
            }

            .card-link+.card-link {
                margin-left: 1.25rem
            }

            .card-header {
                padding: .75rem 1.25rem;
                margin-bottom: 0;
                color: inherit;
                background-color: #fff;
                border-bottom: 1px solid #e5e9f2
            }

            .card-header:first-child {
                border-radius: calc(.2rem - 1px) calc(.2rem - 1px) 0 0
            }

            .card-header+.list-group .list-group-item:first-child {
                border-top: 0
            }

            .card-footer {
                padding: .75rem 1.25rem;
                background-color: #fff;
                border-top: 1px solid #e5e9f2
            }

            .card-footer:last-child {
                border-radius: 0 0 calc(.2rem - 1px) calc(.2rem - 1px)
            }

            .card-header-tabs {
                margin-bottom: -.75rem;
                border-bottom: 0
            }

            .card-header-pills,
            .card-header-tabs {
                margin-right: -.625rem;
                margin-left: -.625rem
            }

            .card-img-overlay {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                padding: 1.25rem
            }

            .card-img {
                width: 100%;
                border-radius: calc(.2rem - 1px)
            }

            .card-img-top {
                width: 100%;
                border-top-left-radius: calc(.2rem - 1px);
                border-top-right-radius: calc(.2rem - 1px)
            }

            .card-img-bottom {
                width: 100%;
                border-bottom-right-radius: calc(.2rem - 1px);
                border-bottom-left-radius: calc(.2rem - 1px)
            }

            .card-deck {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column
            }

            .card-deck .card {
                margin-bottom: .75rem
            }

            @media (min-width:576px) {
                .card-deck {
                    -ms-flex-flow: row wrap;
                    flex-flow: row wrap;
                    margin-right: -.75rem;
                    margin-left: -.75rem
                }
                .card-deck .card {
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex: 1 0 0%;
                    flex: 1 0 0%;
                    -ms-flex-direction: column;
                    flex-direction: column;
                    margin-right: .75rem;
                    margin-bottom: 0;
                    margin-left: .75rem
                }
            }

            .card-group {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column
            }

            .card-group>.card {
                margin-bottom: .75rem
            }

            @media (min-width:576px) {
                .card-group {
                    -ms-flex-flow: row wrap;
                    flex-flow: row wrap
                }
                .card-group>.card {
                    -ms-flex: 1 0 0%;
                    flex: 1 0 0%;
                    margin-bottom: 0
                }
                .card-group>.card+.card {
                    margin-left: 0;
                    border-left: 0
                }
                .card-group>.card:first-child {
                    border-top-right-radius: 0;
                    border-bottom-right-radius: 0
                }
                .card-group>.card:first-child .card-header,
                .card-group>.card:first-child .card-img-top {
                    border-top-right-radius: 0
                }
                .card-group>.card:first-child .card-footer,
                .card-group>.card:first-child .card-img-bottom {
                    border-bottom-right-radius: 0
                }
                .card-group>.card:last-child {
                    border-top-left-radius: 0;
                    border-bottom-left-radius: 0
                }
                .card-group>.card:last-child .card-header,
                .card-group>.card:last-child .card-img-top {
                    border-top-left-radius: 0
                }
                .card-group>.card:last-child .card-footer,
                .card-group>.card:last-child .card-img-bottom {
                    border-bottom-left-radius: 0
                }
                .card-group>.card:only-child {
                    border-radius: .2rem
                }
                .card-group>.card:only-child .card-header,
                .card-group>.card:only-child .card-img-top {
                    border-top-left-radius: .2rem;
                    border-top-right-radius: .2rem
                }
                .card-group>.card:only-child .card-footer,
                .card-group>.card:only-child .card-img-bottom {
                    border-bottom-right-radius: .2rem;
                    border-bottom-left-radius: .2rem
                }
                .card-group>.card:not(:first-child):not(:last-child):not(:only-child),
                .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-footer,
                .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-header,
                .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,
                .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-top {
                    border-radius: 0
                }
            }

            .card-columns .card {
                margin-bottom: .75rem
            }

            @media (min-width:576px) {
                .card-columns {
                    -webkit-column-count: 3;
                    column-count: 3;
                    -webkit-column-gap: 1.25rem;
                    column-gap: 1.25rem;
                    orphans: 1;
                    widows: 1
                }
                .card-columns .card {
                    display: inline-block;
                    width: 100%
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
                  <li class="nav-item active">
                    <a class="nav-link" href="katoarihome.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="katoariabout.php">About</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="katoariwork.php">FAQ</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="katoarilogin.php"><i class='fas fa-user-circle'></i></a>
                  </li>
                </ul>
              </div>
            </nav>
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-4 col-xl-3 order-2 order-lg-1">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <img src="defaultprofile.png" alt="<?php echo $row['name']?>" class="img-fluid rounded-circle mb-2" width="128" height="128">
                    <h4 class="card-title mb-0"><?php echo $row['name']; ?></h4>
                    <div class="text-muted mb-2">
                        <?php
                            $name = $row['name'];

                            if ($name == "Anselmo Od" || $name == "Anselmo Oduca") {
                                  echo "Admin";
                            }else{
                                echo "User";
                            }
                        ?>

                    </div>

                    <div>
                        <a class="btn btn-primary btn-sm" href="#">Follow</a>
                        <a class="btn btn-primary btn-sm" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg> Message</a>
                    </div>
                </div>
            </div>
    

 
        </div>

        <div class="col-12 col-lg-8 col-xl-6 order-1 order-lg-2">
            <div class="card">
                <div class="card-body h-100">

                    <div class="media">
                        <img src="defaultprofile.png" width="56" height="56" class="rounded-circle mr-3" alt="">
                        <div class="media-body">
                            <small class="float-right text-navy">5m ago</small>
                            <p class="mb-2"><strong><?php echo $row['name']?></strong></p>
                            <p>Hi guys I was building a computer and here is my specs for it hope you could get some good ideas for this.</p>
                            <p>

                                - Monitor Hp L1706 <br>
                                - Shipadoo Gaming Keyboard<br>
                                - Mouse & mousepad HdTek<br>

                                - Computer Regulator 500w<br>

                                - System Unit SPECS: <br>
                                - Processor Athlon II X2<br>
                                - Motherboard Asrock M3A770de<br>
                                - Ram ELITE DDR3 8GB<br>
                                - HardDrive 500gb<br>
                                - VideoCard 1gb GEFORCE GT 770</p>

                            <div class="row no-gutters mt-1">
                                <div class="col-6">
                                    <img src="https://i.pinimg.com/originals/ae/cd/26/aecd268022bff433612276f3b37267dd.jpg" class="img-fluid pr-1" alt="Unsplash" style="height: 250px; width: 300px;">
                                </div>
                                <div class="col-6">
                                    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/99/AMD_Athlon_64_X2_logo.png/220px-AMD_Athlon_64_X2_logo.png" class="img-fluid pl-1" alt="Unsplash">
                                </div>
                            </div>

                            <small class="text-muted">Today 7:51 pm</small>
                            <br>
                            <a href="#" class="btn btn-sm btn-danger mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart feather-sm">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg> Like</a>

                            <div class="media mt-3">
                                <a class="pr-2" href="#">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="36" height="36" class="rounded-circle mr-2" alt="Marie Salter">
                                </a>
                                <div class="media-body">
                                    <p class="text-muted">
                                        <strong>Marie Salter</strong>: Wow that's great! what kind specs do you have?

                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr>
                    <div class="media">
                        <img src="https://scontent.fmnl17-1.fna.fbcdn.net/v/t1.0-9/s960x960/73197522_4048848071823496_147597569982715570_o.jpg?_nc_cat=106&_nc_sid=85a577&_nc_eui2=AeEFxyr4R19O1GB_XS1Ct8JeY3kmtposX4VjeSa2mixfhesPi5QygbigGdZQFdPw9Yd8nLMA-deSGc4B2bP2Pva3&_nc_ohc=Ef3rl0h2f2sAX-I9fZP&_nc_ht=scontent.fmnl17-1.fna&_nc_tp=7&oh=eaee863fa8f3f6fa4512af7602a9eed4&oe=5F238F73" width="56" height="56" class="rounded-circle mr-3" alt="Katoari Metudomika">
                        <div class="media-body">
                            <small class="float-right text-navy">30m ago</small>
                            <p class="mb-2"><strong>Katoari Metudomika</strong></p>
                            <p>
                                My own gaming computer specs<br>
                               - Machenike T90-T56<br>
                               - Intel Core i5-9400<br>
                               - Nvidia GTX1660 Super 6GB<br>
                               - RAM 8GB DDR4<br>
                               - 250GB-512G SSD<br>
                            </p>
                            <small class="text-muted">Today 7:21 pm</small>
                            <br>
                            <a href="#" class="btn btn-sm btn-danger mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart feather-sm">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg> Like</a>
                        </div>
                    </div>

                    <hr>
                    <div class="media">
                        <img src="https://cdn.fastly.picmonkey.com/contentful/h6goo9gw1hh6/2sNZtFAWOdP1lmQ33VwRN3/24e953b920a9cd0ff2e1d587742a2472/1-intro-photo-final.jpg?w=800&q=70" width="56" height="56" class="rounded-circle mr-3" alt="John Smith">
                        <div class="media-body">
                            <small class="float-right text-navy">3h ago</small>
                            <p class="mb-2"><strong>John Smith</strong></p>
                            <p>Here's my new build system unit.</p>
                            <img src="https://images.techhive.com/images/article/2017/04/ryzen-1600x-build-14-100717294-large.jpg" class="img-fluid" alt="Unsplash">

                            <small class="text-muted">Today 5:12 pm</small>
                            <br>
                            <a href="#" class="btn btn-sm btn-danger mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart feather-sm">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg> Like</a>

                            <div class="media mt-3">
                                <a class="pr-2" href="#">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="36" height="36" class="rounded-circle mr-2" alt="Marie Salter">
                                </a>
                                <div class="media-body">
                                    <p class="text-muted">
                                        <strong>Marie Salter</strong>: Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="media">
                        <img src="defaultprofile.png" width="56" height="56" class="rounded-circle mr-3" alt="">
                        <div class="media-body">
                            <small class="float-right text-navy">4h ago</small>
                            <p class="mb-2"><strong><?php echo $row['name'];?></strong></p>
                            <p>
                                I was looking for cheap and good computer specs for gaming. Can someone send me some good system unit specs?
                            </p>
                            <small class="text-muted">Today 4:21 pm</small>
                            <br>
                            <a href="#" class="btn btn-sm btn-danger mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart feather-sm">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg> Like</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-12 col-xl-3 order-3 order-lg-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-actions float-right">
                        <div class="dropdown show">
                            <a href="#" data-toggle="dropdown" data-display="static">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Activities</h5>
                </div>
                <div class="card-body h-100">

                    <div class="media">
                        <img src="defaultprofile.png" width="36" height="36" class="rounded-circle mr-2" alt="">
                        <div class="media-body">
                            <small class="float-right text-navy">5m ago</small>
                            <strong><?php echo $row['name'];?></strong> started joining Katoari
                            <br>
                            <small class="text-muted">Today 7:51 pm</small>
                            <br>
                        </div>
                    </div>

                    <hr>
                    <div class="media">
                        <img src="https://scontent.fmnl17-1.fna.fbcdn.net/v/t1.0-9/s960x960/73197522_4048848071823496_147597569982715570_o.jpg?_nc_cat=106&_nc_sid=85a577&_nc_eui2=AeEFxyr4R19O1GB_XS1Ct8JeY3kmtposX4VjeSa2mixfhesPi5QygbigGdZQFdPw9Yd8nLMA-deSGc4B2bP2Pva3&_nc_ohc=Ef3rl0h2f2sAX-I9fZP&_nc_ht=scontent.fmnl17-1.fna&_nc_tp=7&oh=eaee863fa8f3f6fa4512af7602a9eed4&oe=5F238F73" width="36" height="36" class="rounded-circle mr-2" alt="Katoari Metudomika">
                        <div class="media-body">
                            <small class="float-right text-navy">30m ago</small>
                            <strong>Katoari Metudomika</strong> posted something on <strong>Marie Salter</strong>'s timeline
                            <br>
                            <small class="text-muted">Today 7:21 pm</small>

                            <div class="border text-sm text-muted p-2 mt-1">
                                
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="media">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="36" height="36" class="rounded-circle mr-2" alt="Marie Salter">
                        <div class="media-body">
                            <small class="float-right text-navy">1h ago</small>
                            <strong>Marie Salter</strong> posted a new blog
                            <br>

                            <small class="text-muted">Today 6:35 pm</small>
                        </div>
                    </div>

                    <hr>
                    <div class="media">
                        <img src="https://cdn.fastly.picmonkey.com/contentful/h6goo9gw1hh6/2sNZtFAWOdP1lmQ33VwRN3/24e953b920a9cd0ff2e1d587742a2472/1-intro-photo-final.jpg?w=800&q=70" width="36" height="36" class="rounded-circle mr-2" alt="John Smith">
                        <div class="media-body">
                            <small class="float-right text-navy">3h ago</small>
                            <strong>John Smith</strong> posted two photos on <strong>Marie Salter</strong>'s timeline
                            <br>
                            <small class="text-muted">Today 5:12 pm</small>

                            <div class="row no-gutters mt-1">
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                    <img src="https://www.mysteryblock.com/wp-content/uploads/2017/12/2000-gaming-PC-build-featured-image-1024x768.jpg" class="img-fluid pr-2" alt="Unsplash">
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                    <img src="https://www.extremetech.com/wp-content/uploads/2018/03/Inno3D-Feature.jpg" class="img-fluid pr-2" alt="Unsplash">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="media">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="36" height="36" class="rounded-circle mr-2" alt="Marie Salter">
                        <div class="media-body">
                            <small class="float-right text-navy">1d ago</small>
                            <strong>Marie Salter</strong> posted a new blog
                            <br>
                            <small class="text-muted">Yesterday 2:43 pm</small>
                        </div>
                    </div>

                    <hr>
                    <div class="media">
                        <img src="https://scontent.fmnl17-1.fna.fbcdn.net/v/t1.0-9/s960x960/73197522_4048848071823496_147597569982715570_o.jpg?_nc_cat=106&_nc_sid=85a577&_nc_eui2=AeEFxyr4R19O1GB_XS1Ct8JeY3kmtposX4VjeSa2mixfhesPi5QygbigGdZQFdPw9Yd8nLMA-deSGc4B2bP2Pva3&_nc_ohc=Ef3rl0h2f2sAX-I9fZP&_nc_ht=scontent.fmnl17-1.fna&_nc_tp=7&oh=eaee863fa8f3f6fa4512af7602a9eed4&oe=5F238F73" width="36" height="36" class="rounded-circle mr-2" alt="Katoari Metudomika">
                        <div class="media-body">
                            <small class="float-right text-navy">1d ago</small>
                            <strong>Katoari Metudomika</strong> started joining Katoari
                            <br>
                            <small class="text-muted">Yesterdag 1:51 pm</small>
                        </div>
                    </div>

                    <hr>
                    <a href="#" class="btn btn-primary btn-sm btn-block">Load more</a>
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
    
    ob_end_flush();  
?>
