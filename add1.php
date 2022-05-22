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

<?php 



$conn = oci_connect('hr', 'hr', 'localhost/xe');

$email = $_GET['email'];
$nume = $_GET['firstname'];
$prenume = $_GET['lastname'];
$carti_citite = $_GET['carti_citite'];
$sex = $_GET['gender'];
$data = $_GET['data'];

if($sex == 'femeie'){
    $sex = 0;
}else{
    $sex = 1;
}
if($_GET['autor'] == 'autorda')
    $pref1 = 1;
    else $pref1 = 0;
if($_GET['cititor'] == 'cititorda')
    $pref2 = 1;
    else $pref2 = 0;
if($_GET['evaluator'] == 'evaluatorda')
    $pref3 = 1;
    else $pref3 = 0;


$id = 1000000000;



if(!$conn){
    echo 'connection error';
}else{
    
    if(1==1){
        $k = oci_parse($conn, "BEGIN select max(id) into :p1 from clienti; end;");
        oci_bind_by_name($k, ':p1', $id);
        oci_execute($k);
        
        $id = $id + 1;
        $_SESSION["id"] = $id;

        oci_free_statement($k);

        $s = oci_parse( $conn, "insert into clienti(id, nume, prenume, data_nastere, carti_citite, sex, autor, cititor, evaluator, email) values ('$id', '$nume', '$prenume', DATE '$data', '$carti_citite', '$sex', '$pref1', '$pref2', '$pref3', '$email')" );
        
        oci_execute($s);
        oci_free_statement($s);
    }
}


oci_close($conn);
?>
<div class="msg">
<?php
echo 'inregistrare completa! redirectionare pagina principala...';
?>
</div>

</body>
<script>
    function donothing(){
        window.location.replace("main.php");
    }
    setTimeout(donothing,3000); // run donothing after 0.5 seconds
    
    

</script>

<style>
    body{
        position: relative;
    }
    .msg{
        position: absolute;
        top:200px;
        left: 30%;
       padding: 20px;
       border: solid 0.2px black;

        font-size:20px;

    }
    </style>

</html>