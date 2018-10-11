<?php

require('Survey.php');

$survey = new Survey;

if(isset($_POST['submit'])){
	$survey->insertSurvey();
	$survey->sendMail();
	header('location:index.php?email=success');
}

?>