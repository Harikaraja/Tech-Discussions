<?php include 'partials/connetion.php' ?>
<?php
// connect to the database


// check if the comment ID was provided

if (isset($_GET['com_id'])) {
    $comment_id = $_GET['com_id'];

    // get the current downvotes for the comment
    $sql = "SELECT downvotes FROM comments WHERE comment_id='$comment_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $downvotes = $row['downvotes'];

    // increment the downvotes
    $downvotes++;

    // update the database
    $sql = "UPDATE comments SET downvotes='$downvotes' WHERE comment_id='$comment_id'";
    mysqli_query($conn, $sql);
}


// redirect back to the comments page
//header("Location: comments.php");
//exit();
?>
