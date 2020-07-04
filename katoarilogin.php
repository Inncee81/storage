<!--

Name: Anselmo D. Oduca 
Course: BSIT - 2nd Year
Subject: ITMC231 - Platform Technologies

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
        <title>Edit Profile</title>
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

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
        
        <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Quicksand:400,500,700');
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
            .logout{
                text-decoration: none;
                color: white;
            }
            .logout:hover{
                text-decoration: none;
                color: #4E9CAF;
            }
            .card-text{
                text-align: justify;
            }
            .image-user{
                width: 140px;
                height: 140px;
                border-radius: 10px;
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
                  <li class="nav-item">
                    <a class="nav-link" href="katoarihome.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="katoariabout.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="katoariwork.php">FAQ</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="katoarilogin.php"><i class='fas fa-user-circle'></i></a>
                  </li>
                </ul>
              </div>
            </nav>
                    <?php
                        
                        $id = $_SESSION['sess_user'];
                        $query = "SELECT * FROM register where user_ID='$id';";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                        }

                    ?>            
                    <?php
                        $currentid = $_SESSION['sess_user'];
                        $newname = $_POST['name'];
                        $newemail = $_POST['email'];
                        $current_password = $_POST['current_password'];
                        $newpassword = $_POST['new_password'];
                        $confirm_password = $_POST['confirm_password'];
                        //function_alert($row['password']);



                        if (isset($_POST['update']))
                        {
                            if ($current_password==$row['password']) {
                                if ($newpassword == $confirm_password) {

                                    $sql = "UPDATE register SET name='$newname', email='$newemail', password='$newpassword' WHERE user_ID='$currentid'";

                                    $retval = mysqli_query($conn, $sql);

                                    if (! $retval) {
                                        die('Could not update data: ' . mysqli_error());
                                    }
                                    else{
                                         function_alert("Data Successfully Updated");
                                          header('Location: '.$_SERVER['PHP_SELF']);
                                        
                                    }                                    
                                }   
                                else{
                                    function_alert("Password should be match");
                                }
                            }
                            else{
                                    function_alert("Your Current password is wrong");
                            }
                            
                        }   
                                

                     
                ?> 
            <div class="container" style="padding: 20px;">
            <div class="row flex-lg-nowrap">
              <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
              </div>

              <div class="col" >
                <div class="row">
                  <div class="col mb-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="e-profile">
                          <div class="row">
                            <div class="col-12 col-sm-auto mb-3">
                              <div class="mx-auto" style="width: 150px;">
                                <img src="defaultprofile.png" class="image-user">
                              </div>
                            </div>
                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                              <div class="text-center text-sm-left mb-2 mb-sm-0">
                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $row['name'];?></h4>
                                <p class="mb-0"><?php echo $row['email'];?></p>
                                <div class="text-muted"><small>User Id: <?php echo $row['user_ID'];?></small></div>
                                <div class="mt-2">
                                  <button class="btn btn-secondary modalTrigger" type="button" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-fw fa-camera"></i>
                                    <span>Change Photo</span>
                                  </button>
                                </div>
                              </div>
                              <div class="text-center text-sm-right">
                                <span class="badge badge-dark">
                             <?php
                                $name = $row['name'];

                                if ($name == "Anselmo Od" || $name == "Anselm Oduca") {
                                      echo "Admin";
                                }else{
                                    echo "User";
                                }
                            ?>

                                </span>
                                <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                              </div>
                            </div>
                          </div>
                          <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                          </ul>
                          <div class="tab-content pt-3">
                            <div class="tab-pane active">
                              <form class="form" action="#" method="POST">
                                <div class="row">
                                  <div class="col">
                                    <div class="row">
                                      <div class="col">
                                        <div class="form-group" style="width:100%;">
                                          <label>Full Name</label>
                                          <input class="form-control" type="text" name="name" placeholder="<?php echo $row['name'];?>" required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col">
                                        <div class="form-group">
                                          <label>Email</label>
                                          <input class="form-control" type="email"  name="email" placeholder="user@example.com" required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-12 col-sm-6 mb-3">
                                    <div class="mb-2"><b>Change Password</b></div>
                                    <div class="row">
                                      <div class="col">
                                        <div class="form-group">
                                          <label>Current Password</label>
                                          <input class="form-control" type="password" name="current_password" placeholder="••••••" required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col">
                                        <div class="form-group">
                                          <label>New Password</label>
                                          <input  class="form-control" type="password" name="new_password"  placeholder="••••••" required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col">
                                        <div class="form-group">
                                          <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                          <input class="form-control" type="password" name="confirm_password"  placeholder="••••••" required></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                    <div class="mb-2"><b>Keeping in Touch</b></div>
                                    <div class="row">
                                      <div class="col">
                                        <label>Email Notifications</label>
                                        <div class="custom-controls-stacked px-2">
                                          <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                            <label class="custom-control-label" for="notifications-blog">Blog posts</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                            <label class="custom-control-label" for="notifications-news">Newsletter</label>
                                          </div>
                                          <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                            <label class="custom-control-label" for="notifications-offers">Personal Offers</label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col d-flex justify-content-end">
                                    <input class="btn btn-dark" type="submit" value="Save Changes" name="update">
                                  </div>
                                </div>
                              </form>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-md-3 mb-3">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="px-xl-3">
                          <button class="btn btn-block btn-dark">
                            <i class="fa fa-sign-out"></i>
                            <span><a href="katoarilogout.php" class="logout">Logout</a></span>
                          </button>
                        </div>
                      </div>
                    </div>
                    <?php
                        if (isset($_POST['delete'])) {
                                $id = $_SESSION['sess_user'];
                                $sql = "DELETE FROM register WHERE user_ID='$id'";

                                if (mysqli_query($conn, $sql)) {
                                    unset($_SESSION['sess_user']);
                                    session_destroy();
                                    echo "<script> alert(Delete Successfully!); </script>";
                                    header("Location: katoari.php");
                                } else{
                                    echo "Error deleting record: " . mysqli_error($conn);
                                }

                        }                                   
                        
                         ob_end_flush(); 
                    ?>                    
                    <div class="card" >
                      <div class="card-body">
                        <h6 class="card-title font-weight-bold">Reminder</h6>
                        <p class="card-text">If you delete your account you would have no longer access to our website unless you sign up.</p>
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">
                          Delete Account
                        </button>
                        <!--<form action="#" method="POST">
                            <input type="submit" class="btn btn-dark" name="delete" value="Delete Account">-->
                        
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            </div>

            </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                  <div class="modal-body">
                    Are you sure do you want to delete your account?
                  </div>
                  <div class="modal-footer">
                    <form action="#" method="POST">
                            <input type="submit" class="btn btn-dark" name="delete" value="Yes">
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    
                  </div>
                </div>
              </div>
            </div>

			 <!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Upload Picture</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<form action="#" method="POST" enctype="multipart/form-data">
				        <div class="row justify-content-center">
								<input type="file" name="file" style="width: 75%;" />
						</div>
					
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" name="save" class="btn btn-dark">Save changes</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
			</div>
			<?php

				if (isset($_POST['save'])) {
					$file = $_FILES['file'];

					$fileName = $file['name'];
					$fileTmpName = $file['tmp_name'];
					$fileSize = $file['size'];
					$fileError = $file['error'];
					$fileType = $file['type'];

					//File extension
					$fileExt = explode('.', $fileName );
					$fileActualExt = strtolower(end($fileExt));

					$allowed = array('jpg', 'jpeg', 'png');

					if (in_array($fileActualExt, $allowed)) {
						if ($fileError === 0) {
							if ($fileSize < 500000) {
								$fileNameNew = uniqid('', true) .".". $fileActualExt;

								$fileDestination = 'uploads/' . $fileNameNew;

								move_uploaded_file($fileTmpName, $fileDestination);
								function_alert("Picture Uploaded");

							} else{
								function_alert("File is too big");
							}
						} else{
							function_alert("There was an error uploading your file!");
						}

					} else{
						function_alert("You cannot upload files of this type!");
					}
				}


			?>
			<?php
				/*$id = $row['user_ID'];
				$sqlimg = "SELECT * FROM profileimg WHERE userid='$id'";
				$resultimg = mysqli_query($conn, $sqlImg);

				$rowImg = mysqli_fetch_assoc($resultimg);

				if ($rowImg['status'] == 0) {
					echo "uploads/profile" .$id. ".jpg";
				} else{
					echo "uploads/profiledefault.jpg";
				}*/


			?>

            <script type="text/javascript">


            </script>
    </body>
</html>

<?php

    }
?>