<div class="cautare">
        <div class="autor container2">
            <form action="cauta_autor.php" class="form_cautare">
                <div><p>Autor</p></div>
                <input type="text" name="nume_autor">
                <input type="submit" value="Cauta!" name="submit">
            </form>
        </div>
</div>

<?php
function display(){
    $conn = oci_connect('hr', 'hr', 'localhost/xe');
    $nume_autor = $_GET["nume_autor"];
    $script = oci_parse($conn, "select nume, prenume from nume_autor where nume='$nume_autor'");
    oci_execute($script);
    print '<h1 style="text-align:center;">Rezultatele cautarii</h1>';
    print '<table border="1">';
    while ($row = oci_fetch_array($script, OCI_RETURN_NULLS+OCI_ASSOC)) {
        print '<tr>';
            foreach ($row as $item) {
                print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
            }
        print '</tr>';
    }
    print '</table>';
    oci_close($conn);
}
if(isset($_GET['submit'])){
    display();
}
?>