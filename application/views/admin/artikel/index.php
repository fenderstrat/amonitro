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
					<? foreach ($content as $row):  ?>
						<table id="artikel" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="55%">Judul</th>
									<th width="15%">Kategori</th>
									<th width="15%">Status</th>
									<th width="15%">Tanggal</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<?= $row->judul ?>
										<div class="row-actions">
  											<?= anchor(base_url('admin/artikel/edit/'.$row->artikel_id), 'Edit', array('title' => 'Edit', 'class'=>'text-primary')); ?>
  											<?= anchor(base_url('artikel/detail/'.$row->artikel_id.'/'. url_title($row->judul)), 'View', array('title' => 'View', 'class'=>'text-success')); ?>
  											<?= anchor(base_url('admin/artikel/delete/'.$row->artikel_id), 'Delete', array('title' => 'Delete', 'class'=>'text-danger')); ?>
										</div>
									</td>
									<td><?= $row->kategori ?></td>
									<td><?= $row->status ?></td>
									<td><?= $row->tanggal ?></td>
								</tr>
							</tbody>
						</table>
					<? endforeach ?>
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
</script>