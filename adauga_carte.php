<?php
// Start the session
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main-style.css">
</head>
<body>



<?php 
if(isset($_SESSION['logged'])){
include 'header2.php';
}else{
    include 'header1.php';
}
?>


<div class='container'>
    <form action='add2.php' method='get' name="carte">
        
        Titlu Carte:<br>
        <input type="text" name="titlu"><br>
        Autor:<br>
        <input type="text" name="autor"><br>
        Descriere:<br>
        <input type="text" name="desc"><br>       
        <input type="submit" name="submit2" value="Inregistreaza-te" />
        
    </form>
</div>


</body>
</html>