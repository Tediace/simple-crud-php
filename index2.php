<?php
// menghubungan ke file functions.php
require 'functions.php';
// query sql
$mahasiwa = query("SELECT * FROM test");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiwa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
</head>

<body>
<h1>Daftar Mahasiswa</h1>

<a href="add.php">Tambah data mahasiswa</a>
<br></br>

<form action="" method="post">

    <input type="text" name="keyword" size="35"
           autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
    <button type="submit" name="cari">Cari!</button>
    <br></br>
</form>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($mahasiwa as $row ) : ?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>"onclick="return confirm('yakin');">hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]; ?>" width="100"></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>
</body>
</html>