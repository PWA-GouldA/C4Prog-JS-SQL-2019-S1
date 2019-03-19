<?php
/**
 * Created by PhpStorm.
 * User: goulda
 * Date: 19/03/2019
 * Time: 9:48 AM
 */

// define the variables
$postVars = $_POST; // grab the POSTed data from the form
$getVars = $_GET;   // grab the GETted data from the form

echo '<h1>POST DATA</h1>';
echo '<pre>';
var_dump($postVars);
echo '</pre>';

echo '<h1>GET DATA</h1>';
echo '<pre>';
var_dump($getVars);
echo '</pre>';
