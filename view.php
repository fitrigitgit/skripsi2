<?php
// Check existence of id parameter before processing further
if (isset($_GET["Nim"]) && !empty(trim($_GET["Nim"]))) {
    // Include config file
    require_once "connection.php";

    // Prepare a select statement
    $sql = "SELECT * FROM mahasiswa WHERE Nim = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_Nim);

        // Set parameters
        $param_Nim = trim($_GET["Nim"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $Nim = $row["Nim"];
                $Nama_Mhs = $row["Nama_Mhs"];
                $Jenis_Kelamin = $row["Jenis_Kelamin"];
                $Program_Studi = $row["Program_Studi"];
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($conn);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Detail Mahasiswa</h1>
                    <div class="form-group">
                        <label>NIM</label>
                        <p><b><?php echo $row["Nim"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <p><b><?php echo $row["Nama_Mhs"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <p><b><?php echo $row["Jenis_Kelamin"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Program Studi</label>
                        <p><b><?php echo $row["Program_Studi"]; ?></b></p>
                    </div>
                    <p><a href="players.php" class="btn btn-primary">Kembali</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>