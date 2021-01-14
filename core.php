<?php

$action = $_POST['action'];





require_once 'function.php';
require_once 'functionAuth.php';




switch ($action) {

    case 'search':

        search();

        break;

    case 'set':

        set();

        break;

    case 'get':

        get();

        break;

    case 'change':

        change();

        break;
    case 'auth':

        auth();

        break;
    case 'exit':

        exit1();

        break;
    case 'reg':

        reg();

        break;
    case 'del':

        del();

        break;
    case 'edit':

        edit();

        break;  
    case 'userTable':

        userTable();

        break;   
    case 'makrSearch':

        makrSearch();

        break;        
    case 'makrUpdate':

        makrUpdate();

        break;        

}