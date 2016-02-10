<?php

function getAllCorpData(){
    $db = getDatabase();
           
    $stmt = $db->prepare("SELECT * FROM corps");

     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}

/*
 * $stmt = $db->prepare("SELECT * FROM test ORDER BY $column $order");
 */
function searchCorps($column, $search){
    $db = getDatabase();
           
    $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search");

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

function sortCorps($bysort, $column2){
    $db = getDatabase();
    
    $stmt = $db->prepare("SELECT * FROM corps ORDER BY $bysort $column2");
    
    $column2 = '%' .$column2. '%';
    $shin = array(
        ":column2" => $column2
            );
    $results = array();
    if ($stmt->execute($shin) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
       
    
}