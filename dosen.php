<?php

include_once("header.php");
include_once("menu.php");
include_once("db_config.php");

//kita akan buat queri untuk mengambil data ke tabel pada db terpilih
$queri = mysqli_query($mykoneksi, "SELECT id, nidn, nama, email FROM dosen");

//mengekstrak data dari queri di atas
// while($data = mysqli_fetch_assoc($queri)){
//     echo "NIDN :". $data['nidn'];
//     echo "<br>";
//     echo "Nama :". $data['nama'];
//     echo "<br><br>";
// }

?>
<center>
    <h2>DATA DOSEN</h2>
</center>

<p>
<a href="dosen_add.php" class="btn btn-primary">Tambah Data</a>
</p>

<table class="table table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>NIDN</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Opsi</th>
    </tr>

    <?php
    while ($data = mysqli_fetch_assoc($queri)) {
        echo "<tr>";
        echo "<td>" . $data['id'] . "</td>";
        echo "<td>" . $data['nidn'] . "</td>";
        echo "<td>" . $data['nama'] . "</td>";
        echo "<td>" . $data['email'] . "</td>";
        echo "<td> 
                   <a href='dosen_edit.php?id=" . $data['id'] . "' class='btn btn-warning'>edit</a>
                   <a href='#' onclick='konfirmasiHapus(" . $data['id'] . ")' class='btn btn-danger'>hapus </a> 
                </td>";
        echo "</tr>";
    }
?>
</table>

<script>
    // Fungsi untuk menampilkan dialog konfirmasi penghapusan
    function konfirmasiHapus(id) {
        var result = confirm('Apakah Anda yakin ingin menghapus data ini?');
        if (result) {
            // Jika pengguna menekan OK, arahkan ke halaman dosen_del.php dengan parameter ID
            window.location.href = 'dosen_del.php?id=' + id;
        }
    }
</script>

<?php
include("footer.php");
?>