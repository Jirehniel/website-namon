<?php
	echo "<title>Best Beaches in the Philippines</title>";
	echo "<div align=CENTER>";
    include_once('view/header.php');
	echo"</div>";

	echo "<div>";				
	include_once("Controller/controller.php");
	$controller = new Controller();
	$controller->navigatePages();	
	$controller->addMessage();
	echo "</div>";		

	echo "<div align='CENTER'>";
	include_once( 'view/footer.php');
	echo "</div>";
?>