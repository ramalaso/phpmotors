<?php
/***********************************************
 * Account  Controller
 *********************************************/

// define("__ROOT__", __DIR__ ."\\");
// require_once __ROOT__ . 'library\connections.php';
// require_once __ROOT__ . 'model\main_model.php';

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main_model.php';

 // Get the array of classifications
 $classifications = getClassifications();

// var_dump($classifications);
// exit;

// Build a navigation bar using the $classifications array
 $navList = '<ul>';
 $navList .= "<li><a href='/index.php' title='View the PHP Motors home page'>Home</a></li>";
 foreach ($classifications as $classification) {
  $navList .= "<li><a href='/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
 }
 $navList .= '</ul>';

 $action = filter_input(INPUT_GET, 'action');
 if($action == NULL) {
     $action = filter_input(INPUT_POST, 'action');
 }

 switch ($action) {
     case 'login':
         include '../view/login.php';
         break;
    case 'registration':
        include '../view/registration.php';
        break;
     default:
        include '../view/home.php';
        break;
 }


?>