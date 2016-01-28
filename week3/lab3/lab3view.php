<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        
        <h1></h1>
        <?php
        
        include 'db-connectlab3.php';
        include 'function.php';
      
        
        $db = getDatabase();
        
        
        $stmt = $db->prepare("Select * FROM corps");
        
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <table>
            <thead>
                <tr>
                    
                    <th>Corp Name</th>
                </tr>
            </thead>
            
            
            
        <?php foreach ($results as $row): ?>
                <tr>
                    
                    <td><?php echo $row['corp']; ?></td>
                    <td><a href="read.php?id=<?php echo $row['id']; ?>">Read </a></td>
                    <td><a href="updatelab3.php?id=<?php echo $row['id']; ?>">Update </a></td>            
                    <td><a href="deletelab3.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    
                </tr>
            <?php endforeach; ?>
        </table>
        
        <a href ="create.php">Create New Corporation</a>
        
    </body>
</html>
