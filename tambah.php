<?php
require "function.php";
if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = '/playPhp/Database-Conection/index.php';
        </script>";
        exit;
    } else {
        echo "
        <script>
        alert('Data gagal ditambahkan!');
        document.location.href = '/playPhp/Database-Conection/index.php';
        </script>
        ";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Daftar Laptop</title>
    <link rel="stylesheet" href="css/tambah.css">
</head>

<body>
<section class="content2">
<div class="container">
    <h1 id="jdl">Tambah Data</h1>
    <form action="" method="post" class="form">
        <ul>
            <li>
                <label for="Procecor">Procecor : </label>
                <input type="text" name="Procecor" id="Procecor" require>
            </li>
            <li>
                <label for="Laptop">Nama Laptop : </label>
                <input type="text" name="Laptop" id="Laptop">
            </li>
            <li>
                <label for="Ram"> Ram: </label>
                <input type="text" name="Ram" id="Ram">
            </li>
            <li>
                <label for="Memory">Memory: </label>
                <input type="text" name="Memory" id="Memory">
            </li>
            <li>
                <label for="Layar">Layar: </label>
                <input type="text" name="Layar" id="Layar">
            </li>
            <li>
                <label for="Harga">Harga: </label>
                <input type="text" name="Harga" id="Harga">
            </li>
            <li>
                <label for="Gambar">Gambar: </label>
                <input type="file" name="Gambar" id="Gambar">
            </li>
            <li>
                <button type="submit" name="submit" id="button">Tambah</button>
            </li>
        </ul>
    </form>
    </div>
    </section>
</body>

</html>