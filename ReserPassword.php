<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
    

    .popup {
        width: 400px;
        background: #fff;
        border-radius: 6px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        padding: 0 30px 30px;
        color: #333;
        border:1px solid black;
        background-color:pink;
    }

    .popup img {
        width: 100px;
        margin-top: -50px;
        border-radius: 80%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .popup h2 {

        font-size: 38px;
        font-weight: 500;
        margin: 30px 0 10px;
        color:white;

    }

    .popup button {
        width: 100%;
        margin-top: 50px;
        padding: 10px 0;
        background-color: #0ed83a;
        color: white;
        border: 0;
        outline: none;
        font-size: 18px;
        border-radius: 4px;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);

    }
    </style>
</head>

<body>

    <?php include 'partials/nav.php'; ?>
    <?php include 'partials/footer.php' ?>
    <?php include 'partials/connetion.php' ?>
    <div class="main">
        <?php
    
        $showError = "false";
        $method = $_SERVER["REQUEST_METHOD"] ;
        //echo $method;
        if($method == "POST"){
        $email = $_POST['email'];
        $chpass = $_POST['password'];
        
        $cpass = $_POST['cpassword'];
            $sql = "SELECT * FROM `users` WHERE user_email = '$email' ";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            //echo $num;
            if($num==0){

                echo '
                    <div class="popup">
                        <img src="assets/images/wrong.jpg" alt="Loading"/>
                        
                        <p>This Email is not registered . Please Check your mail and Try Again</p>
                        <button type="button"><a href="Login.php" style="text-decoration:none;color:white;">Login</a></button>
                    </div>
                  ' ;
                
            }
            else{

                $sql = "UPDATE `users` SET `user_password` = '$chpass' WHERE `users`.`user_email` = '$email'";
                $result = mysqli_query($conn,$sql);
                //echo $result;
                if($result){
                    //echo "hello";
                    echo '
                    <div class="popup">
                        <img src="assets/images/tick.png" alt="Loading"/>
                        
                        <h4><p>Your Password Updated Sucessfully</p></h4>
                        <button type="button"><a href="Login.php" style="text-decoration:none;color:white;">Login</a></button>
                    </div>
                  ' ;
                 }
                else{
                    //echo "hii";
                    echo '
                    <div class="popup">
                        <img src="assets/images/wrong.jpg" alt="Loading"/>
                        
                        <h4><p>Failed TO Update Try Again Later</p></h4>
                        <button type="button"><a href="Login.php" style="text-decoration:none;color:white;">Login</a></button>
                    </div>
                  ' ;
                }
            }
        //header("Location: /techdiscuss/idex.php"); 
      }
      ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
</body>

</html>