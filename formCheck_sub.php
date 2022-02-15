<?php
// セッションの開始
session_start();
//入力データを取得 

// ニックネーム
$textName = $_POST["textName"];
// おすすめのカフェの名前
$textArea = $_POST["textArea"];
//おすすめのカフェのURL
$textGenre = $_POST["textGenre"];
// SNSを知らせるか選択
$textMessage = $_POST["textMessage"];

$isError = false;

// ニックネームの未入力チェック 
if (empty($textName)) {
    // 未入力の場合、エラーメッセージを格納
    $_SESSION["errorName"] = "お店の名前が入力されていません";
    $isError = true;
}
//  おすすめのカフェの名前の未入力チェック 
if (empty($textArea)) {
    // 未入力の場合、エラーメッセージを格納
    $_SESSION["errorArea"] = "お店のエリアが入力されていません";
    $isError = true;
}
if (empty($textGenre)) {
    // 未入力の場合、エラーメッセージを格納
    $_SESSION["errorGenre"] = "料理のジャンルが入力されていません";
    $isError = true;
}
//  おすすめのカフェのURLの未入力チェック 
if (empty($textMessage)) {
    // 未入力の場合、エラーメッセージを格納
    $_SESSION["errorMessage"] = "一言メッセージが入力されていません";
    $isError = true;
}

// 入力データをセッションに登録
$_SESSION["textName"] = $textName;
$_SESSION["textArea"] = $textArea;
$_SESSION["textGenre"] = $textGenre;
$_SESSION["textMessage"] = $textMessage;

if ($isError) {
    // エラーの場合、index.php に戻る 
    $_SESSION["formError"] = 1;
    header("Location: ./index.php");
} else {
    // エラーが無い場合、formConfirmation.php に戻る 
    header("Location: ./formConfirmation.php");
    echo $isError;
}
?>