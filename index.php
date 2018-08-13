<?php
include_once('backendIncludeScript.php');

$pages = scandir(dirname(__FILE__) . '/pages');
$wantedPage; //Variable that will contain the wanted page, if set.
//For each file found in the folder, we look if we have a php file. If yes, we look to know if it is the file wanted
foreach ($pages AS $page) {
    if (preg_match('/^.*\.(php)$/i', $page)) {
        if (isset($_GET['page'])) {
            if ($_GET['page'] == explode('.', $page)[0]) {
                //If we have a matching file, we stop the loop here
                $wantedPage = explode('.', $page)[0];
                break;
            }
        }
    }
}

if (!isset($wantedPage)) {
    $wantedPage = 'welcome';
}

//If we want to logout, we destroy the session
if ($wantedPage == 'logout') {
    session_destroy();
    session_start();
}

if ($wantedPage == 'login' && !empty($_SESSION['userId'])) {
    $wantedPage = 'welcome';
    $cameBackFromLogin = true;
}

//If the user wants to see a page forbidden to unlogged user
//if(empty($_SESSION['userId']) &&($wantedPage !='login' && $wantedPage != 'logout' && $wantedPage != 'welcome')){
//    $wantedPage = 'login';
//}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" />-->
        <link rel="stylesheet" href="css/everyPage.css" />
        <script src="js/lib/jquery/jquery-3.3.1.min.js"></script>
        <?php
        //Models, to access every table
        $tdgPages = scandir('js/tdg');
        //For each DAO file found in the folder, we include it
        foreach ($tdgPages AS $page) {
            if (preg_match('#-tdg.js$#', $page)) {
                echo '<script src="js/tdg/' . $page . '"></script>';
            }
        }
        $widgetPages = scandir('js/widget');
        //For each DAO file found in the folder, we include it
        foreach ($tdgPages AS $page) {
            if (preg_match('#Widget.js$#', $page)) {
                echo '<script src="js/widget/' . $page . '"></script>';
            }
        }
        ?>
        <script src="js/head.js"></script>
        <script src="js/lib/handsontable-master/dist/handsontable.full.min.js"></script>
        <link rel="stylesheet" href="js/lib/handsontable-master/dist/handsontable.min.css" />
        <script src="js/lib/handsontable-master/dist/pikaday/pikaday.js"></script>
        <script src="js/lib/handsontable-master/dist/moment/moment.js"></script>
        <link rel="stylesheet" href="js/lib/handsontable-master/dist/pikaday/pikaday.css" />
        <?php
        include_once('includes/head.php');
        //JS and CSS files, specifically for the selected page
        if (file_exists('js/controller/' . $wantedPage . '.js')) {
            echo '<script src="js/controller/' . $wantedPage . '.js"></script>';
        }
        if (file_exists('css/' . $wantedPage . '.css')) {
            echo '<link rel="stylesheet" media="screen" href="css/' . $wantedPage . '.css" />';
        }
        ?>
    </head>
    <body>
        <?php
        include_once('includes/header.php');
        echo '<div id="mainPanel" class="container-fluid text-center mainPanel">';
        if (isset($cameBackFromLogin) && $cameBackFromLogin == true) {
            echo '<p>Welcome '.$_SESSION['username'].'!</p>';
        }
        include_once('pages/' . $wantedPage . '.php');
        echo '</div>';
        include_once('includes/footer.php');
        ?>
    </body>
</html>