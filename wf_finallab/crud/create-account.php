<?php
    
    include '../functions/login-function.php';
    include '../functions/dbconnect.php';
    include '../functions/utils.php';
    
    $emailNew = filter_input(INPUT_POST, 'emailNew');
    $passNew = filter_input(INPUT_POST, 'passNew');
    $word = '';
    
    if(isPostRequest()){
        
        if(createNewAcct($emailNew, $passNew)){
            $word = 'Account Created';
        }
        
    }
    include '../includes/createacctform.php';