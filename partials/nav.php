<?php 
session_start();

echo '
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Tech Discussions</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="About.php">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="domains.php">Domains</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    
                    
                    <li class="nav-item">
                    <button type="button" class="mx-4" style="background-color:Yellow;width:170px;height:40px;border:none;color:white;">
                    <a class="nav-link" href="Mydisc.html">Rate Us</a></button>
                    
                    </li>
                </ul>';
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
               
          echo '
            
           
              <div>
              <img src="assets/images/profile.jpg" width="30px" height="30px" style="margin-left:50px;" /><br/>
              <h6>' .$_SESSION['useremail']. '</h6>
              </div>

            
            <a href="Logout.php">
            <button type="button" class="btn btn-success ml-4 mx-3" id="signup-button" >Logout</button>
            <a/>';
          }
          else{
          echo '
          <div class="mx-3">
              <button type="button" class="btn btn-success" id="login-button">Login</button>
              <button type="button" class="btn btn-success" id="signup-button" >Signup</button>
          </div>';

          }
            echo'
            </div>
        </div>
    </nav>';
    echo'
    <script>
    
    const signupButton = document.getElementById("signup-button");
  
    signupButton.addEventListener("click", () => {
      
      window.location.href = "signup.php";
    });
  </script>

  <script>
   
    const loginButton = document.getElementById("login-button");
  
    loginButton.addEventListener("click", () => {
     
      window.location.href = "Login.php";
    });
  </script>
    
' ;
?>