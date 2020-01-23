<?php
require_once('sqlconn.php');
sqlconnect();

$Table1 = 'notebook';
$sql = "SELECT * FROM $Table1 ORDER BY id DESC";
//$result = getresult($sql);
$result = sqlsrv_query($conn, $sql);


$sql2 = "SELECT count(*) FROM $Table1";
$numRows = fetcharray($sql2);
$numRows = $numRows[0];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <title>留言板</title>
    <link href="index.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id='content'>
        <div id='title'>
            <h1>記事本</h1>
        </div>
        <div id='maintext'>
            <?php echo "<p>共有" . $numRows . "筆留言"; ?>
            <div id='nav'><a href="leave.html">我要留言</a></div>
            <?php
            if ($numRows > 0) {
                $i = 1;
                while ($row = sqlsrv_fetch_array($result)) {
                    $name = htmlspecialchars($row['name'], ENT_QUOTES);
                    $msg = htmlspecialchars($row['msg'], ENT_QUOTES);
                    $msg = str_replace('  ', '&nbsp;&nbsp;', nl2br($msg));

                    if ($i % 2 == 0) {
                        $liclass = 'even';
                    } else {
                        $liclass = 'odd';
                    }

                    $update = ($row['update_time']);
                    $update = date_format($update, "Y-m-d H:i:s");
                    echo '<div>';
                    echo "<li class=\"$liclass\"><p><strong>$name</strong>
                          <em>於 $update 留言</em>
                          <p>$msg</p></li>";
                    echo '</div>';
                    $i++;
                }
            }
            ?>
        </div>
    </div>
</body>

</html>