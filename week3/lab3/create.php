<!doctype html>

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
        include 'db-connectlab3.php';
        include 'function.php';
                

        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();

            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email,
                zipcode = :zipcode, owner = :owner, phone = :phone");
                    
            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');

            $binds = array(
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone,
            );

            /*
             * empty()
             * isset()
             */

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            Corporation Name <input type="text" value="" name="corp" />
            <br />
            E-Mail <input type="text" value="" name="email" />
            <br />
            Zip <input type="text" value="" name="zipcode"/>
            <br />
            Owner <input type="text" value="" name="owner"/>
            <br />
            Phone Number <input type="text" value="" name="phone"/>
            <br />

            <input type="submit" value="Submit" />
        </form>
        
        <a href="lab3view.php?id=<?php echo$row['corp']; ?>">Back to View </a>
    </body>
</html>

