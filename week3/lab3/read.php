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
        
        <?php
        /*
         * includes
         */
        include 'db-connectlab3.php';
        include 'function.php';
        
       
        $db = getDatabase();

        /*
         * 
         * returns the single row where the id's match the read selections
         */
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
               
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                if ( !isset($id) ) {
                    die('Record not found');
                }
                $corp = $results['corp'];
                $email = $results['email'];
                $zipcode = $results['zipcode'];
                $owner = $results['owner'];
                $phone = $results['phone'];
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
                    <th>Corporation Name</th>
                    <th>Incorporation Date</th>
                    <th>E-Mail</th>
                    <th>Zip</th>
                    <th>Owner</th>
                    <th>Phone</th>
                </tr>
            </thead>
         
            
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo date("m/d/Y",strtotime($row['incorp_dt'])); ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><a href="updatelab3.php?id=<?php echo $row['id']; ?>">Update </a></td>            
                    <td><a href="deletelab3.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <a href="lab3view.php?id=<?php echo$row['corp']; ?>">Back to View </a>
    
    </body>
</html>

