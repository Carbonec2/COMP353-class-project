<!--Here is the header, before the main-->
<header>
    <?php
    if (!empty($_SESSION['userId'])) {
        //echo 'Logged in as <strong>' . $_SESSION['user'] . '</strong>.';
        echo '<ul id="nav_bar">
                    <li id="nav_bar_logo" style="padding: 0px;"><strong><a href="index.php?page=welcome">COMP353</a></strong></li>';
        echo '<li><a href="index.php?page=logout" id="logoutButton">LOG OUT</a></li>';
        
        switch ($_SESSION['roleType']) {
            case 'Sales Associate':
                echo '<li><span>Logged as Sales Associate</span></li>';
                echo '<li><a href="index.php?page=createClientAccount" id="createClientAccount">Create a Client</a></li>';
                echo '<li><a href="index.php?page=reports" id="employeeList">Reports</a></li>';
                break;
            case 'Manager':
                echo '<li><span>Logged as Manager</span></li>';
                echo '<li><a href="index.php?page=reports" id="employeeList">Reports</a></li>';
                break;
            case 'Admin':
                echo '<li><span>Logged as Admin</span></li>';
                echo '<li><a href="index.php?page=employeeList" id="employeeList">Employee List</a></li>';
                echo '<li><a href="index.php?page=reports" id="employeeList">Reports</a></li>';
                break;
            case 'Employee':
                echo '<li><span>Logged as Employee</span></li>';
                echo '<li><a href="index.php?page=workChoice" id="employeeList">Work Choice</a></li>';
        }
        
        if(isset($_SESSION['clientId'])&&!empty($_SESSION['clientId'])){
            echo '<li><span>Logged as Client</span></li>';
        }
        echo '<li><a href="index.php?page=contractList" id="contractList">Contract List</a></li>';
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