<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<!--        bootstrap stuff-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
        <h1><a href="index.php" >Return to Add Site</a></h1>
            <br />                              
            <h1>Select A Web Site URL:</h1>
            <br />
            
        <?php
            require './functions/dbconnect.php';
            require './functions/utils.php';
            
            
                $db = dbconnect();

                $stmt = $db->prepare("SELECT * FROM sites ORDER BY site DESC");
                $site = array();
                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $site = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                $site_id = '';
                
                if ( isPostRequest() ) {
                    
                    
                    $stmt = $db->prepare("SELECT * FROM sitelinks WHERE site_id = :site_id");
                    $site_id = filter_input(INPUT_POST, 'site_id');
                    $binds = array(
                    ":site_id" => $site_id
                    );

                    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        $error = 'No Results found';
                    }
                    
                    
                    
                }
                
        ?>
        
        <?php if( isset($error) ): ?>        
            <h1><?php echo $error;?></h1>
        <?php endif; ?>
            
        <form method="post" action="#">
 
            <select name="site_id">
            <?php foreach ($site as $row): ?>
                <option 
                    value="<?php echo $row['site_id']; ?>"
                    <?php if( intval($site_id) === $row['site_id']) : ?>
                        selected="selected"
                    <?php endif; ?>
                >
                    <?php echo $row['site']; ?>
                </option>
            <?php endforeach; ?>
            </select>

            <input type="submit" value="Submit" />
        </form>
        
        
        
        
        <?php if( isset($results) ): ?>
 
            <h2>Results found <?php echo count($results); ?></h2>
            <table border="1">        
                <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['link']; ?></td> 
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>
            
            

        
<!--            bootstrap stuff-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>