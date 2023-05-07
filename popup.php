<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>popup</title>
    
    <link rel="stylesheet" href="assets/styles.css" />
    <link rel="stylesheet" href="assets/popup.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    
</head>
<body style="background-color:rgb(44, 44, 208);">
        <?php include 'partials/nav.php'; ?>
        <?php include 'partials/footer.php' ?>
        <?php include 'partials/connetion.php' ?>
    
    
    <?php   
      
      if($_SERVER["REQUEST_METHOD"] == "POST"){

          $user_fname = $_POST['fname'];
          $user_lname = $_REQUEST['lname'];
          $user_email = $_POST['email'];
          $user_phone = $_POST['phone'];
          $user_pass = $_POST['password'];
          $user_cpass = $_POST['cpassword'];

          $existSql = "select * from `users` where user_email = '$user_email' ";
          $result = mysqli_query($conn,$existSql);
          $num_rows = mysqli_num_rows($result);

          if($num_rows>0){

              $showError = "User already exists";
              echo '
              <div class="popup">
                    <img src="assets/images/wrong.jpg" alt="Loading"/>
                    <h2>Sorry !!!</h2>
                    <p>' .$showError. '</p>
                    <button type="button"><a href="Login.php">Login</a></button>
                </div>
              
              ';

          }
          else{

              if($user_pass == $user_cpass){


                //$hash = password_hash($user_pass,PASSWORD_DEFAULT);
                //echo $hash;
                $chash = password_hash($user_cpass,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_email`, `user_password`, `user_cpassword`, `time_stamp`, `phone`) 
                        VALUES (NULL, '$user_fname', '$user_lname', '$user_email', '$user_pass', ' $user_cpass', current_timestamp(), '$user_phone')";
                $result = mysqli_query($conn,$sql);
                if($result){
                    $showALert = true;
                }
                 
                echo '
                <div class="popup">
                    <img src="assets/images/tick.png" alt="Loading"/>
                    <h2>Thank You!</h2>
                    <p>You are sucessfully registered. You can now login</p>
                    <button type="button"><a href="Login.php" style="text-decoration:none;color:white;">Login</a></button>
                </div>
                ' ;
              }
              else{

                 $showError = "Passwords do not match , Please check the passwords";
                 echo '
                    <div class="popup">
                        <img src="assets/images/wrong.jpg" alt="Loading"/>
                        <h2>Sorry !!!</h2>
                        <p>' .$showError. '</p>
                        <button type="button"><a href="signup.php">Signup</a></button>
                   </div>
              
              ';
               }
          }
      }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>
</html>