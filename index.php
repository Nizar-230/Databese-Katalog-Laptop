<?php
require "function.php";
$daftar = query("SELECT * FROM daftar_laptop ");

if (isset($_POST["cari"])) {
    $daftar = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="css/table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <section class="head mt-3 p-4">
        <h1 id="judul">Daftar Laptop</h1>
        <a href="tambah.php" class="daftar mt-5 p-2">Tambah Daftar</a>
    
    <div class="d-flex justify-content-center">
        <form class="d-flex align-items-center mt-5 " role="search" action="" method="post">
            <input class="form-control me-2 border border-dark" name="keyword" type="search" placeholder="Search" aria-label=""/>
            <button class="btn btn-outline-primary " type="submit" name="cari">Search</button>
        </form>
        </div>
    </section>
    <section class="content">
        <br>
        <table cellspacing="0" class="tbl m-3">
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
                        <a href="ubah.php?id=<?= $row["Id"]; ?>" class="btn1">Edit</a> <span id="sp">|</span>
                        <a href="hapus.php?id=<?= $row["Id"]; ?>" class="btn2">Hapus</a>
                    </td>
                    <td><img src="img/<?= $row["Gambar"]; ?>" width="50"></td>
                    <td><?= $row["Laptop"]; ?></td>
                    <td><?= $row["Ram"]; ?></td>
                    <td><?= $row["Memory"]; ?></td>
                    <td><?= $row["Procecor"]; ?></td>
                    <td><?= $row["Layar"]; ?></td>
                    <td class="price"><?= "Rp." . $row["Harga"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </section>
</body>

</html>