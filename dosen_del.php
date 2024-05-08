<?php

include("db_config.php");

$id = $_GET['id'];

mysqli_query($mykoneksi, "DELETE FROM dosen WHERE id = $id");

header("location:dosen.php");

?>