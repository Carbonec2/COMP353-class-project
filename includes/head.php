
<!-- THIS IS FOR BOOTSTRAP -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/lib/bootstrap-3.3.7/dist/css/bootstrap.min.css">
<!-- Latest compiled JavaScript -->
<script src="css/lib/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
<!-- END FOR BOOTSTRAP-->

<?php
echo '<script type="text/javascript">';
//The role of the user is set in a global variable
if (isset($_SESSION['roleType']) && !empty($_SESSION['roleType'])) {
    echo 'var globalRole = "' . $_SESSION['roleType'] . '";';
} else if (isset($_SESSION['clientId']) && !empty($_SESSION['clientId'])) {
    echo 'var globalRole = "Client";';
}
echo '</script>';
?>