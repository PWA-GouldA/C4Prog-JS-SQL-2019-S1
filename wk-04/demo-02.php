<?php
/**
 * Created by PhpStorm.
 * User: 5001775
 * Date: 25/02/2019
 * Time: 5:01 PM
 */

$get = ($_GET ? $_GET : []);
$post = ($_POST ? $_POST : []);

echo "<h1>GET</h1>";
var_dump($get);

echo "<h1>POST</h1>";
var_dump($post);