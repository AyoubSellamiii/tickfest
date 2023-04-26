<?php
function pdo_connect_mysql() {
    // a jours mysql
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'ticketfest';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// en cas d erreur 
    	exit('Failed to connect to database!');
    }
}
// en tete
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="./assets/css/style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>event System</h1>
                <a href="index.php"><i class="fas fa-event-alt"></i>back</a>
                <a href="home.php"><i class="fas fa-event-alt"></i>Home</a>
            </div>
        </nav>
    EOT;
    }
    // Template footer
function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
    ?>