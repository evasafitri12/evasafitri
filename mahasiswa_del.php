<?php

include("db_config.php");

$id = $_GET['id'];

mysqli_query($mykoneksi, "DELETE FROM mahasiswa WHERE id= $id");

header("location:mahasiswa.php");
?>