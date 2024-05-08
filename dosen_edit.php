<?php
include_once("header.php");
include_once("menu.php");

include("db_config.php");

// Memeriksa apakah ID dosen telah diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Memeriksa apakah form telah disubmit
    if (isset($_POST['submit'])) {
        // Mengambil nilai dari form
        $nidn = $_POST['nidn'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];

        // Query SQL untuk mengupdate data dosen
        $query = "UPDATE dosen SET nidn='$nidn', nama='$nama', email='$email' WHERE id='$id'";
        
        // Menjalankan query
        $result = mysqli_query($mykoneksi, $query);

        // Memeriksa apakah query berhasil dieksekusi
        if ($result) {
            // Jika berhasil, redirect ke halaman data dosen
            header("Location: dosen.php");
            exit;
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Error: " . mysqli_error($mykoneksi);
        }
    }

    // Mendapatkan data dosen berdasarkan ID
    $perintah = "SELECT * FROM dosen WHERE id=$id";
    $query = mysqli_query($mykoneksi, $perintah);
    $data = mysqli_fetch_assoc($query);
}
?>
<center>
<h2>EDIT DATA DOSEN</h2>
</center>

<form method="POST" action="">
    <div class="form-group">
        <label for="nidn">NIDN :</label>
        <input type="text" class="form-control" id="nidn" name="nidn" value="<?= $data['nidn']; ?>">
    </div>
    <div class="form-group">
        <label for="nama">Nama :</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $data['email']; ?>">
    </div>
    <br>
    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
</form>

<?php
include_once("footer.php");
?>
