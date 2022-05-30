<?php
require "Database.php";

$db = new Database();

if(isset($_POST['diameter']) && isset($_POST['H']) && isset($_POST['L']) && isset($_POST['A']) && isset($_POST['J'])) {
    if ($db->dbConnect()) {
        echo $db->find("bearing", $_POST['diameter'], $_POST['H'], $_POST['L'], $_POST['A'], $_POST['J']);
//        if ($db->find("bearing", $_POST['diameter'], $_POST['H'], $_POST['L'], $_POST['A'], $_POST['J']) != false) {
//            echo $db->find("bearing", $_POST['diameter'], $_POST['H'], $_POST['L'], $_POST['A'], $_POST['J']);
//        } else echo "not found";
    } else echo "db not connected";
} else echo "all field needed"

?>