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
    <form action='add1.php' method='get' name="personal">
        
        Email:<br>
        <input type="text" name="email"><br>
        First name:<br>
        <input type="text" name="firstname"><br>
        Last name:<br>
        <input type="text" name="lastname"><br>
        Data-nastere:<br>
        <input type="date" name="data"><br>
        Carti citite:<br>
        <input type="number" name="carti_citite"><br>
        Sex<br>
        <div style="display:flex; justify-content: center;">Barbat<input type="radio" name="gender" value="barbat">
        Femeie<input type="radio" name="gender" value="femeie"></div>

        Ce rol vrei sa ai? <br>
            <p>autor</p>
            <div style="display:flex; justify-content: center;">da<input type="radio" name="autor" value="autorda">
            nu<input type="radio" name="autor" value="autornu"></div>
            <p>cititor</p>
            <div style="display:flex; justify-content: center;">da<input type="radio" name="cititor" value="cititorda">
            nu<input type="radio" name="cititor" value="cititornu"></div>
            <p>evaluator</p>
            <div style="display:flex; justify-content: center;">da<input type="radio" name="evaluator" value="evaluatorda">
            nu<input type="radio" name="evaluator" value="evaluatornu"></div>
            
        <input type="submit" name="submit1" value="Inregistreaza-te" />
        
    </form>

    <!-- <form action='add2.php' method='get' name='pref'>
       
        Care este greutatea ce mai mare cu care poti face o repetitie? <br>
        Squats:<br>
        <input type="number" name="squats"><br>
        Deadlift:<br>
        <input type="number" name="deadlift"><br>
        Bench-press<br>
        <input type="number" name="bench"><br>
        Pull ups<br>
        <input type="number" name="pull"><br>
        Over head press<br>
        <input type="number" name="ohp"><br>
        Bicep Curls<br>
        <input type="number" name="bicep"><br>
        Skull crushers<br>
        <input type="number" name="skull"><br>
        Leg extensions<br>
        <input type="number" name="leg"><br>
        Hamstring curls<br>
        <input type="number" name="hamstring"><br>
        Crunches<br>
        <input type="number" name="crunches"><br>
        Shoulder raises<br>
        <input type="number" name="shoulder"><br>
        Dumbell flies<br>
        <input type="number" name="flies"><br>
        Dumbell rows<br>
        <input type="number" name="rows"><br>
        
        <input type="submit" name="submit2" value="Introdu date despre tine" />

    </form> -->
</div>


</body>
</html>