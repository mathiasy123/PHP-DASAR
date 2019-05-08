<?php
require "../function/function.php";

$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa WHERE 
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            alamat LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'";

$mahasiswa = query($query);

?>

<table border="1" cellpadding="10" cellspacing="10">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Alamat</th>    
    </tr>

    <?php $i = 1; ?>
    <?php foreach($mahasiswa as $mhs) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="halaman/ubah.php?id=<?= $mhs["id"]; ?>" class="btn-ubah">Ubah</a>
            <a href="halaman/hapus.php?id=<?= $mhs["id"]; ?>" class="btn-hapus" onclick="return confirm('YAKIN MAU MENGHAPUS?');">Hapus</a>
        </td>
        <td><img src="img/<?= $mhs["gambar"]; ?>" width="80" height="70"></td>
        <td><?= $mhs["nim"]; ?></td>
        <td><?= $mhs["nama"]; ?></td>
        <td><?= $mhs["jurusan"]; ?></td>
        <td><?= $mhs["alamat"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>