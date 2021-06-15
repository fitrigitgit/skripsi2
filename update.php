<?php
// Include config file
require_once "connection.php";

// Define variables and initialize with empty values
$Nama_Mhs  = $Jenis_Kelamin = $Program_Studi = "";
$Nama_Mhs_err = $Jenis_Kelamin_err = $Program_Studi_err = "";

// Processing form data when form is submitted
if (isset($_POST["Nim"]) && !empty($_POST["Nim"])) {
    // Get hidden input value
    $Nim = $_POST["Nim"];


    // Validate name
    $input_name = trim($_POST["Nama_Mhs"]);
    if (empty($input_name)) {
        $Nama_Mhs_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $Nama_Mhs_err = "Please enter a valid name.";
    } else {
        $Nama_Mhs = $input_name;
    }

    // Validate address address
    $input_jenisklm = trim($_POST["Jenis_Kelamin"]);
    if (empty($input_jenisklm)) {
        $Jenis_Kelamin_err = "Please enter an address.";
    } else {
        $Jenis_Kelamin = $input_jenisklm;
    }

    // Validate salary
    $input_prodi = trim($_POST["Program_Studi"]);
    if (empty($input_prodi)) {
        $Program_Studi_err = "Please enter the salary amount.";
    } elseif (!ctype_digit($input_prodi)) {
        $Program_Studi_err = "Please enter a positive integer value.";
    } else {
        $Program_Studi = $input_prodi;
    }

    // Check input errors before inserting in database
    if (empty($Nama_Mhs_err) && empty($Jenis_Kelamin_err) && empty($Program_Studi_err)) {
        // Prepare an update statement
        $sql = "UPDATE mahasiswa SET Nama_Mhs=?, Jenis_Kelamin=?, Program_Studi=?, WHERE Nim=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_jenisklm, $param_prodi, $param_nim);

            // Set parameters
            $param_name = $Nama_Mhs;
            $param_jenisklm = $Jenis_Kelamin;
            $param_prodi = $Program_Studi;
            $param_nim = $Nim;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["Nim"]) && !empty(trim($_GET["Nim"]))) {
        // Get URL parameter
        $Nim =  trim($_GET["Nim"]);

        // Prepare a select statement
        $sql = "SELECT * FROM mahasiswa WHERE Nim = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_nim);

            // Set parameters
            $param_nim = $Nim;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $Nama_Mhs = $row["Nama_Mhs"];
                    $Jenis_Kelamin = $row["Jenis_Kelamin"];
                    $Program_Studi = $row["Program_Studi"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <input type="text" name="Nama_Mhs" class="form-control <?php echo (!empty($Nama_Mhs_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Nama_Mhs; ?>">
                            <span class="invalid-feedback"><?php echo $Nama_Mhs_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <textarea name="address" class="form-control <?php echo (!empty($Jenis_Kelamin_err)) ? 'is-invalid' : ''; ?>"><?php echo $Jenis_Kelamin; ?></textarea>
                            <span class="invalid-feedback"><?php echo $Jenis_Kelamin_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Program Studi</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($Program_Studi_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Program_Studi; ?>">
                            <span class="invalid-feedback"><?php echo $Program_Studi_err; ?></span>
                        </div>
                        <input type="hidden" name="Nim" value="<?php echo $Nim; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>