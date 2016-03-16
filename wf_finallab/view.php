<!doctype HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>

        <?php
        include './functions/dbconnect.php';
        include './functions/utils.php';
        
      
        
        $db = dbconnect();
        
//        pulls all from table
        $stmt = $db->prepare("Select * FROM address");
        
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        
        <table>
                       
            
<!--            view all-->
        <?php foreach ($results as $row): ?>
                <tr>
                    
                    <td><?php echo $row['fullname']; ?></td>
                    
<!--                    operations-->
                    <td><a href="crud/read.php?id=<?php echo $row['id']; ?>">Read </a></td>
                    <td><a href="crud/update.php?id=<?php echo $row['id']; ?>">Update </a></td>            
                    <td><a href="crud/delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    
                </tr>
            <?php endforeach; ?>
        </table>
        
       
    </body>
</html>