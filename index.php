<?php
error_reporting(E_ALL | E_STRICT);

include_once("src/Recommendation.php");
include_once("src/Movies.php");

$recommendation = new Recommendation($movies);

$result = $recommendation->algorithm1(3);
$result = $recommendation->algorithm2('W');
$result = $recommendation->algorithm3();
