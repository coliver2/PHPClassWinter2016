<!doctype HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <h1>Log In:</h1>
        <br/>

        <?php
        include './functions/dbconnect.php';
        include './functions/login-function.php';
        include './functions/utils.php';
        include './includes/loginform.html.php';

        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'pass');
        $output = '';


        /*
         * easy validation
         */
        if (isPostRequest()) {

            if (!strlen($email) || !strlen($password)) {

                $errors = 'Please Enter Valid Email and Password.';
                echo $errors;
            }
            
            if (isValidUser($email, $password)) {
                    include './includes/admin-links.html.php';
                }else if (!isValidUser($email, $password)){
                    $errors = 'Not a valid user';
                    echo $errors;
                }
                
        }
            ?>

    </body>

</html>