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
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/slider.jpg" width="100px" height="600px" class="d-block w-100"
                    alt="Loading....">
            </div>
            <div class="carousel-item">
                <img src="assets/images/slider2.jpg" width="100px" height="600px" class="d-block w-100"
                    alt="Loading...">
            </div>
            <div class="carousel-item">
                <img src="assets/images/slider3.jpg" width="100px" height="600px" class="d-block w-100"
                    alt="Loading...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br /><br />
    <h2>
        <marquee width="100%" direction="left" height="60px" scrollamount="12" bgcolor="yellow">Welcome To Tech
            Discussions</marquee>
    </h2>
    <div class="row my-3" id="card--store">
        <?php 

          $sql = "SELECT * FROM `categories` ";
          $result = mysqli_query($conn,$sql);
          $s=1;
          $p=1;
          $s=1;
          while($p<=6){

            $row = mysqli_fetch_assoc($result);
            $cat = $row['category_name'];
            $id= $row['category_id'];
            $cat = $row['category_name'];
            $disc = $row['category_description']; 
            echo 
            '<div class="col-md-4 my-3" id="card--in">
               <div class="card " style="width: 18rem;">
                    <img src="assets/images/img'.$s.'.jpg" height="250px" width="500px" class="card-img-top" alt="python">
                    <div class="card-body">
                       <h1 class="card-title">' .$cat.'</a></h1>
                       <p class="card-text">'.substr($disc,0,50).'....</p>
                       <a href="Threads.php?catid=' . $id . '" class="btn btn-primary">View Thread</a>
                    </div>
               </div>
             </div>';
            
             $s = $s+1;
             $p=$p+1;
          }
        ?>
        <br /><br />
        <button onclick="window.location.href = 'Cards.php';">Load More</button>
    </div>

    <br /><br />

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