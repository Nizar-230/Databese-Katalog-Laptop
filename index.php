<?php
require "function.php";
$daftar = query("SELECT * FROM daftar_laptop");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel ="stylesheet" href="css/table.css">
</head>

<body>
    <section class="head">
    <h1 id ="judul">Daftar Laptop</h1>
     <a href="tambah.php" class="daftar">Tambah Daftar</a>
    </section>
    <section class="content">
   
    <table  cellspacing="0" class="tbl">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Laptop</th>
            <th>Ram</th>
            <th>Memory</th>
            <th>Procecor</th>
            <th>Layar</th>
            <th>Harga</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($daftar as $row): ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["Id"]; ?>" class="btn1">Edit</a> <span id ="sp">|</span>
                    <a href="hapus.php?id=<?= $row["Id"]; ?>" class="btn2">Hapus</a>
                </td>
                <td><img src="img/<?= $row["Gambar"]; ?>" width="50"></td>
                <td><?= $row["Laptop"]; ?></td>
                <td><?= $row["Ram"]; ?></td>
                <td><?= $row["Memory"]; ?></td>
                <td><?= $row["Procecor"]; ?></td>
                <td><?= $row["Layar"]; ?></td>
                <td class="price"><?= "Rp.".$row["Harga"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </section>
</body>

</html>