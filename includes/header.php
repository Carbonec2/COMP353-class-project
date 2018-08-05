<!--Here is the header, before the main-->
<header>
    <?php
    if (!empty($_SESSION['userId'])) {
        //echo 'Logged in as <strong>' . $_SESSION['user'] . '</strong>.';
        echo '<ul id="nav_bar">
                    <li id="nav_bar_logo" style="padding: 0px;"><strong><a href="index.php?page=welcome">COMP353</a></strong></li>
                    <li><a href="index.php?page=logout" id="logoutButton">LOG OUT</a></li>';
        switch ($_SESSION['roleType']) {
            case 'Sales Associate':
                echo '<li><a href="index.php?page=createClientAccount" id="createClientAccount">Create a Client</a></li>';
                break;
        }
        echo '</ul>';
    } else {
        echo '<ul id="nav_bar">
                    <li id="nav_bar_logo"><strong>COMP353</strong></li>
                    <li><a href="index.php?page=login">SIGN IN</a></li>
                    <li><a href="index.php?page=register">SIGN UP</a></li>
                    <li><a href="index.php">HOME</a></li>
                </ul>';
    }
    ?>
</header>