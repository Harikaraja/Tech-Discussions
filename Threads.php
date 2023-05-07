<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tech Discussions</title>
    <link rel="stylesheet" href="assets/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <?php include 'partials/nav.php'; ?>
    <?php include 'partials/footer.php' ?>
    <?php include 'partials/connetion.php' ?>

    <?php
      
      $showAlert=false;
      $method = $_SERVER['REQUEST_METHOD'];
      if($method=='POST'){

          //insert question into DB.
            
          $ques_title = $_POST['query--info'];
          $ques_desc = $_POST['query--desc'];
          $id = $_GET['catid'];
          $sno = $_POST['sno'];
          $sql="INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `time stamp`)
                  VALUES (NULL, '$ques_title', '$ques_desc', 
                     '$id', '$sno', current_timestamp());";
          $result = mysqli_query($conn,$sql);
          $showAlert=true;

          if($showAlert){

              echo '
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Query posted Sucessfully &#9989;</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              
              ';
          }

          else{
             
            echo '
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error Posting Your Question . Try Again after some time!!!</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              ';
          }
      }
    ?>

    <?php
      
      $id = $_GET['catid'];
      $sql = "SELECT * FROM `categories` WHERE category_id=$id";
      $result = mysqli_query($conn,$sql);

    
      while($row = mysqli_fetch_assoc($result)){

        $cat_name = $row['category_name'];
        $cat_desc = $row['category_description'];

       
      }

    ?>

    <div class="container my-3">
        <div class="container mt-3 my-3">
            <div class="mt-2 p-4 bg-secondary text-white rounded">
                <h1 class="display-4">Welcome to <?php  echo $cat_name; ?> Thread</h1>
                <p class="lead"><?php echo $cat_desc ; ?></p>
                <p class="lead"><b>Asked on :</p>
                <hr class="my-4">
                <list>
                    <ul>Keep it friendly.</ul>
                    <ul>Be courteous and respectful.</ul>
                    <ul>Appreciate that others may have an opinion different from yours.</ul>
                    <ul>Stay on topic. ...</ul>
                </list>
                <p><strong>This is a peer-to-peer forum for sharing knowledge with Each other</strong></p>
                <h5><b>Posted by : </b></h5></br>
                <a class="btn btn-warning btn-lg" href="#ques" role="button">View Thread</a>

            </div>
        </div>
    </div>
    <br />
    <br />

    <div style="margin-left:7rem;">
        <h1>Post Your Query</h1>

        <?php 
       if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
       {
        echo' 
          <form class="row g-3" action="' .$_SERVER["REQUEST_URI"]. '" method="post">
              <div class="col-md-6">
                  <label for="query--info" class="form-label">
                      <h4>Type Your Query</h4>
                  </label>
                  <input type="text" class="form-control" id="query--info" name="query--info"
                      style="height: 40px;width:800px;border:1px solid black">
              </div>
              <div class="form-floating">
                  <h4>Ellaborate Your Query </h4>
                  <textarea class="form-control" placeholder="Ellaboarte Your Query" id="query--desc"
                    name="query--desc"  style="height: 150px;width:800px;border:1px solid black"></textarea>

              </div>
              <input type="hidden" name="sno" value="' .$_SESSION["id"]. '"/>
              <div class="col-12 mx-3">
                  <button type="submit" class="btn btn-success">Post</button>
              </div>
          </form>';
       }
       else{
        echo '<div class="container my-3">
                  <div class="container mt-1 my-3" style="margin-left:-45px;">
                      <div class="mt-2 p-5 bg-secondary text-white rounded">
                       <h3> <p><i style="margin-left:20px;">You are not logged in .Login to post your Queries &#128519!!! </i></b</p> </h3>
                      </div>
                  </div>
              </div>';
       }
      ?>
    </div>
    <br />
    <div class="container" id="ques">

        <h1>Browse Questions </h1>

        <?php
      
              $id = $_GET['catid'];
              $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
              $result = mysqli_query($conn,$sql);
              $nums = mysqli_num_rows($result);
              $p=1;
             
              if($nums != 0){

                  while($p<=$nums){
                    $p = $p+1;
                    $row = mysqli_fetch_assoc($result);
                    $cat_name = $row['thread_title'];
                    $cat_desc = $row['thread_desc'];
                    $date_time = $row['time stamp'];
                    $user_id = $row['thread_user_id'];
                    $thread_id = $row['thread_id'];
                    $ques_found = false;
                    
                    $sql2 = "SELECT user_email FROM `users` WHERE user_id='$user_id'";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    
                    echo '
                      <div class="d-flex my-3" id="main_div">
                          <img src="assets/images/user.png" alt="Loading...." class="me-3 rounded-circle"
                            style="width: 60px; height: 60px;" />
                            
                          <div>
                          <strong class="text-muted">Posted by : ' .$row2['user_email']. '  on ' .$date_time. ' </strong>
                            <br/>
                          <div   id="internal">
                            <h3><a href="Thread_spec.php?thread_id=' .$thread_id. '" id="decs"> ' .$cat_name. ' </a></h3> 
                            
                          </div> 
                          <h5><p><i>' .$cat_desc. '</i></p></h5>   
                          </div>
                      </div>
                        
                    ';
                
                  }
             
              }
              else{

                echo'
                    <div class="mt-4 p-5 bg-secondary text-white rounded container">
                    <h1><i>No Questions Found </i>&#128542</h1>
                    <p><h4>Be the first person to ask a Question &#128519</h4></p>
                  </div>';
              }
              
                
            ?>

        <br />

    </div>
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