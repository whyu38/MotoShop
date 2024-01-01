<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form submitted, process the data

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];

    $query = "UPDATE sparepart SET nama='$nama', merk='$merk', harga='$harga' WHERE kode='$kode'";
    mysqli_query($mysqli, $query);

    mysqli_close($mysqli);

    header("Location: index.php");
    exit();
}

// Fetch data for pre-filling the form
$kode = $_GET['kode'];
$query = "SELECT * FROM sparepart WHERE kode = '$kode'";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_assoc($result);

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sparepart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
<div class="card mx-auto" style="max-width: 500px;"> 
        <div class="card-header">
            <h2 class="mb-0">Edit Sparepart</h2>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="kode" value="<?php echo $row['kode']; ?>">
                <div class="form-group">
                    <label for="title">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="merk">Merk:</label>
                    <input type="text" class="form-control" id="merk" name="merk" value="<?php echo $row['merk']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <div class="text-center mt-3">
                <a href="logout.php" class="btn btn-danger float-left">Back</a>
</div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
