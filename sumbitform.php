<?php
require_once('Controller/controller.php');  
$controller = new Controller();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $controller->addMessage();
    $_SESSION['status'] = 'success';  
} else {
    $_SESSION['status'] = 'error';  
}
 exit(); 
?>
