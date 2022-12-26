
<?php

$db = mysqli_connect ("localhost","root","","forum");

if(empty($_POST))
{
    header('Location: index.php');
    exit();
}

$result = $_POST['note'];

if(empty($result) or $result == null)
{
    header('Location: index.php?msg=Поле должно быть заполнено');
    exit();
}

$result2 = mysqli_query ($db,"INSERT INTO `posts`(`time`, `msg`, `likes`, `dislikes`) VALUES ('$result','0', '0',NOW())");

header('Location: index.php');

exit();

?>