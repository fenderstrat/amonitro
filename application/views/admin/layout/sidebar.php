  <!-- Left side column. contains the logo and sidebar -->
  <aside class="left-side sidebar-offcanvas">                
  	<!-- sidebar: style can be found in sidebar.less -->
  	<section class="sidebar">
  		<!-- Sidebar user panel -->
  		<div class="user-panel">
  			<div class="pull-left image">
  				<?= img(array('src'=>'assets/img/avatar3.png', 'alt'=>'User Image', 'class'=>'img-circle')) ?>
  			</div>
  			<div class="pull-left info">
  				<p>Hello, Jane</p>
  			</div>
  			<div class="pull-left">
  				<p style="font-size: 12px;"><small>Ini Adalah <span class="text-info">aNPanel v1.0</span> Terimakasih Atas Kepercayaan Yang Telah Anda Berikan. Jika Ada Kendala Silahkan Kontak Kami Melalui Email di <span class="text-info">support@amonito.com</span></small></p>
  			</div>
  		</div>
  		<!-- search form -->
  		<form action="#" method="get" class="sidebar-form">
  			<div class="input-group">
  				<input type="text" name="q" class="form-control" placeholder="Search..."/>
  				<span class="input-group-btn">
  					<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
  				</span>
  			</div>
  		</form>
  		<!-- /.search form -->
  		<!-- sidebar menu: : style can be found in sidebar.less -->
  		<ul class="sidebar-menu">
  			<li class="activenew">
  				<?= anchor(base_url('admin/dashboard'), '<span><i class="fa fa-dashboard"></i> Dashboard</span>', array('title' => 'Dashboard')); ?>
  			</li>
  			<li class="treeview">
  				<?= anchor('#', '<span><i class="fa fa-list"></i> Artikel </span> <i class="fa fa-angle-left pull-right"></i>', array('title' => 'Artikel')); ?>
  				<ul class="treeview-menu">
	  				<li><?= anchor(base_url('admin/artikel/add'), '<i class="fa fa-angle-double-right"></i> Buat Baru', array('title' => 'Buat Baru')); ?></li>
	  				<li><?= anchor(base_url('admin/artikel'), '<i class="fa fa-angle-double-right"></i> Lihat Artikel', array('title' => 'Lihat Artikel')); ?></li>
	  				<li><?= anchor(base_url('admin/kategori'), '<i class="fa fa-angle-double-right"></i> Kategori', array('title' => 'Kategori')); ?></li>
	  				<li><?= anchor(base_url('admin/tags'), '<i class="fa fa-angle-double-right"></i> Tags', array('title' => 'Tags')); ?></li>
  				</ul>
  			</li>
  			<li>
  				<?= anchor(base_url('admin/Halaman'), '<span><i class="fa fa-copy"></i> Halaman</span>', array('title' => 'Halaman')); ?>
  			</li>
  			<li>
  				<?= anchor(base_url('admin/media'), '<span><i class="fa fa-camera-retro"></i> Media</span>', array('title' => 'Media')); ?>
  			</li>
  			<li>
  				<?= anchor(base_url('admin/user'), '<span><i class="fa fa-coffee"></i> User</span>', array('title' => 'User')); ?>
  			</li>
  			<li>
  				<?= anchor(base_url('admin/pengaturan'), '<span><i class="fa fa-cogs"></i> Pengaturan</span>', array('title' => 'Pengaturan')); ?>
  			</li>
  		</ul>
  	</section>
  	<!-- /.sidebar -->
  </aside>