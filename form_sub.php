<?php
// セッションの開始 
session_start();
// 入力フォーム用セッションの初期化 
if (!isset($_SESSION["textName"])) {
	$_SESSION["textName"] = "";
}
if (!isset($_SESSION["textArea"])) {
	$_SESSION["textArea"] = "";
}
if (!isset($_SESSION["textGenre"])) {
	$_SESSION["textGenre"] = "";
}
if (!isset($_SESSION["textMessage"])) {
	$_SESSION["textMessage"] = "";
}
if	 (!isset($_SESSION["errorName"])) {
$_SESSION["errorName"] = "";
}
if (!isset($_SESSION["errorArea"])) {
	$_SESSION["errorArea"] = "";
}
if (!isset($_SESSION["errorGenre"])) {
	$_SESSION["errorGenre"] = "";
}
if (!isset($_SESSION["errorMessage"])) {
	$_SESSION["errorMessage"] = "";
} ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>HTML+CSS トレーニング</title>
</head>

<body>
    <div class="container">
        <div class="contentheader">今回のお題
        </div>
        <div class="contentbody"> 「はこだてのおすすめのカフェ」
        </div>
        <div class="contentfooter"> 投稿する
        </div>
    </div>

    <h2>入力フォーム</h2>
    <!-- 入力フォームをまとめる  form タグ(method：データの送信方法、action：フォーム の送信先ページ) -->
    <form method="GET" action="./dataRegist.php" id="inputForm">
        <!-- ニックネーム入力-->
        <p>1. お店の名前</p>
        <input type="text" name="textName" value="<?php echo $_SESSION["textName"]; ?>">
        <?php
		// 未入力チェックでエラーの場合は、エラーメッセージを表示 
		if (!empty($_SESSION["errorName"])) {
			echo "<div class=\"errorMessage\">" . $_SESSION["errorName"] . "</div>";
		}
		?>
        <!-- 項目選択(form:この選択肢に対応するフォームタグの id) -->
        <p>2. お店のエリア</p>
        <input type="text" name="textArea" value="<?php echo $_SESSION["textArea"]; ?>">
        <?php
		// 未入力チェックでエラーの場合は、エラーメッセージを表示 
		if (!empty($_SESSION["errorArea"])) {
			echo "<div class=\"errorMessage\">" . $_SESSION["errorArea"] . "</div>";
		}
		?>
        <p>3. 料理のジャンル</p>
        <input type="text" name="textGenre" value="<?php echo $_SESSION["textGenre"]; ?>">
        <?php
		// 未入力チェックでエラーの場合は、エラーメッセージを表示 
		if (!empty($_SESSION["errorGenre"])) {
			echo "<div class=\"errorMessage\">" . $_SESSION["errorGenre"] . "</div>";
		}
		?>
        <p>3. 一言メッセージ</p>
        <input type="text" name="textMessage" value="<?php echo $_SESSION["textMessage"]; ?>">
        <?php
		// 未入力チェックでエラーの場合は、エラーメッセージを表示 
		if (!empty($_SESSION["errorMessage"])) {
			echo "<div class=\"errorMessage\">" . $_SESSION["errorMessage"] . "</div>";
		}
		?>
        <!-- 送信ボタン    -->
        <p><input type="submit"></p>
    </form>
    <button onclick="location.href='./views/signup_view.php'">新規登録</button>
    <button onclick="location.href='./views/login_view.php'">ログイン</button>

</body>

</html>

<?php
// 入力チェック結果を出力後に、セッションを削除
unset($_SESSION["textName"]);
unset($_SESSION["textArea"]);
unset($_SESSION["textGenre"]);
unset($_SESSION["textMessage"]);
unset($_SESSION["errorName"]);
unset($_SESSION["errorArea"]);
unset($_SESSION["errorGenre"]);
unset($_SESSION["errorMessage"]);
?>