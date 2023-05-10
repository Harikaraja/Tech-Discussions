<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tech Discussions</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
    #card--store {
        margin: 2rem;
        margin-left: 6rem;

    }
    </style>

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
            
          $ques_title = $_POST['add--head'];
          $ques_desc = $_POST['add--desc'];
          $dom_id = $_GET['domain_id'];
         
          $sql="INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `date`, `dom_id`) 
                   VALUES (NULL, '$ques_title', '$ques_desc', current_timestamp(), '$dom_id');";
          $result = mysqli_query($conn,$sql);
          $showAlert=true;

          if($showAlert){

              echo '
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Category Added Sucessfully &#9989;</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              
              ';
          }

          else{
             
            echo '
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error in Adding Category . Try Again after some time!!!</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              ';
          }
      }
    ?>
    <h2>
        <center>Find Your Discussion</center>
    </h2>
    <div class="row my-3" id="card--store">
        <?php 
          $domain_id = $_GET['domain_id'];
          $sql = "SELECT * FROM `categories` ";
          $result = mysqli_query($conn,$sql);
          $nums = mysqli_num_rows($result);
          $s=1;
          $flag=0;
          if($nums!=0){
          while($row = mysqli_fetch_assoc($result)){ 
            $cat = $row['category_name'];
            $id= $row['category_id'];
            $cat = $row['category_name'];
            $disc = $row['category_description'];
            $dom_id = $row['dom_id'] ;
            if($domain_id == $dom_id){
                echo 
                '<div class="col-md-4 my-3" id="card--in">
                <div class="card " style="width: 18rem;">
                        <img src="assets/images/img'.$s.'.jpg" height="250px" width="500px" class="card-img-top" alt="python">
                        <div class="card-body">
                        <h4 class="card-title">' .$cat.'</a></h4>
                        <p class="card-text">'.substr($disc,0,50).'....</p>
                        <a href="Threads.php?catid=' . $id . '" class="btn btn-primary">View Thread</a>
                        </div>
                </div>
                </div>';
                $flag=1;
            }
            
             $s = $s+1;
            
          }
          if($flag==0){
            echo'
              <div class="mt-4 p-2 bg-secondary text-white rounded container">
              <h1><i>No Categories Found </i>&#128542</h1>
              <p><h4>Be the first person to Start Your Discussion &#128519</h4></p>
              <ul>
              <li>Start Your Discussion By Starting a new Category Below</li>
              <li>Add the Category name</li>
              <li>Add a little Description (Not more than 200 words)about the Category</li>
              <li>Add an image related to the Category</li>
              </ul>
              <p><b>Note :  </b>Please make sure that you are adding your category in the releavant Domain Only.</p>
            </div>';
          }
        
          }
          
        
        ?>
<br/><br/>
<div style="margin-left:2rem;margin-top:3rem;">
        <h3>Add My Category</h3>
        <h6>Note: Images for the Categories will be added By us</h6>
        <?php 
       if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
       {
        echo' 
          <form class="row g-3" action="' .$_SERVER["REQUEST_URI"]. '"  method="post">
              <div class="col-md-6">
                  <label for="query--info" class="form-label">
                      <h4>Enter the Name of Your Category</h4>
                  </label>
                  <input type="text" class="form-control" id="query--info" name="add--head"
                      style="height: 40px;width:800px;border:1px solid black">
              </div>
              <div class="form-floating">
                  <h4>Ellaborate Your Category </h4>
                  <textarea class="form-control" placeholder="Ellaboarte Your Query" id="add--desc"
                    name="add--desc"  style="height: 150px;width:800px;border:1px solid black"></textarea>

              </div>
           
              <input type="hidden" name="sno" value="' .$_SESSION["id"]. '"/>
              <div class="col-12 mx-3">
                  <button type="submit" class="btn btn-success">Add</button>
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