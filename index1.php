<?php 
$db = mysqli_connect("localhost", "root", "", "daftar_laptop");
 $result = mysqli_query($db, "SELECT * FROM daftar_laptop");
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Laptop</h1>
    <table border="1" cellpadding="10" cellspacing="0">
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
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">Ubah</a>/
                <a href="">Hapus</a>
            </td>
            <td><img src="img/<?= $row["Gambar"]; ?>" width="50"></td>
            <td><?= $row["Laptop"]; ?></td>
            <td><?= $row["Ram"]; ?></td>
            <td><?= $row["Memory"]; ?></td>
            <td><?= $row["Layar"]; ?></td>
            <td><?= $row["Procecor"]; ?></td>
            <td><?= $row["Harga"];?></td>

        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>
    </table>
</body>
</html>