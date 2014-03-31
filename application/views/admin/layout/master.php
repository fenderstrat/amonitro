<!DOCTYPE html>
<html lang="id">
<head>
	<title><?= $title ?></title>
	<!-- Load CSS -->
	<?= link_tag('assets/css/bootstrap.min.css') ?>
	<?= link_tag('assets/css/font-awesome.min.css') ?>
	<?= link_tag('assets/css/ionicons.min.css') ?>
	<?= link_tag('assets/css/AdminLTE.css') ?>
	
	<!-- Load JS -->
	<?= script_tag('assets/js/jquery-2.0.2.min.js') ?>
	<?= script_tag('assets/js/jquery-ui-1.10.3.min.js') ?>
	<?= script_tag('assets/js/bootstrap.min.js') ?>

</head>
<body  class="skin-blue">

	<header class="header">
		<a href="index.html" class="logo">
			<!-- Add the class icon to your logo image or logo icon to add the margining -->
                    		<?= img(array('src'=>'assets/img/anpanel.png', 'alt'=>'logo')) ?>
		</a>

		<!-- Load Navigation -->
		<? $this->load->view('admin/layout/navigation') ?>
		
		<div class="wrapper row-offcanvas row-offcanvas-left">
			<!-- Load Sidebar -->
			<? $this->load->view('admin/layout/sidebar') ?>

			<!-- Right side column. Contains the navbar and content of the page -->
			<aside class="right-side">                

				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Dashboard
						<small>aNPanel</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Blank page</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<? $this->load->view($template); ?>
				</section>

			</aside>
		</div>
	</header>

	<!-- Load JS -->
	<?= script_tag('assets/js/AdminLTE/app.js') ?>
	<?= script_tag('assets/js/AdminLTE/dashboard.js') ?>
</body>
</html>