
<?php

    $db = mysqli_connect ("localhost","root","","forum");
    echo $_GET['msg'];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="public.php" method="POST" enctype="multipart/form-data">
        <comm_txtarea name="note" cols="30" rows="10" placeholder="Текст сообщения"></comm_txtarea>
        <br><input name="post" type="submit"></br>
        <br></br>
        <strong>

    <?php 
            if(isset($_GET['msg']))
            {
                echo $_GET['msg'];
            }    
     ?>

         </strong>
    </form>

<?php


$sql = mysqli_query($db, 'SELECT `likes`, `dislikes`, `id`, `msg`, `time` FROM posts');
$sql2 = mysqli_query($db, 'SELECT `id_msg`, `id`, `msg`, `time` FROM comments');

while ($result = mysqli_fetch_assoc($sql)) {
    echo '<br>';
    print "{$result['msg']}: {$result['time']}

    <form action='like.php' method='POST'>
    <button style='width:25x;height:25px' name='like' type='submit'value='{$result['id']}'> 👍 {$result['likes']}</button>
    
    <button style='width:25x;height:25px' name='dislike' type='submit' value='{$result['id']}'> 👎 {$result['dislikes']}</button></form></h2>
    <form action='comm_add.php' method'GET'>
    <input name='comment' type='comm_txt' placeholder='Ваш комментарий'><button name='com' type='submit' value='{$result['id']}'> Комментировать </button></form>";

    foreach($sql2 as $result2)
    {
        if($result2['id_msg'] == $result['id'])

        {
            print "<span id='dots' style='display:none'></span><span style='display: inline' id='more'>{$result2['msg']}: {$result2['time']}</div><br></span>";
        }
    }
}

?>

</body>
</html>