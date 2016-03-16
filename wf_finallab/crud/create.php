<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
    include '../functions/dbconnect.php';
    include '../functions/utils.php';
//    html form
    include '../includes/createcontactform.html.php';
    
    $addressees = getAllAddresses();
    if (isPostRequest()) {
            
           $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $address = filter_input(INPUT_POST, 'address');
        $phone = filter_input(INPUT_POST, 'phone');
        $website = filter_input(INPUT_POST, 'website');
        $birthday = filter_input(INPUT_POST, 'birthday');
        $image = filter_input(INPUT_POST, 'image');
        
        if(createNewAdd($fullname, $email, $address, $phone, $website, $birthday, $image)){
            $results = 'New Contact Added';
        }
        
        
        
    }
    ?>
    </body>
</html>