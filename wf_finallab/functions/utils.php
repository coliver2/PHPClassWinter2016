<?php

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}
//get everything from address
function getAllAddresses() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

function createNewAdd($fullname, $email, $address, $phone, $website, $birthday, $image) {

    $db = dbconnect();


//        should insert into database table but doesn't work
    $stmt = $db->prepare("INSERT INTO address SET address_id = :address_id, user_id = :user_id, fullname = :fullname, email = :email, address = :address,
                phone = :phone, website = :website, birthday = :birthday, image = :image");



    $binds = array(
        ":fullname" => $fullname,
        ":email" => $email,
        ":address" => $address,
        ":phone" => $phone,
        ":website" => $website,
        ":birthday" => $birthday,
        ":image" => $image,
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    return false;
}

//check session
function isLoggedIn() {
    
    if ( !isset($_SESSION['loggedin']) 
            || $_SESSION['loggedin'] === false 
            ) {
            return false;
        }
        return true;
}
//search
function searchAddress($column, $search){
    $db = getDatabase();
           
    $stmt = $db->prepare("SELECT * FROM address WHERE $column LIKE :search");

    $search = '%'.$search.'%';
    $binds = array(
        ":search" => $search
    );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
   
}
//sort
function sortAddress( $column2, $bysort){
    $db = getDatabase();
    
    $stmt = $db->prepare("SELECT * FROM address ORDER BY  $column2 $bysort");
    
    $column2 = '%' .$column2. '%';
    
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
       
    
}