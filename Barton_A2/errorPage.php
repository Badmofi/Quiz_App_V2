<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error Page</title>
        <link rel="stylesheet" href="A2.css">
    </head>
    <body>
        <?php
         echo "<h1 id='error'>Error</h1>";
         echo "<h3>Oops! You did not answer ALL the questions!</h3>";
        ?>
    </body>
</html>
