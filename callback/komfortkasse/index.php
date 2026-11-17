<?php
/**
 * Komfortkasse
 * routing
 *
 * @version 1.4.5.4-xtc4/xct3
 */

ini_set('default_charset', 'utf-8');

// error_reporting(E_ALL);
// ini_set('display_errors', '1');
$basepath = explode('callback', $_SERVER['SCRIPT_FILENAME']) ;
require_once ($basepath[0].'includes/configure.php');
require_once (DIR_WS_INCLUDES.'application_top_callback.php');
include_once 'Komfortkasse.php';


$action = Komfortkasse_Config::getRequestParameter('action');

// Only the actions Komfortkasse calls; never dispatch to arbitrary public methods.
$allowedActions = array (
        'init',
        'test',
        'readorders',
        'updateorders',
        'info',
        'readrefunds',
        'updaterefunds',
        'readinvoicepdf',
        'readconfig'
);
if (!is_string($action) || !in_array($action, $allowedActions, true)) {
    header('HTTP/1.1 400 Bad Request');
    exit();
}

$kk = new Komfortkasse();
$kk->$action();

?>