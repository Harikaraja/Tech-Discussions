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
            
       
          $comment_desc = $_POST['comment--desc'];
          $id = $_GET['thread_id'];
          $sno = $_POST['sno'];
          $sql="INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `time stamp`, `comment_by`) 
                         VALUES (NULL, '$comment_desc', '$id', current_timestamp(), '$sno');";

          $result = mysqli_query($conn,$sql);
          $showAlert=true;

          if($showAlert){

              echo '
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Comment posted Sucessfully &#9989;</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              
              ';
          }

          else{
             
            echo '
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error Posting Your Comment . Try Again after some time!!!</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              ';
          }
      }
    ?>

    <?php
      
      $id = $_GET['thread_id'];
      $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
      $result = mysqli_query($conn,$sql);

    
      while($row = mysqli_fetch_assoc($result)){

        $ques_name = $row['thread_title'];
        $ques_desc = $row['thread_desc'];
        $ques_user_id = $row['thread_user_id'];
        $timestamps = $row['time stamp'];
       
      }

    ?>

    <div class="container my-3">
        <div class="container mt-3 my-3">
            <div class="mt-2 p-4 bg-secondary text-white rounded">
                <h1 class="display-4"><?php echo $ques_name ?></h1>

                <hr class="my-4">
                <h2>
                    <p><i><?php echo $ques_desc ?> </i></p>
                </h2>
                <h5 class="container" style="margin-left:45rem"><b>Posted by : <?php echo $ques_user_id ?> on
                        <?php echo $timestamps ?> </b></h5></br>
                <a class="btn btn-warning btn-lg" href="#sols" role="button">View Discussion</a>

            </div>
        </div>
    </div>
    <br />
    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
        {
          echo'
            <div style="margin-left:7rem;">
                <h2>Post Your View</h2>

                <form class="row g-3" action="' .$_SERVER["REQUEST_URI"].'" method="post">
                    <div class="form-floating">
                        <h5>Ellaborate Your Comment </h5>
                        <textarea class="form-control" placeholder="Ellaboarte Your Query" id="comment--desc"
                            name="comment--desc" style="height: 150px;width:800px;border:1px solid black"></textarea>

                    </div>
                    <input type="hidden" name="sno" value="' .$_SESSION["id"]. '"/>
                    <div class="col-12 mx-3">
                        <button type="submit" class="btn btn-success">Post Comment</button>
                    </div>
                </form>
              </div>';
        }
        else{
          echo '<div class="container my-3">
                    <div class="container mt-1 my-3" style="margin-left:-5px;">
                        <div class="mt-2 p-5 bg-secondary text-white rounded">
                        <h3> <p><i style="margin-left:40px;">You are not logged in .Login to post your answer &#128519!!! </i></b</p> </h3>
                        </div>
                    </div>
                </div>';
        }
     ?>

    <br />
    <div class="container" id="sols">

        <h1>Discussions</h1>

        <?php
      
        $id = $_GET['thread_id'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($conn,$sql);
        $nums = mysqli_num_rows($result);
        $p=1;
      
        if($nums != 0){

            while($p<=$nums){
              $p = $p+1;
              $row = mysqli_fetch_assoc($result);
              $comment_desc = $row['comment_content'];
              $timestamp = $row['time stamp'];
              $comment_by = $row['comment_by'];
             
              $ques_found = false;
              $sql2 = "SELECT user_email FROM `users` WHERE user_id='$comment_by'";
              $result2 = mysqli_query($conn,$sql2);
              $row2 = mysqli_fetch_assoc($result2);
              
              echo '
                <div class="d-flex my-3" id="main_div">
                    <img src="assets/images/user.png" alt="Loading...." class="me-3 rounded-circle"
                      style="width: 60px; height: 60px;" />
                    <div>
                    
                    <h5><b> ' .$row2['user_email']. ' </b></h5>
                    <div style = "display:flex;justify-content:center; gap:25rem" id="internal">
                      <h5><p><i>' .$comment_desc. '</i></p></h5> 
                      <strong class="text-muted">Posted by : ' .$row2['user_email']. '  on ' .$timestamp. ' </strong>
                    </div> 
                      
                    </div>
                </div>
                  
              ';
          
            }
      
        }
        else{

          echo'
              <div class="mt-4 p-5 bg-secondary text-white rounded container">
              <h1><i>No answer Found </i>&#128542</h1>
              <p><h4>Be the first person to answer &#128519</h4></p>
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