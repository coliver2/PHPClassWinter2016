<!doctype html>
<html>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php
    include '../functions/dbconnect.php';
    include '../functions/utils.php';
//    html form
    include '../includes/createcontactform.html.php';

    if (isPostRequest()) {
        $db = dbconnect();
        $results = '';
        
//        should insert into database table but doesn't work
        $stmt = $db->prepare("INSERT INTO address SET address_id = :address_id, user_id = :user_id, fullname = :fullname, email = :email, address = :address,
                phone = :phone, website = :website, birthday = :birthday, image = :image");

        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $address = filter_input(INPUT_POST, 'address');
        $phone = filter_input(INPUT_POST, 'phone');
        $website = filter_input(INPUT_POST, 'website');
        $birthday = filter_input(INPUT_POST, 'birthday');
        $image = filter_input(INPUT_POST, 'image');

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
            $results = 'Data Added';
        }
    }
  
    ?>

    
</body>
</html>