<!-- akan menjadi template  -->

<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>


	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">


				<!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
				<?php // $this->load->view("admin/_partials/breadcrumb.php") 
				?>
				<div class="card o-hidden border-0 shadow-lg my-auto col-lg-auto mx-auto">
					<?php $this->load->view("admin/_partials/images.php") ?> <br>
					<div class="row">



						<div class="col-xl-3 col-sm-6 mb-3">
							<div class="card text-white bg-primary o-hidden h-100">
								<div class="card-body">
									<div class="card-body-icon">
										<i class="fas fa-fw fa-comments"></i>
									</div>
									<div class="mr-5">Data Media</div>
								</div>
								<a class="card-footer text-white clearfix small z-1" href="#">
									<span class="float-left">View Details</span>
									<span class="float-right">
										<i class="fas fa-angle-right"> </i>
									</span>
								</a>
							</div>
						</div>


						<div class="col-xl-3 col-sm-6 mb-3">
							<div class="card text-white bg-warning o-hidden h-100">
								<div class="card-body">
									<div class="card-body-icon">
										<i class="fas fa-fw fa-list"></i>
									</div>
									<div class="mr-5">Data Klien</div>
								</div>
								<a class="card-footer text-white clearfix small z-1" href="#">
									<span class="float-left">View Details</span>
									<span class="float-right">
										<i class="fas fa-angle-right"></i>
									</span>
								</a>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 mb-3">
							<div class="card text-white bg-success o-hidden h-100">
								<div class="card-body">
									<div class="card-body-icon">
										<i class="fas fa-fw fa-shopping-cart"></i>
									</div>
									<div class="mr-5">Data Karyawan</div>
								</div>
								<a class="card-footer text-white clearfix small z-1" href="#">
									<span class="float-left">View Details</span>
									<span class="float-right">
										<i class="fas fa-angle-right"></i>
									</span>
								</a>
							</div>
						</div>


						<div class="col-xl-3 col-sm-6 mb-3">
							<!-- <div class="card text-white bg-danger o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-fw fa-life-ring"></i>
								</div>
								<div class="mr-5"></div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="#">
								<span class="float-left">View Details</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div> -->
						</div>
					</div>
				</div>





			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>