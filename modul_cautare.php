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
include 'cauta_autor.php';
include 'cauta_carte.php';
?>


<?php 



$conn = oci_connect('hr', 'hr', 'localhost/xe');


if(!$conn){
    echo 'connection error';
}else{
    

      

    $a = oci_parse($conn, "select carte_titlu, carte_autor, carte_descriere from carti");
   
    oci_execute($a);
    print '<h1 style="text-align:center;">Top 5 carti ale momentului</h1>';
    print '<table border="1">';
    $rowNr = 1;
    while ($row = oci_fetch_array($a, OCI_RETURN_NULLS+OCI_ASSOC)) {
        print '<tr>';
            foreach ($row as $item) {
                print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
            }
        print '</tr>';
        $rowNr = $rowNr + 1;
    }
    print '</table>';
    oci_close($conn);
}

?>

</body>

</html>