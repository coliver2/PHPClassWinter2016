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

        $db = dbconnect();

        $result = '';
        if (isPostRequest()) {
            $id = filter_input(INPUT_POST, 'adress_id');
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $address = filter_input(INPUT_POST, 'address');
            $phone = filter_input(INPUT_POST, 'phone');
            $website = filter_input(INPUT_POST, 'website');
            $birthday = filter_input(INPUT_POST, 'birthday');
            $image = filter_input(INPUT_POST, 'image');

            $stmt = $db->prepare("UPDATE address set fulname = :fullname, email = :email, address = :address,
                phone = :phone, website = :website, birthday = :birthday, image = :image");


            $binds = array(
                ":fullname" => $fullname,
                ":email" => $email,
                ":address" => $address,
                ":phone" => $phone,
                ":website" => $website,
                ":birthday" => $birthday,
                ":image" => $image
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $result = 'Record updated';
            }
        } else {
            $id = filter_input(INPUT_GET, 'address_id');
            $stmt = $db->prepare("SELECT * FROM address where address_id = :address_id");
            $binds = array(
                ":address_id" => $id
            );
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            if (!isset($id)) {
                die('Record not found');
            }
            $fullname = $results['fullname'];
            $email = $results['email'];
            $address = $results['address'];
            $phone = $results['phone'];
            $website = $results['website'];
            $birthday = $results['birthday'];
            $image = $results['image'];
        }
        ?>

        <h1><?php echo $result; ?></h1>

        <form method="post" action="#">            
            Name <input type="text" value="<?php echo $fullname; ?>" name="fullname" />
            <br />
            Email <input type="text" value="<?php echo $email; ?>" name="email" />
            <br />  
            Address <input type="text" value="<?php echo $address; ?>" name="address" />
            <br />
            Phone Number <input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br />
            Web Site <input type="text" value="<?php echo $website; ?>" name="website" />
            <br />
            Birthday <input type="text" value="<?php echo $birthday; ?>" name="birthday"/>
            <br />
            Image <input type="text" value="<?php echo $image; ?>" name="image"/>
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>
        <br />
        <a href="index.php?id=<?php echo$row['fullname']; ?>">Back to View </a>


    </body>
</html>

