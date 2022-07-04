<?php
require 'functions.php';

if( isset($_POST["submit"])) {
    if( tambah($_POST)> 0) {
        echo "
        <script>
            alert('data berhasil ditembahkan!');
            document.location.href = 'index2.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'index2.php';
        </script>
        ";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
</head>

<body>
    <h1>Tambah data mahasiswa</h1>


<form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" required>
        </li>
        <li>
            <label for="nim">NIM :</label>
            <input type="text" name="nim" id="nim">
        </li>
        <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email">
        </li>
        <li>
            <label for="jurusan">Jurusan :</label>
            <input type="text" name="jurusan" id="jurusan">
        </li>
        <li>
            <label for="gambar">Gambar :</label>
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="submit">Tambah Data!</button>
        </li>
    </ul>



</form>


</body>

</html>