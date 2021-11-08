<?php
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Aplikasi CRUD BUKU</title>
</head>
<body>
    <div class="container mt-3">
    <h3>CRUD BUKU</h3>
    
    <a href="add.php" class="btn btn-primary btn-md mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
    
    <br>
    <form action="" method="post">

        <input type="text" name="keyword" size="30" placeholder="masukkan keyword pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>

    </form>
    <br>

    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <th>Id Siswa</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Id Jurusan</th>
            <th>Nama Jurusan</th>
            <th>Aksi</th>
        </thead>
        <?php
            $sqlGet = "SELECT * FROM buku";
        //tombol cari di tekan
        if( isset($_POST["cari"]) ) {
            $buku = ($_POST["keyword"]);
            $sqlGet = "SELECT * FROM buku Where id_siswa LIKE '%$buku%' OR nama_siswa LIKE '%$buku%'";
        }
            $query = mysqli_query($conn, $sqlGet);

            while($data = mysqli_fetch_array($query)) {
                echo "
                <tbody>
                    <tr>
                        <td>$data[id_siswa]</td>
                        <td>$data[nis]</td>
                        <td>$data[nama_siswa]</td>
                        <td>$data[jenis_kelamin]</td>
                        <td>$data[alamat]</td>
                        <td>$data[id_jurusan]</td>
                        <td>$data[nama_jurusan]</td>
                        <td>
                        <div class='row'>
                            <div class='col d-flex justify-content-center'>
                            <a href='update.php?id_siswa=$data[id_siswa]' class='btn btn-sm btn-warning'><i class='fa fa-edit'></i> Update</a>
                            </div>
                            <div class='col d-flex justify-content-center'>
                            <a href='delete.php?id_siswa=$data[id_siswa]' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Delete</a>
                            </div>
                    </td>
                    </tr>
                </tbody>
                ";
            }
        ?>
    </table>
    </div>
</body>
</html>