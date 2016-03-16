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
        $address = $results['zipcode'];
        $phone = $results['owner'];
        $website = $results['phone'];
        $image = $results['image'];
        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Web Site</th>
                    <th>Image</th>
                </tr>
            </thead>



            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['website']; ?></td>
                    <td><?php echo $row['image']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update </a></td>            
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        

    </body>
</html>

