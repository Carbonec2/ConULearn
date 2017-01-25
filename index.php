<?php
session_start();

include_once('backendIncludeScript.php');

$pages = scandir('pages');

$wantedPage; //Variable that will contain the wanted page, if set. 
//For each file found in the folder, we look if we have a php file. If yes, we look to know if it is the file wanted
foreach ($pages AS $page) {
    if (preg_match('/^.*\.(php)$/i', $page)) {
        if ($_GET['page'] == explode('.', $page)[0]) {
            //If we have a matching file, we stop the loop here
            $wantedPage = explode('.', $page)[0];
            break;
        }
    }
}

if (!isset($wantedPage)) {
    $wantedPage = 'welcome';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" href="css/style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <?php
        include_once('includes/head.php');

        //JS and CSS files, specifically for the selected page
        if (file_exists('js/controller/' . $wantedPage . '.js')) {
            echo '<script src="js/controller/' . $wantedPage . '.js"></script>';
        }
        if (file_exists('css/controller/' . $wantedPage . '.css')) {
            echo '<link rel="stylesheet" media="screen" href="css/controller/' . $wantedPage . '.css" />';
        }

        //Models, to access every table
        $pages = scandir('js/dao');

        //For each DAO file found in the folder, we include it
        foreach ($pages AS $page) {
            if (preg_match('#-dao.js$#', $page)) {
                echo '<script src="js/dao/' . $page . '"></script>';
            }
        }
        //TODO: Upload an up-to-date version of jQuery
        ?>
    </head>
    <body>
        <?php
        include_once('includes/header.php');

        include_once('pages/' . $wantedPage . '.php');

        include_once('includes/footer.php');
        ?>
    </body>
</html>
