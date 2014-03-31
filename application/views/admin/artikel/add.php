 <div class="row">
 	<form action="" method="POST" class="form-horizontal" role="form">
 		<div class="col-md-8">
 			<div class="box box-danger">
 				<div class="box-header"></div><!-- /.box-header -->
 				<div class="box-body">	 			
 					<div class="form-group">
 						<div class="col-md-12">
 							<input type="text" name="judul" class="form-control" required="required" title="judul" placeholder="Judul">
 						</div>
 					</div>	 			
 					<div class="form-group">
 						<div class="col-md-12">
 							<textarea id="editor1" name="isi" rows="10" cols="80"></textarea>
 						</div>
 					</div>	 	
 				</div><!-- /.box-body -->
 			</div><!-- /.box -->
 		</div><!-- /.col -->
 		<div class="col-md-4">
 			<div class="box box-danger">
 				<div class="box-header">
 					<i class="fa fa-warning"></i>
 					<h3 class="box-title">Date</h3>
 				</div><!-- /.box-header -->
 				<div class="box-body">
 					<div class="form-group">
 						<div class="col-md-12">
 							<input class="form-control datepicker" size="16" type="text">
 						</div>
 					</div>
 				</div>	 
 			</div><!-- /.box-body -->
 			<div class="box box-danger">
 				<div class="box-header">
 					<i class="fa fa-warning"></i>
 					<h3 class="box-title">Status</h3>
 				</div><!-- /.box-header -->
 				<div class="box-body">
 					<div class="form-group">
 						<div class="col-md-12">
 							<div class="radio">
 								<label>
 									<input type="radio" name="status" id="status" value="draft" >
 									Draft
 								</label>
 								<label>
 									<input type="radio" name="status" id="input" value="publish" >
 									Publish
 								</label>
 							</div>
 						</div>
 					</div>
 				</div>	 
 			</div><!-- /.box-body -->
 		</div><!-- /.box -->
 	</div><!-- /.col -->		
 </form>
</div>

<?= link_tag('assets/js/plugins/datepicker/css/datepicker.css') ?>
<?= script_tag('assets/js/plugins/ckeditor/ckeditor.js') ?>
<?= script_tag('assets/js/plugins/datepicker/js/bootstrap-datepicker.js') ?>
<script type="text/javascript">
	$(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
            });

 	// datepicker
 	$('.datepicker').datepicker({
 		format: 'mm/dd/yyyy',
 		todayHighlight: true
 	})
 </script>