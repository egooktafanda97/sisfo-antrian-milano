<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/admin/") ?>images/favicon.png">
	<!-- Custom Stylesheet -->
	<link href="<?= base_url("assets/admin/") ?>css/style.css" rel="stylesheet">
	<link href="<?= base_url("assets/admin/") ?>./plugins/tables/css/datatable/dataTables.bootstrap4.min.css"
		rel="stylesheet">
	<!-- Include Bootstrap CSS -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->

	<!-- DI TAMBAHKAN -->
	<!-- Include DataTables CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
	<!-- DI TAMBAHKAN -->

</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="loader">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
			</svg>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->


	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">

		<!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
			<div class="brand-logo">
				<a href="index.html">
					<b class="logo-abbr"><img src="<?= base_url("assets/admin/") ?>images/logo.png" alt=""> </b>
					<span class="logo-compact"><img src="<?= base_url("assets/admin/") ?>./images/logo-compact.png"
							alt=""></span>
					<span class="brand-title">
						<img src="images/logo-text.png" alt="">
					</span>
				</a>
			</div>
		</div>
		<!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
		<div class="header">
			<div class="header-content clearfix">

				<div class="nav-control">
					<div class="hamburger">
						<span class="toggle-icon"><i class="icon-menu"></i></span>
					</div>
				</div>
				<div class="header-left">
					<div class="input-group icons">
						<div class="input-group-prepend">
							<span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
									class="mdi mdi-magnify"></i></span>
						</div>
						<input type="search" class="form-control" placeholder="Search Dashboard"
							aria-label="Search Dashboard">
						<div class="drop-down   d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
						</div>
						
					</div>
				</div>
				<div class="header-right">
							<li class="icons dropdown">
								<div class="user-img c-pointer position-relative" data-toggle="dropdown">
									<span class="activity active"></span>
									<img src="<?= base_url("assets/admin/") ?>images/profile_default.png" height="40" width="40" alt="">
								</div>
								<div class="drop-down dropdown-profile   dropdown-menu">
									<div class="dropdown-content-body">
										<ul>
											<li>
												<a href="app-profile.html"><i class="icon-user"></i>
													<span>Profile</span></a>
											</li>
											<li><a href="<?= base_url('login/logout') ?>"><i class="icon-key"></i>
													<span>Logout</span></a></li>
										</ul>
									</div>
								</div>
							</li>
						</div>
			</div>
		</div>
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

		<!--**********************************
            Sidebar start
        ***********************************-->

		<?php $this->load->view('templates/navbar'); ?>

		<!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">

			<div class="row page-titles mx-0">
				<div class="col p-md-0">
					<ol class="breadcrumb">
						<?php
            $segments = $this->uri->segment_array();

            // Tambahkan breadcrumb untuk setiap segmen URI
            $url = base_url();
            foreach ($segments as $segment) {
                $url .= $segment . '/';
                $segment_name = ucfirst(str_replace(['_', '-'], ' ', $segment));
                echo '<li class="breadcrumb-item"><a href="' . $url . '">' . $segment_name . '</a></li>';
            }
            ?>
					</ol>
				</div>
			</div>

			<!-- row -->

			<div class="container-fluid">
				<?php $this->load->view('/Page/' . $page); ?>

			</div>
			<!-- #/ container -->
		</div>
		<!--**********************************
            Content body end
        ***********************************-->
	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->
	<script src="<?= base_url("assets/admin/") ?>plugins/common/common.min.js"></script>
	<script src="<?= base_url("assets/admin/") ?>js/custom.min.js"></script>
	<script src="<?= base_url("assets/admin/") ?>js/settings.js"></script>
	<script src="<?= base_url("assets/admin/") ?>js/gleek.js"></script>
	<script src="<?= base_url("assets/admin/") ?>js/styleSwitcher.js"></script>


	<!-- <script src="<?= base_url("assets/admin/") ?>./plugins/tables/js/jquery.dataTables.min.js"></script> -->
	<!-- <script src="<?= base_url("assets/admin/") ?>./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script> -->
	<script src="<?= base_url("assets/admin/") ?>./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>


	<!-- DI TAMBAHKAN -->

	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

	<!-- Include DataTables scripts -->
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>

	<!-- Include DataTables Responsive extension scripts -->
	<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
	<script>
		new DataTable('#example', {
			responsive: true
		});

	</script>
	<!-- DI TAMBAHKAN -->

</body>

</html>
