<?php
function testfun()
{  // Łączenie z bazą
    $server = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "crm";
    $conn = mysqli_connect($server, $username, $password, $dbname);
    
    // wyciągnięcie i ustawienie stageu dla tabeli deal
    $firma = $_POST['firemka'];
    
    $id_query = "select ID from kontrahent where firma = '$firma'";
    $id = mysqli_query($conn, $id_query) or die(mysqli_error());
    $id_result = mysqli_fetch_row($id);

    $query = "update deal set stage='CONTACTED' where kontrahent=$id_result[0];";

    $run = mysqli_query($conn, $query) or die(mysqli_error());

    // ustawienie stageu dla tabeli kontrahentów
    $queryKontrahent = "update kontrahent set stage='CONTACTED' where firma='$firma';";
    $runKontrahent = mysqli_query($conn, $queryKontrahent) or die(mysqli_error());
}



function deleteNew(){
    $server = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "crm";
    $conn = mysqli_connect($server, $username, $password, $dbname);

    // Usunięcie klucza obcego
    // $queryDeleteFK = "alter table deal on delete cascade;";
    // $runDeleteFK = mysqli_query($conn, $queryDeleteFK) or die(mysqli_error());

    
    // Usunięcie kontrahenta
    $firma = $_POST['firemka'];
    $queryDeleteNew = "delete from kontrahent where firma='$firma';";
    $runDeleteNew = mysqli_query($conn, $queryDeleteNew) or die(mysqli_error());

    // Przywrócenie klucza obcego
    // $queryDeleteFK = "alter table deal on delete restrict;";
    // $runDeleteFK = mysqli_query($conn, $queryDeleteFK) or die(mysqli_error());
}


function deleteContact(){
    $server = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "crm";
    $conn = mysqli_connect($server, $username, $password, $dbname);

    // Usunięcie klucza obcego
    // $queryDeleteFK = "alter table deal on delete cascade;";
    // $runDeleteFK = mysqli_query($conn, $queryDeleteFK) or die(mysqli_error());

    
    // Usunięcie kontrahenta
    $firma = $_POST['firemka'];
    $queryDeleteNew = "delete from kontrahent where firma='$firma';";
    $runDeleteNew = mysqli_query($conn, $queryDeleteNew) or die(mysqli_error());

    // Przywrócenie klucza obcego
    // $queryDeleteFK = "alter table deal on delete restrict;";
    // $runDeleteFK = mysqli_query($conn, $queryDeleteFK) or die(mysqli_error());
}

if(array_key_exists('test',$_POST)){
   testfun();
}

elseif(array_key_exists('test1',$_POST)){
    deleteNew();
}

elseif(array_key_exists('deleteContact',$_POST)){
    deleteContact();
}
?>