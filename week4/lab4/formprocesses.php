<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>My Forms</h1>
        <?php
        
        $action = filter_input(INPUT_POST, 'action');
        
        if ( $action === 'Submit1' ) {
            echo 'submited form 1';
        }
        if ( $action === 'Submit2' ) {
            echo 'submited form 2';
        }
        
        include 'htmlsortform.php';
        include 'htmlsearch.php';
        
        ?>
    </body>
</html>
