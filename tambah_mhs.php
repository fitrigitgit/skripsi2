<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
?>



    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style1.css">
        <title>Page Tambah Data</title>
    </head>

    <body>

        <div class="container" style="margin-top:20px">
            <center>
                <font size="6">Tambah Data</font>
            </center>
            <hr>
            <?php
            if (isset($_POST['submit'])) {
                $Nim            = $_POST['Nim'];
                $Nama_Mhs            = $_POST['Nama_Mhs'];
                $Jenis_Kelamin    = $_POST['Jenis_Kelamin'];
                $Program_Studi        = $_POST['Program_Studi'];

                $cek = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE Nim='$Nim'") or die(mysqli_error($conn));

                if (mysqli_num_rows($cek) == 0) {
                    $sql = mysqli_query($conn, "INSERT INTO mahasiswa(Nim, Nama_Mhs, Jenis_Kelamin, Program_Studi) VALUES('$Nim', '$Nama_Mhs', '$Jenis_Kelamin', '$Program_Studi')") or die(mysqli_error($conn));

                    if ($sql) {
                        echo '<script>alert("Berhasil menambahkan data."); document.location="players.php";</script>';
                    } else {
                        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
                    }
                } else {
                    echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
                }
            }
            ?>

            <form action="" method="post">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nim</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="Nim" class="form-control" size="4" required>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" name="Nama_Mhs" class="form-control" required>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
                    <div class="col-md-6 col-sm-6 ">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" required>Laki-Laki
                            </label>
                            <label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" required>Perempuan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
                    <div class="col-md-6 col-sm-6">
                        <select name="Program_Studi" class="form-control" required>
                            <option value="">Pilih Program Studi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik SipilL">Teknik Sipil</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Pendidikan Guru Sekolah Dasar">Pendidikan Guru Sekolah Dasar</option>
                            <option value="Hukum">Hukum</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                        <a href="players.php" class="btn btn-warning">Kembali</a>

                    </div>
            </form>
        </div>





        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    </body>

    </html>

<?php } else {
    header("location: admin.php");
}
?>