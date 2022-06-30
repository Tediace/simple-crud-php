<?php
$mahasiswa = [["subroza", "17312456", "Accounting", "17312456@students.uii.ac.id"],
    ["wardell", "17312456", "Economic", "17312457@students.uii.ac.id"]];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data mahasiswa</title>
</head>
<body>
<H1>Data Mahasiswa</H1>
<?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <li><?= $mhs[0]; ?></li>
        <li><?= $mhs[1]; ?></li>
        <li><?= $mhs[2]; ?></li>
        <li><?= $mhs[3]; ?></li>
    </ul>
<?php endforeach; ?>
</body>
</html>

