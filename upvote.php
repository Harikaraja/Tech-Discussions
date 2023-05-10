<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upvote</title>
    <link rel="stylesheet" href="assets/popup.css" />
</head>
<body>
    <?php include 'partials/connetion.php' ?>
    <?php
    
    if (isset($_GET['com_id'])) {
        $comment_id = $_GET['com_id'];
        //$thr_id = $_GET['thr_id'];
        // get the current upvotes for the comment
        $sql = "SELECT upvotes FROM comments WHERE comment_id='$comment_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $upvotes = $row['upvotes'];
        echo "upvotes are: ";
        echo $upvotes;
        // increment the upvotes
        $upvotes++;

        // update the database
        $sql = "UPDATE comments SET upvotes='$upvotes' WHERE comment_id='$comment_id'";
        mysqli_query($conn, $sql);
    }

            echo '
                    <div class="popup">
                        <img src="assets/images/tick.png" alt="Loading"/>
                        <h2>Voted Sucessfully</h2>
                        <p>You are sucessfully registered. You can now login</p>
                        <button type="button"><a href="Thread_spec.php" style="text-decoration:none;color:white;">Back</a></button>
                    </div>
                    ' ;
    ?>

</body>
</html>



















