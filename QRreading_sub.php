<?php
//セッションの開始
session_start();
// ニックネーム
$textData = $_SESSION["textData"];
// おすすめのカフェの名前
$textDataName = $_SESSION["textDataName"];
//おすすめのカフェのURL
$textDataURL = $_SESSION["textDataURL"];
// SNSを知らせるか選択
$selectData = $_SESSION["selectData"]; 
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP基本トレーニング</title>
</head>

<body>
    <form method="POST" action="./QRview.php" id="inputForm">
        <form method="POST" action="./QRreuslt.php" id="inputForm1">
            <h2>入力したデータ</h2>
            <table>
                <tr>
                    <th>テキスト</th>
                    <th>日付</th>
                    <th>項目</th>
                </tr>
                <?php
        echo "<tr>";
        echo "<td>" . $textData . "</td>";
        echo "<td>" . $textDataName . "</td>";
        echo "<td>" . $textDataURL . "</td>";
        echo "<td>" . $selectData . "</td>";
        echo "</tr>"; 
        ?>
            </table>
            <p><input type="submit"></p>
        </form>
</body>

</html>

<?php
// 入力データを出力後に、セッションを削除
unset($_SESSION["textData"]);
unset($_SESSION["textDataName"]);
unset($_SESSION["textDataURL"]);
unset($_SESSION["selectData"]);
unset($_SESSION["errorTextData"]);
unset($_SESSION["errortextDataName"]);
unset($_SESSION["errortextDataURL"]);
?>