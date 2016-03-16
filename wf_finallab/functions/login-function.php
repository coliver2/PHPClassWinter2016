<?php

/*
 * users
 * user_id
 * email
 * password
 */

function isValidUser( $email, $pass ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass        
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
}

function createNewAcct($emailNew, $passNew) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO users SET :user_id = user_id");
    $passNew = sha1($passNew);
    
    $binds = array(
        ":email" => $emailNew,
        ":password" => $passNew
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
}