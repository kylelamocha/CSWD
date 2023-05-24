<?php

include_once '../connection.php';
$sql = "DELETE FROM journal WHERE ID='" . $_GET["ID"] . "'";

if (mysqli_query($database, $sql)) {
    echo '<script language="javascript">';
    echo 'alert("Journal Entry has been deleted!")';
    echo '</script>';   
} else {
    echo "Error deleting record: " . mysqli_error($database);
}

header('location: view_journal.php');
exit;
  



?>