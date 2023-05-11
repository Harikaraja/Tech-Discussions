<?php include 'partials/connetion.php' ?>

<?php
    
    
    if(isset($_GET['com_id'])){
        $com_id = $_GET['com_id'];
        $thread_id = $_GET['thread_id'];
        $sql = "UPDATE `comments` SET `upvotes` = `upvotes` + 1 WHERE `comment_id`=$com_id";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("Location: Thread_spec.php?thread_id=$thread_id"); // redirect back to the threads page
        }
    }
?>
