<?php 

ob_start()?>

<?php
$content= ob_get_clean();
$title= "Bibilothèque MGA";
require "template.php";
?>