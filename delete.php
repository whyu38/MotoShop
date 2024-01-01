<?php
include 'koneksi.php';

$kode = $_GET['kode'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // User has confirmed deletion
    $query = "DELETE FROM sparepart WHERE kode = '$kode'";
    mysqli_query($mysqli, $query);
    
    mysqli_close($mysqli);
    
    header("Location: index.php");
    exit();
}

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS to control card size */
        .custom-card {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card custom-card">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">- Delete Part -</h1>

            <p class="text-center mb-4">Are you sure you want to delete this part?</p>

            <form method="POST">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger mr-2" name="confirm">Yes</button>
                    <a href="index.php" class="btn btn-secondary">No</a>
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
