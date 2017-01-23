<?php

include_once(dirname(__FILE__).'/priv/mysqlConnect.php');
include_once(dirname(__FILE__).'/priv/daoInterface.php');

$pages = scandir('priv/dao');

//For each DAO file found in the folder, we include it
foreach ($pages AS $page) {
    if (preg_match('#DAO.php$#', $page)) {
        include_once(dirname(__FILE__).'/priv/dao/' . $page);
    }
}

$pages = scandir('priv/controller');

//For each DAO file found in the folder, we include it
foreach ($pages AS $page) {
    if (preg_match('#.php$#', $page)) {
        include_once(dirname(__FILE__).'/priv/controller/' . $page);
    }
}
