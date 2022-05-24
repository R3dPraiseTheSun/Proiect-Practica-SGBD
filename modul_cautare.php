<?php
// Start the session
session_start();

$conn = oci_connect('hr', 'hr', 'localhost/xe');
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
$total_carti = 0;
$script = oci_parse($conn, "select count(*) as total_carti from carti");
oci_execute($script);
while(oci_fetch($script)){
    print '<h1 style="text-align:center;">Baza de date contine '.oci_result($script, 'TOTAL_CARTI').' de carti!</h1>';
}

include 'cauta_autor.php';
include 'cauta_carte.php';
?>

<?php 

if(!$conn){
    echo 'connection error';
}else{
    $a = oci_parse($conn, "select id+1, carte_titlu, carte_autor, carte_descriere from (select * from carti order by DBMS_RANDOM.RANDOM) WHERE ROWNUM <= 5");
   
    oci_execute($a);
    print '<h1 style="text-align:center;">Random 5 carti ale momentului</h1>';
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