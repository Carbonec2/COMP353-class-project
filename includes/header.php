<!--Here is the header, before the main-->
<header>
    <?php
    if (!empty($_SESSION['userId'])) {
        //echo 'Logged in as <strong>' . $_SESSION['user'] . '</strong>.';
        echo '<ul id="nav_bar">
                    <li id="nav_bar_logo"><strong>COMP353</strong></li>
                    <li><a href="index.php?page=logout" id="logoutButton">LOG OUT</a></li>';
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