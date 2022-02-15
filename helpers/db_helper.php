<?php

function get_db_connect() {
try{
    $dsn = DSN;
    $user = DB_USER;
    $password = DB_PASSWORD;

    $dbh = new PDO($dsn, $user, $password);
    }catch (PDOException $e){
       echo($e->getMessage());
       die();
    }
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

function email_exists($dbh, $email) {

    $sql = "SELECT COUNT(id) FROM members where email = :email";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['COUNT(id)'] > 0 ){
        return TRUE;
    }else{
        return FALSE;
    }
}

function insert_member_data($dbh, $name, $email, $password){

    $password = password_hash($password, PASSWORD_DEFAULT);
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO members (name, email, password, created) VALUE (:name, :email, :password, '{$date}')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    if($stmt->execute()){
        return TRUE;
    }else{
        return FALSE;
    }
}

function insert_restaurant_data($dbh, $Restaurant_name, $Restaurant_erea, $Restaurant_genre, $Restaurant_message, $member_id){

    $sql = "INSERT INTO resutaurant (Resturant_name, Resturant_erea, Resturant_genre, Resturant_message, member_id) VALUE (:Restaurant_name, :Restaurant_erea, :Restaurant_genre, :Restaurant_message, :member_id)";
    $stmt = $dbh->prepare($sql);
   //$stmt1 = $dbh->prepare($sql1);
    $stmt->bindValue(':Restaurant_name', $Restaurant_name, PDO::PARAM_STR);
    $stmt->bindValue(':Restaurant_erea', $Restaurant_erea, PDO::PARAM_STR);
    $stmt->bindValue(':Restaurant_genre', $Restaurant_genre, PDO::PARAM_STR);
    $stmt->bindValue(':Restaurant_message', $Restaurant_message, PDO::PARAM_STR);
    $stmt->bindValue(':member_id', $member_id, PDO::PARAM_INT);
    if($stmt->execute()){
        return TRUE;
    }else{
        return FALSE;
    }
}

function select_id($dbh, $member_id){
    $sql = "SELECT * FROM resutaurant WHERE member_id = :member_id LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':member_id', $member_id, PDO::PARAM_INT);
    if($stmt->execute()){
        return TRUE;
    }else{
        return FALSE;
    }
}

function select_member($dbh, $email, $password) {

    $sql = 'SELECT * FROM members WHERE email = :email LIMIT 1';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0 ){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $data['password'])){
            return $data;
        }else{
            return FALSE;
        }
    }else{
        return FALSE;
    }
}



function select_members($dbh) {

    $sql = "SELECT name FROM members";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    return $data;
}

function select_resutaurants($dbh, $member_id) {

    //echo $member_id;

    $sql = "SELECT Resturant_name, Resturant_erea, Resturant_genre, Resturant_message FROM resutaurant WHERE member_id = :member_id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    return $data;
}