<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        /*
         * include the data base connect file
         * and helper functions as if we are adding
         * the code on the page
         */
        include 'db-connectlab4.php';
        include 'functions.php';
        include './dbdata.php';
        include './htmlsortform.php';
        include './htmlsearch.php';
     
        
          
        //results from dbdata get all function
        $results = getAllCorpData();
                
        //variables for sort
        $bysort = filter_input(INPUT_GET, 'sort');
        $column2 = filter_input(INPUT_GET, 'column2');
        
        //variables for search form/function
         $bycolumn = filter_input(INPUT_GET, 'column');
         $bysearch = filter_input(INPUT_GET, 'search');
         $action = filter_input(INPUT_GET, 'action');
         //action determines which form
         //search and column pertain to action in htmlsearch
         
         //if action === search means 'search' form
         if($action === 'search'){
            $results = searchCorps($bycolumn, $bysearch);
             
         }
         //if for $action === 'sort', other page, 'htmlsortform'
         if ($action === 'sort'){
             $results = sortCorps($bysort, $column2);
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
            <?php
            /*
             * Use a for each loop to go through the
             * associative array. $results is a multi 
             * dimensional array. Arrays with arrays.
             * 
             * So we loop through each result to get back
             * an array with values
             * 
             * feel free to 
             * <?php echo print_r($results); ?>
             * to see how the array is structured
             */            
            ?>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo date("m/d/Y",strtotime($row['incorp_dt'])); ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                   
                </tr>
            <?php endforeach; ?>
        </table>
        <br/>
       
    
    </body>
</html>

