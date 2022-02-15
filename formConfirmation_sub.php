<?php
//セッションの開始
session_start();
// ニックネーム
$textName = $_SESSION["textName"];
// おすすめのカフェの名前
$textArea = $_SESSION["textArea"];
//おすすめのカフェのURL
$textGenre = $_SESSION["textGenre"];
// SNSを知らせるか選択
$textMessage = $_SESSION["textMessage"];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP基本トレーニング</title>
</head>

<body>
    <h2>入力したデータ</h2>
    <table>
        <tr>
            <th>テキスト</th>
            <th>日付</th>
            <th>項目</th>
        </tr>
        <?php
        echo "<tr>";
        echo "<td>" . $textName . "</td>";
        echo "<td>" . $textArea . "</td>";
        echo "<td>" . $textGenre . "</td>";
        echo "<td>" . $textMessage . "</td>";
        echo "</tr>";
        ?>
    </table>
    <button onclick="location.href='./dataRegist.php'">遷移</button>
</body>

</html>

<?php
// 入力データを出力後に、セッションを削除
unset($_SESSION["textName"]);
unset($_SESSION["textArea"]);
unset($_SESSION["textGenre"]);
unset($_SESSION["textMessage"]);
unset($_SESSION["errorName"]);
unset($_SESSION["errorArea"]);
unset($_SESSION["errorGenre"]);
unset($_SESSION["errorMessage"]);
?>