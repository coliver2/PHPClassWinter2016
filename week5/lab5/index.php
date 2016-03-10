<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">


        <title></title>
    </head>
    <a href="selectdropdown.php"> Select a Web Site</a>
    <br/>
    <h1> Add Site:</h1>
    <br/>
    
    <body>
        <?php
        include './functions/dbconnect.php';
        include './functions/utils.php';


        $results = '';

        $link = filter_input(INPUT_POST, 'link');
        $errors = '';
        $output = '';


        /*
         * easy validation
         */
        if (isPostRequest()) {

            if (filter_var($link, FILTER_VALIDATE_URL) == false) {

                $errors = 'Not a valid URL.';
            } else {
                $output = getLinks($link);
            }
        }

        if (isPostRequest() && empty($errors) && count($output) > 0) {
            
            if (saveSite($link, $output)){
                $results = 'Data Added';
            }else{            
                $errors = "Error. Data not added.";
            }
            
        }
        ?>


        <h1><?php echo $results; ?></h1>
        <h1><?php echo $errors; ?></h1>

        <form method="post" action="#">            

            URL: <input type="text" value="" name="link" />
            <br />          


            <input type="submit" value="Submit" />
        </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
        
    </body>
</html>
