<?php
// セッションの開始 session_start();
// 各入力データを取得
//$textName = $_SESSION["textName"];
//$textArea = htmlspecialchars($_SESSION["textArea"]);
//$textGenre = htmlspecialchars($_SESSION["textGenre"]); 
//$textMessage = $_SESSION["textMessage"];

require_once('config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Restaurant_name = get_post('Restaurant_name');
    $Restaurant_erea = get_post('Restaurant_erea');
    $Restaurant_genre = get_post('Restaurant_genre');
    $Restaurant_message = get_post('Restaurant_message');

    

    $dbh = get_db_connect();
    
    $errs = array();
    //入力値のバリデーション
    if (!check_words($Restaurant_name, 50)) {
        $errs['Restaurant_name'] = 'お店の名前は必須、50文字以内です';
    }

    if (!check_words($Restaurant_erea, 50)) {
        $errs['Restaurant_erea'] = 'お店のエリアは必須、50文字以内です';
    }

    if (!check_words($Restaurant_genre, 50)) {
        $errs['Restaurant_genre'] = '料理のジャンルは必須、50文字以内です';
    }

    if (!check_words($Restaurant_message, 200)) {
        $errs['Restaurant_message'] = '一言メッセージは必須、200文字以内です';
        //echo "YES";
    }
    

    if (!empty($_SESSION['member'])) {
        $member_id = $_SESSION['member']['id'];
        //echo $member_id;
    }
    
    
    //エラーが無ければデータを挿入
    if (empty($errs)) {
        //echo "1";
        if(insert_restaurant_data($dbh, $Restaurant_name, $Restaurant_erea, $Restaurant_genre, $Restaurant_message, $member_id)){
        //echo "2";
        header('Location: '.SITE_URL.'./formResult.php');
        //echo "3";
        exit;
        }
        //$errs['password'] = '登録に失敗しました。';
    }
}

//include_once('../index.php');

// 入力データを登録後に、セッションを削除
/* unset($_SESSION["textName"]);
unset($_SESSION["textArea"]);
unset($_SESSION["textGenre"]);
unset($_SESSION["textMessage"]);
unset($_SESSION["errorName"]);
unset($_SESSION["errorArea"]);
unset($_SESSION["errorGenre"]);
unset($_SESSION["errorMessage"]); */
//登録完了後、入力画面へ遷移 header("Location: ./form.php");
?>