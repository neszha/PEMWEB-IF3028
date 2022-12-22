<?php
require_once '../init.php';



// // API: Delete data mahasiswa by id.
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    query("DELETE FROM students WHERE id ${$id}");
}

redirect('../../');