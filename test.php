<?php
require_once("../Webpage_Word_Frequency_Counter/lib/detectlanguage.php");
use \DetectLanguage\DetectLanguage;

DetectLanguage::setApiKey('5b3994e0e15708a702331d26cfb89564');

$texts = array("Buenos dias señor", "Hello world");
$results = DetectLanguage::detect($texts);


echo $results[0][0];

var_dump($results);
?>