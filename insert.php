<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Call css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<?php
// isset() is a function
// to check an object of the form, is there any
// or not the value thrown from a form.

if(isset($_POST['submit'])) {

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];

    // include file koneksi.php
    include_once("koneksi.php");

    // Insert data into the tbsiswa table
    mysqli_query($mysqli, "INSERT INTO sparepart(kode,nama, merk, harga) VALUES('$kode','$nama','$merk','$harga')"); 
    
    // Redirect page to show.php
    header("Location: index.php");
}
?>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <form action="insert.php" method="post">
            <div class="mb-3">
                <label class="form-label">Kode</label>
                <input type="number" name="kode" class="form-control" placeholder="Kode">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Merk</label>
                <input type="text" name="merk" class="form-control" placeholder="Merk">
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Harga">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-success">Add</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
            </form>
            </div>
        </div>
    </div>
</body>
</html>