<?php
require "function.php";

$id = $_GET["id"];
$dtl = query("SELECT * FROM daftar_laptop WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    if (edit($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diubah!');
        document.location.href = '/playPhp/Database-Conection/index.php';
        </script>";
        exit;
    } else {
        echo "
        <script>
        alert('Data gagal diubah!');
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
    <title>Edit Daftar Laptop</title>
    <link rel="stylesheet" href="css/tambah.css">
</head>

<body>
    <section class="content2">
        <div class="container">
            <h1 id="jdl">Edit Data</h1>
            <form action="" method="post" class="form">
                <input type="hidden" name="id" value="<?= $dtl["Id"]; ?>">
                <ul>
                    <li>
                        <label for="Procecor">Procecor : </label>
                        <input type="text" name="Procecor" id="Procecor" require value="<?= $dtl["Procecor"]; ?>">
                    </li>
                    <li>
                        <label for="Laptop">Nama Laptop : </label>
                        <input type="text" name="Laptop" id="Laptop" value="<?= $dtl["Laptop"]; ?>">
                    </li>
                    <li>
                        <label for="Ram"> Ram: </label>
                        <input type="text" name="Ram" id="Ram" value="<?= $dtl["Ram"]; ?>">
                    </li>
                    <li>
                        <label for="Memory">Memory: </label>
                        <input type="text" name="Memory" id="Memory" value="<?= $dtl["Memory"]; ?>">
                    </li>
                    <li>
                        <label for="Layar">Layar: </label>
                        <input type="text" name="Layar" id="Layar" value="<?= $dtl["Layar"]; ?>">
                    </li>
                    <li>
                        <label for="Harga">Harga: </label>
                        <input type="text" name="Harga" id="Harga" value="<?= $dtl["Harga"]; ?>">
                    </li>
                    <li>
                        <label for="Gambar">Gambar: </label>
                        <input type="text" name="Gambar" id="Gambar" value="<?= $dtl["Gambar"]; ?>">
                    </li>
                    <li>
                        <button type="submit" name="submit" id="button">Edit</button>
                    </li>
                </ul>
            </form>
        </div>
    </section>
</body>

</html>