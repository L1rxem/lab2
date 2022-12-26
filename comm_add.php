
<?php

$db = mysqli_connect ("localhost","root","","forum");

if(isset($_GET['comment']))
{
    if(isset($_GET['com']))
    {
        $id_msg = $_GET['com'];
        $comment = $_GET['comment'];
        $id = 0;
        $sql = mysqli_query($db, "INSERT INTO comments (id, id_msg, msg, time) VALUES ('$id', '$id_msg', '$comment', NOW())");
    }
}

header('Location: index.php');
exit();

?>