<?php
    include 'koneksi.php';

    $id_siswa = $_GET['id_siswa'];
    $sqlGet = "SELECT * FROM buku WHERE id_siswa='$id_siswa'";
    $queryGet = mysqli_query($conn, $sqlGet);
    $data = mysqli_fetch_array($queryGet);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Aplikasi CRUD BUKU</title>
</head>
<body>
    <div class="w-50 mx-auto border p-3 mt-5">
        <a href="index.php">Kembali ke home</a>
    <form action="update.php" method="post">
        <label for="id_siswa">Id Siswa</label>
        <input type="text" id="id_siswa" name ="id_siswa" value="<?php echo "$data[id_siswa]"; ?>" class="form-control" readonly>

        <label for="id_siswa">Nis</label>
        <input type="text" id="nis" name ="nis" value="<?php echo "$data[nis]"; ?>" class="form-control" required>

        <label for="id_siswa">Nama Siswa</label>
        <input type="text" id="nama_siswa" name ="nama_siswa" value="<?php echo "$data[nama_siswa]"; ?>" class="form-control" required>

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <input type="text" id="jenis_kelamin" name ="jenis_kelamin" value="<?php echo "$data[jenis_kelamin]"; ?>" class="form-control" required>

        <label for="id_siswa">Alamat</label>
        <input type="text" id="alamat" name ="alamat" value="<?php echo "$data[alamat]"; ?>" class="form-control" required>

        <label for="id_siswa">Id Jurusan</label>
        <input type="text" id="id_jurusan" name ="id_jurusan" value="<?php echo "$data[id_jurusan]"; ?>" class="form-control" required>

        <label for="nama_jurusan">Nama Jurusan</label>
        <select name="nama_jurusan" id="nama_jurusan" class="form-select" required>
            <option ><?php echo "$data[nama_jurusan]"; ?></option>
            <option value="RPL">RPL</option>
            <option value="TKJ">TKJ</option>
            <option value="TJA">TJA</option>
        </select>

        <input class="btn btn-success mt-3" type="submit" name="tambah" value="Update Data">
    </form>    
    </div>

    <?php

        if(isset($_POST['tambah'])) {
            $id_siswa= $_POST['id_siswa'];
            $nis= $_POST['nis'];
            $nama_siswa= $_POST['nama_siswa'];
            $jenis_kelamin= $_POST['jenis_kelamin'];
            $alamat= $_POST['alamat'];
            $id_jurusan= $_POST['id_jurusan'];
            $nama_jurusan= $_POST['nama_jurusan'];    

            $sqlUpdate = "UPDATE buku 
                        SET nis='$nis', nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin', alamat='$alamat', id_jurusan='$id_jurusan', nama_jurusan='$nama_jurusan'
                        WHERE id_siswa='$id_siswa'";
            $queryUpdate = mysqli_query($conn, $sqlUpdate);

            header("location: index.php");
        }
    ?>    
</body>
</html>