<?php
$db = mysqli_connect("localhost", "root", "", "daftar_laptop");
function query($query) {
    global $db;
    if (!$db) {
        exit("Database Connection Error: " . mysqli_connect_error($db));
    }
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data) {
    global $db;
    $nama_laptop = htmlspecialchars($data["Laptop"]);
    $ram = htmlspecialchars($data["Ram"]);
    $memory = htmlspecialchars($data["Memory"]);
    $procecor = htmlspecialchars($data["Procecor"]);
    $layar = htmlspecialchars($data["Layar"]);
    $harga = htmlspecialchars($data["Harga"]);
    $gambar = htmlspecialchars($data["Gambar"]);

    $query = "INSERT INTO daftar_laptop (Laptop, Ram, Memory, Procecor, Layar, Harga, Gambar)
            VALUES
            ('$nama_laptop', '$ram', '$memory', '$procecor', '$layar', '$harga', '$gambar')";         
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);

}

function hapus($id) {
    global $db;
    mysqli_query($db, "DELETE FROM daftar_laptop WHERE id = $id");
    return mysqli_affected_rows($db);
}

function edit($data) {
    global $db;

    $id = $data["id"];
    $nama_laptop = htmlspecialchars($data["Laptop"]);
    $ram = htmlspecialchars($data["Ram"]);
    $memory = htmlspecialchars($data["Memory"]);
    $procecor = htmlspecialchars($data["Procecor"]);
    $layar = htmlspecialchars($data["Layar"]);
    $harga = htmlspecialchars($data["Harga"]);
    $gambar = htmlspecialchars($data["Gambar"]);

    $query = "UPDATE  daftar_laptop SET 
            Laptop = '$nama_laptop', 
            Ram = '$ram',
            Memory = '$memory',
            Procecor = '$procecor',
            Layar = '$layar',
            Harga = '$harga',
            Gambar = '$gambar'
        WHERE Id = $id";         
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}