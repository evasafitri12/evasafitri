<?php
include_once("header.php");
include_once("menu.php");

include("db_config.php");

// Memeriksa apakah ID mahasiswa telah diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Memeriksa apakah form telah disubmit
    if (isset($_POST['submit'])) {
        // Mengambil nilai dari form
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $nohp = $_POST['nohp'];

        // Query SQL untuk mengupdate data mahasiswa
        $query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', nohp='$nohp' WHERE id='$id'";
        
        // Menjalankan query
        $result = mysqli_query($mykoneksi, $query);

        // Memeriksa apakah query berhasil dieksekusi
        if ($result) {
            // Jika berhasil, redirect ke halaman data mahasiswa
            header("Location: mahasiswa.php");
            exit;
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Error: " . mysqli_error($mykoneksi);
        }
    }

    // Mendapatkan data mahasiswa berdasarkan ID
    $query = mysqli_query($mykoneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);
}
?>
<center>
<h2>EDIT DATA MAHASISWA</h2>
</center>


<form method="POST" action="">
    <div class="form-group">
        <label for="nim">NIM :</label>
        <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim']; ?>">
    </div>
    <div class="form-group">
        <label for="nama">Nama :</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>">
    </div>
    <div class="form-group">
        <label for="nohp">No.Hp :</label>
        <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $data['nohp']; ?>">
    </div>
    <br>
    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
</form>

<?php
include_once("footer.php");
?>
