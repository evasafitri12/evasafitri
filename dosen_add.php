<?php

include_once("header.php");
include_once("menu.php");

if (isset($_POST['proses'])){
    $nidn =$_POST['nidn'];
    $nama =$_POST['nama'];
    $email =$_POST['email'];

    include("db_config.php");

    $query = "INSERT INTO dosen VALUES('', '$nidn', '$nama', '$email')";
    $result = mysqli_query($mykoneksi, $query);
    if ($result) {
        // Jika berhasil, redirect ke halaman data dosen
        header("Location: dosen.php");
        exit;
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($mykoneksi);
    }

}
?>

<center>
<h2>Form Tambah Data Dosen</h2>
</center>

<form action="" method="post">
    NIDN <input type="text" name="nidn" class="form-control">
    Nama <input type="text" name="nama" class="form-control">
    Email <input type="text" name="email" class="form-control">
    <input type="submit" name="proses" value="Simpan" class="mt-2 btn btn-success">

</form>

<?php
include_once("footer.php");
?>