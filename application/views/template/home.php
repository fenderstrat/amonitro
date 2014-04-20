<html>
<head>
	<title><?php echo $title; ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/template/' ?>style.css">
	<script src="<?php echo base_url().'assets/template/' ?>js/jquery-1.7.1.js"></script>
	
	<link rel="shortcut icon" href="http://kpu-bengkuluprov.go.id/kpu/templates/gk_memovie/favicon.ico" >

	<!--slider need-->
	<script src="<?php echo base_url().'assets/template/' ?>js/slides.min.jquery.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
	<!--slider need-->
</head>
<body>

	<!-- header wrapper -->
	<div class="header-wrapper">
		<div class="header">

			<div class="logo kiri">
				<h1><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'assets/template/' ?>image/logo.png"></a></h1>
			</div>

			<div class="search kanan">
				<form>
					<input type="text" placeholder="Cari...">
					<input type="submit" value="Cari">
				</form>
			</div>

			<div class="clear"></div>

		</div>
	</div>
	<!-- header wrapper -->

	<!-- slider wrapper -->
	<div class="slider-wrapper">
		<div class="slider">
			<div id="slides">
				<div class="slides_container">
					<div class="slide">
						<a href="#" title=""><img src="<?php echo base_url().'assets/template/' ?>image/slider.jpg" width="960" height="430" alt="Slide 1"></a>
						<div class="caption" style="bottom:0">
							<p><a href="#"></a></p>
						</div>
					</div>
					<div class="slide">
						<a href="#" title=""><img src="<?php echo base_url().'assets/template/' ?>image/image1.jpg" width="960" height="430" alt="Slide 2"></a>
						<div class="caption">
							<p><a href="#"></a></p>
						</div>
					</div>
					<div class="slide">
						<a href="#" title=""><img src="<?php echo base_url().'assets/template/' ?>image/image2.jpg" width="960" height="430" alt="Slide 3"></a>
						<div class="caption">
							<p><a href="#"></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- slider wrapper -->

	<!-- conten wrapper -->
	<div class="content-wrapper">

		<!-- main wrapper -->
		<div class="main">

			<div class="menu-kiri">
				<h3>Menu</h3>
				<ul>
					<li><a href="#">beranda</a></li>
					<li><a href="#">profil</a></li>
					<li><a href="#">berita</a></li>
					<li><a href="#">daftar calon tetap</a></li>
					<li><a href="#">kontak</a></li>
				</ul>
			</div>

			<div class="news">

				<div class="judul">
					<h2 class="juduls">berita terbaru</h2>
					<div class="clear"></div>
				</div>
				<!-- looping arsip -->
				<?php foreach ($artikel as $newArtikel): ?>
					<div class="arsip">
						<div class="arsip-thumb">
							<a href="<?php echo base_url().'artikel/show/'.$newArtikel->artikel_id.'/'.url_title($newArtikel->judul); ?>"><img src="<?php echo base_url().'assets/uploads/'?>images/<?php echo $newArtikel->image; ?>"></a>
						</div>

						<div class="arsip-summary">
							<h3><a href="<?php echo base_url().'artikel/show/'.$newArtikel->artikel_id.'/'.url_title($newArtikel->judul); ?>"><?php echo $newArtikel->judul; ?></a>
								<span class="meta-date">Diterbitkan pada <?php echo $newArtikel->tanggal ?></span>
							</h3>

							<div class="arsip-sum-text">
								<?php echo character_limiter($newArtikel->isi, 470); ?>
							</div>
						</div>

						<div class="clear"></div>

					</div>
				<?php endforeach ?>
				<!-- looping arsip -->

			</div>

			<div class="clear"></div>

			<!-- older post -->
			<div class="older-post">

				<div>
					<h2 class="juduls">berita lainnya</h2>
					<div class="clear"></div>
				</div>

				<div class="arsips">
					<div class="arsip-thumbs">
						<a href=""><img src="<?php echo base_url().'assets/template/' ?>image/image3.jpg"></a>
					</div>

					<div class="arsip-summarys">
						<h3><a href="">Porttitor d neque ac magna feugiat eleifend et eu est</a>
							<span class="meta-date">26 Maret 2014</span>
						</h3>
					</div>

					<div class="clear"></div>

				</div>

				<div class="arsips">
					<div class="arsip-thumbs">
						<a href=""><img src="<?php echo base_url().'assets/template/' ?>image/image2.jpg"></a>
					</div>

					<div class="arsip-summarys">
						<h3><a href="">magna feugiat eleifend et eu est Porttitor d neque ac </a>
							<span class="meta-date">26 Maret 2014</span>
						</h3>
					</div>

					<div class="clear"></div>

				</div>

				<div class="arsips">
					<div class="arsip-thumbs">
						<a href=""><img src="<?php echo base_url().'assets/template/' ?>image/image2.jpg"></a>
					</div>

					<div class="arsip-summarys">
						<h3><a href="">eleifend et eu est Porttitor d neque ac</a>
							<span class="meta-date">26 Maret 2014</span>
						</h3>
					</div>

					<div class="clear"></div>

				</div>

				<div class="arsips">
					<div class="arsip-thumbs">
						<a href=""><img src="<?php echo base_url().'assets/template/' ?>image/image2.jpg"></a>
					</div>

					<div class="arsip-summarys">
						<h3><a href="">eleifend et eu eseleifend et eu est Porttitor d neque act Porttitor d neque ac</a>
							<span class="meta-date">26 Maret 2014</span>
						</h3>
					</div>

					<div class="clear"></div>

				</div>

				<div class="arsips">
					<div class="arsip-thumbs">
						<a href=""><img src="<?php echo base_url().'assets/template/' ?>image/image2.jpg"></a>
					</div>

					<div class="arsip-summarys">
						<h3><a href="">eleie leifend et eu est Porttitor d neque acfend et eu est Porttitor d neque ac</a>
							<span class="meta-date">26 Maret 2014</span>
						</h3>
					</div>

					<div class="clear"></div>

				</div>

				<div class="arsips">
					<div class="arsip-thumbs">
						<a href=""><img src="<?php echo base_url().'assets/template/' ?>image/image2.jpg"></a>
					</div>

					<div class="arsip-summarys">
						<h3><a href="">eleifend et eu est Porttitor d neque ac</a>
							<span class="meta-date">26 Maret 2014</span>
						</h3>
					</div>

					<div class="clear"></div>

				</div>

				<div class="clear"></div>
			</div>
			<!-- older post -->

		</div>
		<!-- main wrapper -->

		<!-- sidebar wrapper -->
		<div class="sidebar">

			<div class="widget">
				<img src="<?php echo base_url().'assets/template/' ?>image/iklan.gif" alt="FOTO IKLAN" width="300">
			</div>
			
			<div class="widget">
				<a href="#"><img src="<?php echo base_url().'assets/template/' ?>image/daftarpartai.png"></a>
			</div>
			<div class="widget">
				<div class="judul">
					<h3 class="juduls">DPT online</h3>
					<div class="clear"></div>
				</div>
				<a href="http://data.kpu.go.id/dpt.php"><img src="<?php echo base_url().'assets/template/' ?>image/dpt.png" width="300"></a>
			</div>
			<div class="widget">
				<div class="judul">
					<h3 class="juduls">datacenter kpu</h3>
					<div class="clear"></div>
				</div>
				<a href="http://www.kpu.go.id/"><img src="<?php echo base_url().'assets/template/' ?>image/kpu-pusat.png" width="300"></a>
				<p></p>
				<a href="http://silog-data.kpu.go.id/"><img src="<?php echo base_url().'assets/template/' ?>image/silog.png" width="300"></a>
			</div>
		</div>
		<!-- sidebar wrapper -->

		<div class="clear"></div>

	</div>
	<!-- conten wrapper -->

	<!-- footer wrapper -->
	<div class="footer-wrapper">
		<div class="footer">
			<div class="copyright">
				<p>&copy; 2014 KPU Muko Muko</p>
			</div>
			<div class="alamat">
				<p>Jl. Soekarno-Hatta No. 175 Mukomuko 38365</p>
				<p>Telp / Fax 0737 71096</p>
				<p>Email: kpukabmukomuko@gmail.com <p/>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- footer wrapper -->

</body>
</html>