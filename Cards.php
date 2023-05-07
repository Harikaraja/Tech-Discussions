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

    <h2>
        <center>Find Your Discussion</center>
    </h2>
    <div class="row my-3" id="card--store">
        <?php 

          $sql = "SELECT * FROM `categories` ";
          $result = mysqli_query($conn,$sql);
          $s=1;
          while($row = mysqli_fetch_assoc($result)){

            
            $cat = $row['category_name'];
            $id= $row['category_id'];
            $cat = $row['category_name'];
            $disc = $row['category_description']; 
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
            
             $s = $s+1;
            
          }
        ?>

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