<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Daftar Artikel</h3>                                    
			</div>
			<div class="box-body table-responsive">
				<? if($content === null) : ?>
					<div class="alert alert-warning alert-dismissable">
						<i class="fa fa-ban"></i>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<b>Alert!</b> Data belum ada !
					</div>
				<? else : ?>
				<? if($this->session->flashdata('delete_fail')) : ?>
					<div class="alert alert-danger alert-dismissable">
						<i class="fa fa-ban"></i>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?= $this->session->flashdata('delete_fail') ?>
					</div>
				<? endif ?>
				<? if($this->session->flashdata('delete_success')) : ?>
					<div class="alert alert-success alert-dismissable">
						<i class="fa fa-check"></i>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?= $this->session->flashdata('delete_success') ?>
					</div>
				<? endif ?>
			<table id="example1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
			                                    <th>Judul Artikel</th>
			                                    <th>Kategori</th>
			                                    <th>Tags</th>
			                                    <th>Tanggal</th>
			                                    <th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<? $i = 1 ?>
					<? foreach ($content as $row):  ?>
						<tr>
							<td>
								<?=  $i ?>
							</td>
							<td>
								<?= character_limiter($row->judul, 40) ?>
							</td>
							<td>
								<?= $row->kategori ?>
							</td>
							<td>
								<?=  character_limiter($row->tag, 10) ?>
							</td>
							<td>
								<?= $row->tanggal ?>
								<br>
								<?= $row->status ?>
							</td>
							<td>
								<?= anchor(base_url('admin/artikel/edit/'.$row->artikel_id.'/'.url_title($row->judul)), 'Edit', array('title' => 'Edit', 'class'=>'btn btn-sm btn-primary')); ?>
								<?= anchor(base_url('admin/artikel/detail/'.$row->artikel_id.'/'.url_title($row->judul)), 'Lihat', array('title' => 'Edit', 'class'=>'btn btn-sm btn-success')); ?>
								<? if($row->status = 'publish') :?>
									<?= anchor(base_url('admin/artikel/status/'.$row->artikel_id.'/'.url_title($row->judul)), 'Draft', array('title' => 'Edit', 'class'=>'btn btn-sm btn-warning')); ?>
								<? else : ?>
									<?= anchor(base_url('admin/artikel/status/'.$row->artikel_id.'/'.url_title($row->judul)), 'Publish', array('title' => 'Edit', 'class'=>'btn btn-sm btn-warning')); ?>
								<? endif ?>
								<?= anchor(base_url('admin/artikel/trash/'.$row->artikel_id.'/'.url_title($row->judul)), 'Sampah', array('title' => 'Edit', 'class'=>'btn btn-sm btn-danger')); ?>
							</td>
						</tr>
					<? $i++; ?>
					<? endforeach ?>
				</tbody>
			</table>
	<? endif ?>
</div>
</div>

</div>
</div>

<?= link_tag('assets/css/datatables/dataTables.bootstrap.css') ?>
<?= script_tag('assets/js/plugins/datatables/jquery.dataTables.js') ?>
<?= script_tag('assets/js/plugins/datatables/dataTables.bootstrap.js') ?>

<!-- page script -->
<script type="text/javascript">
	$(function() {
		$('#artikel').dataTable({
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false
		});
	});
	 $("#example1").dataTable({
                    "aoColumns": [
                  { "bSortable": false },
                  null, null,null, null,
                  { "bSortable": false }
                ] } );
</script>