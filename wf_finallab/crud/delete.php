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
        $fullname = filter_input(INPUT_GET, 'fullname');

        $stmt = $db->prepare("DELETE FROM address where address_id = :address_id");

        $binds = array(
            ":address_id" => $id
        );


        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }
        ?>


        <h1> Record <?php echo $fullname; ?>
            <?php if (!$isDeleted): ?> 
                Not
            <?php endif; ?>
            Deleted</h1>





    </body>
</html>


