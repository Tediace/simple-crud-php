<?php
// koneksi
$db = mysqli_connect("localhost", "root", "MyNewPass", "crud1");

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;

    }
    return $rows;
}
// tombol tambah
function tambah($data) {
    global $db;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // upload gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO test
            VALUES 
             (null,'$nama', '$nim', '$email', '$jurusan', '$gambar')
         ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
        echo "<script>
                alert('pilih gmabar terlebih dahulu!');
              </script>";
        return false;
    }

    // cek file extension
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('format invalid!');
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000 )  {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFile;
}


function hapus($id) {
    global $db;
    mysqli_query($db, "DELETE FROM test WHERE id = $id");

    return mysqli_affected_rows($db);
}


// function ubah
function ubah($data) {
    global $db;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4 ){
        $gambar = $gambarLama;
    }else {
        $gambar = upload();
    }

    $query = "UPDATE test SET
                nama = '$nama',
                nim = '$nim',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'

               WHERE id = $id          
                ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}


// function cari
function cari ($keyword) {
    $query = "SELECT * FROM test 
                WHERE
                nama LIKE '$keyword%' OR 
                nim LIKE '$keyword%' OR 
                email LIKE '$keyword%' OR 
                jurusan like '$keyword%'
              ";
    return query($query);

}
?>