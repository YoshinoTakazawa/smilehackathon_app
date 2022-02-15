<?php

require_once('config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');

session_start();

if (!empty($_SESSION['member'])) {
    $member_id = $_SESSION['member']['id'];
    //$cnt = count($member_id);
    //echo $cnt;
}

$dbh = get_db_connect();
$res = select_id($dbh, $member_id);
$resutaurants = array();
//全会員データを取得する
//echo $member_id;
$resutaurants = select_resutaurants($dbh, $member_id);



?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP基本トレーニング</title>
</head>

<?php foreach($resutaurants as $resutaurant): ?>
<li>
    <?php 
    echo "<tr>";
    echo "<td>".html_escape($resutaurant['Resturant_name'])."</td>";
    echo "<td>".html_escape($resutaurant['Resturant_erea'])."</td>" ;
    echo "<td>".html_escape($resutaurant['Resturant_genre'])."</td>" ;
    echo "<td>".html_escape($resutaurant['Resturant_message'])."</td>"; 
    ?></li>
<?php endforeach; ?>
<p><a href="./index.php">ホームに戻る</a></p>
<p><a href="./index.php">投稿する</a></p>
<p><a href="./index.php">ホームに戻る</a></p>