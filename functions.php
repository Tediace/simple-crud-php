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
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO test
            VALUES 
             (null,'$nama', '$nim', '$email', '$jurusan', '$gambar')
         ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function hapus($id) {
    global $db;
    mysqli_query($db, "DELETE FROM test WHERE id = $id");

    return mysqli_affected_rows($db);
}

function ubah($data) {
    global $db;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

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