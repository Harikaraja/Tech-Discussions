<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
    * {
        margin: 0;
        padding: 0;

    }

    body {
        background-image: url('assets/images/signup.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }


    div.main {
        width: 400px;
        margin-left: 40%;
        margin-top: 9%;
    }

    h2 {
        text-align: center;
        padding: 20px;
        font-family: sans-serif;
    }

    div.register {

        background-color: rgba(0, 0, 0, 0.5);
        width: 100%;
        font-size: 18px;
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 2px px 2px rgba(0, 0, 0, 0.3);
        color: #fff;
    }

    form#register {
        margin: 40px;

    }

    label {
        font-family: sans-serif;
        font-size: 18px;
        font-style: italic;
    }

    input#mail {
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: 0px;
        height: 20px;
        padding: 7px;
        background-color: #fff;
        box-shadow: inset 1px 1px 1px 5px rgba(0, 0, 0, 0);
    }

    input#submit {
        width: 200px;
        padding: 7px;
        font-size: 16px;
        font-family: sans-serif;
        font-weight: 600;
        border: none;
        border-radius: 3px;
        background-color: rgba(250, 100, 0, 0.8);
        color: #fff;
        cursor: pointer;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        margin-bottom: 0px;
    }

    input#password {
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: 0px;
        height: 15px;
        padding: 7px;
        background-color: #fff;
        box-shadow: inset 1px 1px 1px 5px rgba(0, 0, 0, 0);
    }

    label,
    span,
    h2 {

        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);

    }

    .forgot {

        margin-left: 10rem;
        text-decoration: none;
        color: orange;
    }
    </style>
</head>

<body>


    <?php include 'partials/nav.php'; ?>
    <?php include 'partials/footer.php' ?>
    <?php include 'partials/connetion.php' ?>
    <?php 
          
         $showError = "false";

         if($_SERVER["REQUEST_METHOD"] == "POST"){

             $email = $_POST['email'];
             $password = $_POST['password'];
             
                //$hash = password_hash($password,PASSWORD_DEFAULT);
             
                $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
                $ssql = "SELECT * FROM `users` WHERE user_email = '$email' AND user_password = '$password'";
                $result = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($result);
                //echo $num;
                $sresult = mysqli_query($conn,$ssql);
                $snum = mysqli_num_rows($sresult);
                //echo $snum;

             if($num==1){

                $row = mysqli_fetch_assoc($result) ;
                //echo $row;
                if($snum==1) {
                    //session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['useremail']=$email;
                   
                    $_SESSION['id'] = $row['user_id'];
                    
                    //echo "loggged in";
                   // header("Location:./index.php");
                    //exit();
                    echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Login Sucessfull !!!!.Please Go Back to Home . Happy Browsing &#128525 </strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                    ';
                } 
                
            }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Unable to Login. Check Your Username or Password !!!!</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
              ';
            }
            
         }
        

    ?>
    <div class="main">
    
        <a class="nav-link" href="index.php">Home</a></button>
        <div class="register" id="signupPage">
            <h2>Login Here</h2>
            <form id="register" method="post" action="Login.php">
                <label>Email</label>
                <br />
                <input type="email" name="email" id="mail" placeholder="Enter Your mail" required autocomplete="off" />
                <br /><br />
                <label>Password</label>
                <br />
                <input type="password" id="password" name="password" placeholder="Confirm Password" required
                    autocomplete="off" />
                <br /><br />
                <a href="Forgotpassword.php" class="forgot">Forgot Password </a><br />
                <input type="submit" value="Login" id="submit" name="submit" /><br/>
               
                <br /><br />
            </form>
        </div>
    </div>


</body>

</html>