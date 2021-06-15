<?php
session_start();
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
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/fontawesome/css/all.min.css">

		<title>Admin Page</title>
	</head>

	<body>
		<div>
			<nav class="navbar navbar-expand-sm navbar-light bg-danger bg-gradient ">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link active text-white" aria-current="page" href="adminhome.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white" href="players.php">Daftar Mahasiswa</a>
							</li>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white" href="allquestions.php">Soal TPA</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white" href="daftarhasil.php">Hasil TPA</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Admin
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<li><a class="dropdown-item" href="#">Profile</a></li>
									<li><a class="dropdown-item" href="exit.php">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div class="container-fluid mt-5">
			<h1 class="border-bottom text-center">Selamat Datang Admin</h1>


			<center><br><br>
				<img src="assets/images/logonsp.png" width="200px" height=" 200px" /> <br><br><br><br>
				<font Size="6" face="Helvetica">Sistem Tes Potensi Akademik</font> <br><br>
				<font Size="6">Universitas Nusa Putra Kota Sukabumi</font>
			</center>

		</div>
		<br>



		<div class="card-footer text-center text-white bg-danger bg-gradient mt-5 ">
			Copyright | TPA 2021.
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