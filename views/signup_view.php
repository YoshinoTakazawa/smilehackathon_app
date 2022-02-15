<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>新規ユーザー登録</title>
</head>

<body>
    <h1>新規ユーザー登録</h1>
    <form action="../signup.php" method="POST">
        <p>お名前：<input type="text" name="name">
            <?php if (isset($errs['name'])) {
                echo $errs['name'];
            }
            ?></p>
        <p>メールアドレス：<input type="text" name="email">
            <?php if (isset($errs['email'])) {
                echo $errs['email'];
            } ?></p>
        <p>パスワード：<input type="password" name="password">
            <?php if (isset($errs['password'])) {
                echo $errs['password'];
            }
            ?></p>
        </table>
        <p><input type="submit" value="登録する"></p>
    </form>
</body>

</html>