<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script>
    function confirmDelete(kode) {
        var result = confirm("Are you sure you want to delete this part?");
        if (result) {
            window.location.href = "delete.php?kode=" + kode;
        }
    }
</script>
</head>
<body>

 <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
            <table class="table table-bordered">
        <h1 class="card-title text-center mb-3"><br>- Sparepart Warehouse -</h1>
            <h2 class="card-subtitle mb-3">Part List :</h2>
            </div>

            <table id="myTable" class="table table-bordered">
        <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Merk</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'koneksi.php';

        $query = 'SELECT * FROM sparepart';
        $result = mysqli_query($mysqli, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['kode']}</td>";
            echo "<td>{$row['nama']}</td>";
            echo "<td>{$row['merk']}</td>";
            echo "<td>{$row['harga']}</td>";
            echo "<td>
                    <a href='edit.php?kode={$row['kode']}' class='btn btn-info'>Edit</a>
                    <a href='javascript:void(0);' onclick='confirmDelete(\"{$row['kode']}\")' class='btn btn-danger'>Delete</a>
          </td>";
            echo "</tr>";
        }

        mysqli_close($mysqli);
        ?>
        </tbody>
    </table>
    <h3> <a href="insert.php" class="btn btn-success float-left">Add Part</a> </h3>

    <div class="text-right mt-3">
            <a href="logout.php" class="btn btn-danger float-right">Logout</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Add Javascript DataTables -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
</script>

</body>
</html>