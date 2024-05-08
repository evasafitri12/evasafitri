<?php

include_once("header.php");
include_once("menu.php");



include("db_config.php");


$queri = mysqli_query ($mykoneksi, "SELECT id, nim, nama, nohp FROM mahasiswa");

    ?>
    <center>
        <h2>DATA MAHASISWA</h2>
    </center>
    <p>
    <a href="mahasiswa_add.php" class="btn btn-primary">Tambah Data</a>
    </p>
    
    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>No.Hp</th>
            <th>Opsi</th>
        
        </tr>
        <?php
        while($data = mysqli_fetch_assoc($queri)) {
            echo "<tr>";
            echo "<td>". $data['id'] ."</td>";
            echo "<td>". $data['nim'] ."</td>";
            echo "<td>". $data['nama'] ."</td>";
            echo "<td>". $data['nohp'] ."</td>";
            echo "<td> 
            <a href='mahasiswa_edit.php?id=" . $data['id'] . "' class='btn btn-warning'>edit</a>
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
     // Jika pengguna menekan OK, arahkan ke halaman mahasiswa_del.php dengan parameter ID
     window.location.href = 'mahasiswa_del.php?id=' + id;
 }
}
</script>


<?php
include_once("footer.php");
?>
