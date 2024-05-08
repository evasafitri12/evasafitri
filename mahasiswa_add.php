<?php
include_once("header.php");
include_once("menu.php");

if(isset($_POST['proses'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];

    include("db_config.php");

    $query = "INSERT INTO mahasiswa VALUES('', '$nim', '$nama', '$nohp')";
    $result = mysqli_query($mykoneksi, $query);
    if ($result) {
        // Jika berhasil, redirect ke halaman data dosen
        header("Location: mahasiswa.php");
        exit;
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($mykoneksi);
    }
}

?>
<center>
<h2>Form Tambah Data Mahasiswa</h2>
</center>

<form action="" method="post">
    NIM :<input type="text" name="nim" class="form-control">
    NAMA :<input type="text" name="nama" class="form-control">
    NO.HP :<input type="text" name="nohp" class="form-control">
    <input type="submit" name="proses" value="Simpan" class="mt-2 btn btn-primary">
</form>

<?php
include_once("footer.php");
?>
