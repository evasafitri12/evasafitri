<?php

// berisi konfigurasi koneksi ke db server mysql
$host = "localhost";
$username = "root";
$password = "";
$db_name = "ti_sinta_db";

// membuat koneksi ke server db mysql
$mykoneksi = mysqli_connect($host, $username, $password, $db_name);