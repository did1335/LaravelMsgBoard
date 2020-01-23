<?php
require_once('sqlconn.php');
sqlconnect();

$Table1 = 'notebook';
$errMsg = '';
$name = '';
$msg = '';

if (!empty($_POST['name']) && !empty($_POST['msg'])) {
    $name = $_POST['name'];
    $msg = $_POST['msg'];
} else {
    $errMsg = '欄位不得為空<br/>';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>簡易留言板</title>
</head>

<body>
    <div id='content'>
        <div id='title'>
            <h1>簡易留言板</h1>
        </div>
        <div id='maintext'>
            <?php
            if ($errMsg == '') {
                date_default_timezone_set('Asia/Taipei');
                $sql = "INSERT INTO $Table1 (name,msg,update_time) VALUES ( '$name' , '$msg' ,getdate())";
                $query = writeDB($sql);
            } else {
                echo "<script type='text/javascript'>";
                echo "alert('" . $errMsg . "')";
                echo "</script>";
            }
            ?>

            <p><a href="index.php">回留言板</a></p>
        </div>
    </div>
</body>

</html>