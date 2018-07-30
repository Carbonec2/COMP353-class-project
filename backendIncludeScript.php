<?php
include_once(dirname(__FILE__).'/priv/mysqlConnect.php');
include_once(dirname(__FILE__).'/priv/TDGInterface.php');
$pages = scandir('priv/tdg');
//For each DAO file found in the folder, we include it
foreach ($pages AS $page) {
    if (preg_match('#TDG.php$#', $page)) {
        include_once(dirname(__FILE__).'/priv/tdg/' . $page);
    }
    if (preg_match('#DAO.php$#', $page)) {
        include_once(dirname(__FILE__).'/priv/tdg/' . $page);
    }
}