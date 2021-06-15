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
		<link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<title>Daftar Mahasiswa</title>
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
							<li class="nav-item">
								<a class="nav-link text-white" href="allquestions.php">Soal TPA</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white" href="daftarhasil.php">Hasil TPA</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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


		<style>
			table tr td:last-child {
				width: 120px;
			}
		</style>
		<script>
			$(document).ready(function() {
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
		</head>

		<body>

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="mt-5 mb-3 clearfix">
							<h2 class="text-center border-bottom"> <i class="fas fa-user-graduate m-1"></i>Daftar Mahasiswa</h2>
							<a href="tambah_mhs.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
						</div>
						<?php


						// Attempt select query execution
						$sql = "SELECT * FROM mahasiswa";
						if ($result = mysqli_query($conn, $sql)) {
							if (mysqli_num_rows($result) > 0) {
								echo '<table class="table table-bordered table-striped">';
								echo "<thead>";
								echo "<tr>";
								echo "<th>NIM</th>";
								echo "<th>NAMA MAHASISWA</th>";
								echo "<th>JENIS KELAMIN</th>";
								echo "<th>PROGRAM STUDI</th>";
								echo "<th>Action</th>";
								echo "</tr>";
								echo "</thead>";
								echo "<tbody>";
								while ($row = mysqli_fetch_array($result)) {
									echo "<tr>";
									echo "<td>" . $row['Nim'] . "</td>";
									echo "<td>" . $row['Nama_Mhs'] . "</td>";
									echo "<td>" . $row['Jenis_Kelamin'] . "</td>";
									echo "<td>" . $row['Program_Studi'] . "</td>";
									echo "<td>";
									echo '<a href="view.php?Nim=' . $row['Nim'] . '" class="mr-3" title="Detail" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
									echo '<a href="cobaupdate.php?Nim=' . $row['Nim'] . '" class="mr-3" title="Edit" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
									echo '<a href="delete.php?Nim=' . $row['Nim'] . '" title="Hapus" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
									echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
								echo "</table>";
								// Free result set
								mysqli_free_result($result);
							} else {
								echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
							}
						} else {
							echo "Oops! Something went wrong. Please try again later.";
						}

						// Close connection
						mysqli_close($conn);
						?>
					</div>
				</div>
			</div>

		</body>

	</html>





	<div class="card-footer text-center text-white bg-danger bg-gradient">
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