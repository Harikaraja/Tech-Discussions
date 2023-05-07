<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

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
        margin-top: 3%;
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

    input#fname {
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: 0px;
        height: 20px;
        padding: 7px;
        background-color: #fff;
        box-shadow: inset 1px 1px 1px 5px rgba(0, 0, 0, 0);
    }

    input#lname {
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: 0px;
        height: 20px;
        padding: 7px;
        background-color: #fff;
        box-shadow: inset 1px 1px 1px 5px rgba(0, 0, 0, 0);
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

    input#phone {
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: 0px;
        height: 20px;
        padding: 7px;
        background-color: #fff;
        box-shadow: inset 1px 1px 1px 5px rgba(0, 0, 0, 0);
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

    input#cpassword {
        width: 300px;
        border: 1px solid #ddd;
        border-radius: 3px;
        outline: 0px;
        height: 15px;
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

    label,
    span,
    h2 {

        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);

    }

    .log {
        text-decoration: none;
        color: orange;
    }
    </style>
</head>

<body>

    <?php $signupsucess=false; ?>
    <button type="button" class="mx-4"
        style="background-color:pink;width:170px;height:40px;border:none;color:white;margin-left:2rem;margin-top:2rem;">
        <a class="nav-link" href="index.php">Home</a></button>
    <div class="main">

        <div class="register" id="signupPage">
            <h2>Register Here</h2>
            <form id="register" method="post" action="popup.php">
                <label>First Name</label>
                <br />
                <input type="text" name="fname" id="fname" placeholder="Enter your First name" required
                    autocomplete="off">
                <br /><br />
                <label>Last Name</label>
                <br />
                <input type="text" name="lname" id="lname" placeholder="Enter your Last name" required
                    autocomplete="off">
                <br /><br />
                <label>Email</label>
                <br />
                <input type="email" name="email" id="mail" placeholder="Enter Your mail" required autocomplete="off" />
                <br /><br />
                <label>Mobile</label>
                <br />
                <input type="tel" id="phone" name="phone" placeholder="1234567890" required autocomplete="off" />
                <br /><br />
                <label>Password</label>
                <br />
                <input type="password" id="password" name="password" placeholder="Password" required
                    autocomplete="off" />
                <br /><br />
                <label>Confirm Password</label>
                <br />
                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" required
                    autocomplete="off" />
                <br /><br />

                <br />
                <input type="submit" value="Register" id="submit" name="submit" />
                <br /><br />
                <p>Already Registered <a href="Login.php" class="log">Login </a>here</p>
            </form>
        </div>
    </div>

    <script src="popup.js"></script>

</body>

</html>