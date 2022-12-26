
<?php

$db = mysqli_connect ("localhost","root","","forum");

if(isset($_POST['like']))
{
    $id_like = $_POST['like'];
    $sql = mysqli_query($db, 'UPDATE posts SET likes = likes + 1 WHERE id = '.$id_like.'');
    header('Location: index.php');
    exit();
}

if(isset($_POST['dislike']))
{
    $id_dislike = $_POST['dislike'];
    echo $_POST['dislike'];
    $sql = mysqli_query($db, 'UPDATE posts SET dislikes = dislikes + 1 WHERE id = '.$id_dislike.'');
    echo $id_dislike;
}

header('Location: index.php');

exit();

?>