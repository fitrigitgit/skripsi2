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
        <title>Page Edit Data</title>
    </head>

    <body>






        <div class="container" style="margin-top:20px">
            <center>
                <font size="6">Edit Data</font>
            </center>

            <hr>

            <?php
            //jika sudah mendapatkan parameter GET id dari URL
            if (isset($_GET['Nim'])) {
                //membuat variabel $id untuk menyimpan id dari GET id di URL
                $Nim = $_GET['Nim'];

                //query ke database SELECT tabel mahasiswa berdasarkan id = $id
                $select = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE Nim='$Nim'") or die(mysqli_error($conn));

                //jika hasil query = 0 maka muncul pesan error
                if (mysqli_num_rows($select) == 0) {
                    echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                    exit();
                    //jika hasil query > 0
                } else {
                    //membuat variabel $data dan menyimpan data row dari query
                    $data = mysqli_fetch_assoc($select);
                }
            }
            ?>

            <?php
            //jika tombol simpan di tekan/klik
            if (isset($_POST['submit'])) {
                $Nama_Mhs              = $_POST['Nama_Mhs'];
                $Jenis_Kelamin    = $_POST['Jenis_Kelamin'];
                $Program_Studi    = $_POST['Program_Studi'];

                $sql = mysqli_query($conn, "UPDATE mahasiswa SET Nama_Mhs='$Nama_Mhs', Jenis_Kelamin='$Jenis_Kelamin', Program_Studi='$Program_Studi' WHERE Nim='$Nim'") or die(mysqli_error($conn));

                if ($sql) {
                    echo '<script>alert("Berhasil menyimpan data."); document.location="players.php";</script>';
                } else {
                    echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
                }
            }
            ?>

            <form action="" method="post">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nim</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" name="Nim" class="form-control" size="4" value="<?php echo $data['Nim']; ?>" readonly required>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" name="Nama_Mhs" class="form-control" value="<?php echo $data['Nama_Mhs']; ?>" required>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
                    <div class="col-md-6 col-sm-6 ">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" <?php if ($data['Jenis_Kelamin'] == 'Laki-Laki') {
                                                                                                                echo 'checked';
                                                                                                            } ?> required>Laki-Laki
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" <?php if ($data['Jenis_Kelamin'] == 'Perempuan') {
                                                                                                                echo 'checked';
                                                                                                            } ?> required>Perempuan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
                    <div class="col-md-6 col-sm-6">
                        <select name="Program_Studi" class="form-control" required>
                            <option value="">Pilih Program Studi</option>
                            <option value="Teknik Informatika" <?php if ($data['Program_Studi'] == 'Teknik Informatika') {
                                                                    echo 'selected';
                                                                } ?>>Teknik Informatika</option>
                            <option value="Sistem Informasi" <?php if ($data['Program_Studi'] == 'Sistem Informasi') {
                                                                    echo 'selected';
                                                                } ?>>Sistem Informasi</option>
                            <option value="Teknik Sipil" <?php if ($data['Program_Studi'] == 'Teknik Sipil') {
                                                                echo 'selected';
                                                            } ?>>Teknik Sipil</option>
                            <option value="Teknik Mesin" <?php if ($data['Program_Studi'] == 'Teknik Mesin') {
                                                                echo 'selected';
                                                            } ?>>Teknik Mesin</option>
                            <option value="Teknik Elektro" <?php if ($data['Program_Studi'] == 'Teknik Elektro') {
                                                                echo 'selected';
                                                            } ?>>Teknik Elektro</option>
                            <option value="Akuntansi" <?php if ($data['Program_Studi'] == 'Akuntansi') {
                                                            echo 'selected';
                                                        } ?>>Akuntansi</option>
                            <option value="Manajemen" <?php if ($data['Program_Studi'] == 'Manajemen') {
                                                            echo 'selected';
                                                        } ?>>Manajemen</option>
                            <option value="Pendidikan Guru Sekolah Dasar" <?php if ($data['Program_Studi'] == 'Pendidikan Guru Sekolah Dasar') {
                                                                                echo 'selected';
                                                                            } ?>>Pendidikan Guru Sekolah Dasar</option>
                            <option value="Hukum" <?php if ($data['Program_Studi'] == 'Hukum') {
                                                        echo 'selected';
                                                    } ?>>Hukum</option>
                            <option value="Desain Komunikasi Visual" <?php if ($data['Program_Studi'] == 'Desain Komunikasi Visual') {
                                                                            echo 'selected';
                                                                        } ?>>Desain Komunikasi Visual</option>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                        <a href="players.php" class="btn btn-warning">Kembali</a>
                    </div>
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


    </html>

    </body>

<?php } else {
    header("location: admin.php");
}
?>