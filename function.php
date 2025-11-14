<?php
$db = mysqli_connect("localhost", "root", "", "daftar_laptop");

function query($query)
{
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

function tambah($data)
{

    global $db;
    $nama_laptop = htmlspecialchars($data["Laptop"]);
    $ram = htmlspecialchars($data["Ram"]);
    $memory = htmlspecialchars($data["Memory"]);
    $procecor = htmlspecialchars($data["Procecor"]);
    $layar = htmlspecialchars($data["Layar"]);
    $harga = htmlspecialchars($data["Harga"]);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO daftar_laptop (Laptop, Ram, Memory, Procecor, Layar, Harga, Gambar)
            VALUES
            ('$nama_laptop', '$ram', '$memory', '$procecor', '$layar', '$harga', '$gambar')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function upload()
{
    $namaFile = $_FILES["Gambar"]["name"];
    $ukuran = $_FILES["Gambar"]["size"];
    $eror = $_FILES["Gambar"]["error"];
    $repostImg = $_FILES["Gambar"]["tmp_name"];

    if ($eror === 4) {
        echo "<script>
            alert('Pilih gambar terlebih dahulu!')
        </script>";
        return false;
    }

    $ekstensi_Img_Valid = ["jpg", "jpeg", "png"];
    $ekstensi_Img = explode(".", $namaFile);
    $ekstensi_Img = strtolower(end($ekstensi_Img));

    if (!in_array($ekstensi_Img, $ekstensi_Img_Valid)) {
        echo "<script>
            alert('File yang anda upload bukan gambar!')
        </script>";
        return false;
    }

    if ($ukuran > 1000000) {
        echo "<script>
            alert('Ukuran gambar anda terlalu besar!')
        </script>";
        return false;
    }

    $nama_File_Baru = uniqid();
    $nama_File_Baru .= ".";
    $nama_File_Baru .= $ekstensi_Img;

    move_uploaded_file($repostImg, "img/" . $nama_File_Baru);
    return $nama_File_Baru;
}

function hapus($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM daftar_laptop WHERE id = $id");
    return mysqli_affected_rows($db);
}

function edit($data)
{
    global $db;

    $id = $data["id"];
    $nama_laptop = htmlspecialchars($data["Laptop"]);
    $ram = htmlspecialchars($data["Ram"]);
    $memory = htmlspecialchars($data["Memory"]);
    $procecor = htmlspecialchars($data["Procecor"]);
    $layar = htmlspecialchars($data["Layar"]);
    $harga = htmlspecialchars($data["Harga"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES["Gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


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

function cari($keyword)
{
    $query = "SELECT * FROM daftar_laptop
            WHERE 
            Laptop LIKE '%$keyword%' OR
            Ram LIKE '%$keyword%' OR
            Memory LIKE '%$keyword%' OR
            Procecor LIKE '%$keyword%' OR
            Layar LIKE '%$keyword%' OR
            Harga LIKE '%$keyword%' 
    ";
    return query($query);
}

function registrasi($data) {
    global $db;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    //cek username sudah atau belom
    $result = mysqli_query($db, "SELECT username FROM registrasi_user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username sudah terdaftar')
        </script>";
        return false;
    }

    //cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    //tambahkan ke dalam databese
   mysqli_query($db, "INSERT INTO registrasi_user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($db);

}