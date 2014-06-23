<?= form_open_multipart(base_url('admin/artikel/update')) ?>
    <div class='row'>
        <div class='col-md-8'>
            <div class='box box-info'>
                <div class='box-header'>
                </div><!-- /.box-header -->
                <div class='box-body pad'>

                    <!-- load pesan -->
                    <?= $this->load->view('admin/layout/message'); ?>

                    <div class="form-group">
                        <label for="nama">Judul Artikel</label>
                        <input type="text" name="jd" value="<?= $artikel->judul ?>" class="form-control" id="nama" placeholder="Masukan Judul">
                    </div>
                    <div class="form-group">
                        <textarea id="editor1" name="isi" artikels="10" cols="80">
                            <?= $artikel->isi ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi SEO</label>
                        <textarea name="deskripsi" title="Ini Adalah SEO Deskrpisi Untuk Meningkatkan Hasil Pencairan Pada Search Engine. Jika Tidak Membutuhkannya Maka Tinggalkan Kosong Maka Kami Akan Menset Paragraf Pertama Dalam Artikel Anda Sebagai SEO Deskripsinya" class="form-control text-left" artikels="3" placeholder="Masukan Deskrpsi SEO.">
                            <?= $artikel->deskripsi  ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">Tags</label>
                        <input value="<?= $artikel->tag ?>" type="text" name="tag" class="form-control" id="nama" placeholder="Masukan Tags Artikel Pisahkan Dengan Koma">
                    </div>

                </div>
            </div><!-- /.box -->
        </div><!-- /.col-->
        <div class='col-md-4'>
            <div class='box box-info'>
                <div class='box-header'>
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                    <!-- Date and time range -->
                    <div class="form-group">
                        <label>Tanggal Publish:</label>
                        <div id="datetimepicker1" class="input-append date">
                            <div class="form-group">
                                <div class='col-md-8 input-group date' id='datetimepicker1'>
                                    <input placeholder="<?= date('Y/m/d H:i') ?>" value="<?= $artikel->tanggal ?>"  type='text' name="tgl" class="form-control" />
                                    <span value="" class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- /.form group -->
                <div class="form-group">
                    <label>Status Publish:</label>
                    <div class='col-md-8 input-group'>
                        <select name="sts" class="form-control">
                            <? if($artikel->status === 'draft')  : ?>
                                <option value="publish">Publish</option>
                                <option value="draft" selected>Draft</option>
                            <? else : ?>
                                <option value="publish" selected>Publish</option>
                                <option value="draft">Draft</option>
                            <? endif ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Fitur Image</label>
                    <? if (!empty($artikel->image)) : ?>
                        <? $image_properties = array(
                            'src' => 'assets/uploads/'.$artikel->image,
                            'alt' => 'feature image',
                            'class' => 'img-responsive'
                            );
                            echo img($image_properties);
                            echo br();
                            echo '<a onclick="return pesan()" class="btn btn-danger pull-right" href='.base_url('admin/artikel/delete_image/'.$artikel->artikel_id).'>Hapus</a>';
                            echo '<div class="clearfix"></div>';
                            echo '<hr>';
                        ?>
                    <? endif ?>
                    <?= form_hidden('image', $artikel->image); ?>
                    <input type="file" name="ico" id="exampleInputFile">
                    <p class="help-block">Pilih File jika ingin Mengganti Icon dan File Harus Bertipe PNG/JPEG/GIF Max Ukuran 200kb</p>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div><!-- /.box -->
        <div class='box box-info'>
            <div class='box-body pad'>
                <div class="form-group clearfix"> 
                    <label for="exampleInputFile">Kategori</label>
                </div>
                
                <? if ($artikel_kategori !== null) : ?>
                    <? foreach($artikel_kategori as $row) :?>
                        <label class="badge bg-blue">
                                <input type="checkbox" name="kategori[]" value="<?= $row->kategori_id ?>" checked="checked">
                                <i class="icon-only icon-bold bigger-110"></i>
                                <?= $row->kategori ?>
                        </label>    
                    <? endforeach ?>
                <? endif ?>

                <? if ($kategori !== null) : ?>
                    <? foreach($kategori as $row) :?>
                        <label class="badge bg-blue">
                                <input type="checkbox" name="kategori[]" value="<?= $row->kategori_id ?>">
                                <i class="icon-only icon-bold bigger-110"></i>
                                <?= $row->kategori ?>
                        </label>    
                    <?endforeach; ?>
                <? endif ?>
                <?= form_hidden('id', $artikel->artikel_id); ?>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col-->
</div><!-- ./artikel -->
<? form_close() ?>

<?= link_tag('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') ?>
<?= link_tag('assets/css/iCheck/all.css') ?>
<?= script_tag('assets/js/plugins/tinymce/tinymce.min.js') ?>
<?= script_tag('assets/js/plugins/momentjs/moment.min.js') ?>
<?= script_tag('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') ?>

<script type="text/javascript">
    tinymce.init({
        selector: "#editor1",
        theme: "modern",
        subfolder:"",
        plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor filemanager"
        ],
        image_advtab: true,
        toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | image media | print preview code"
    }); 
</script>
<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({
                    //useCurrent: true, 
                    language: 'id',
                    //useSeconds: true,  
                });
        $('textarea').tooltip({
            track: true
        });

    });
</script>
<script type="text/javascript">
    function pesan() {
       var answer = confirm("Apakah Anda yakin untuk menghapus?");
       if (answer) {
          return true;
      }

      return false;
  }
</script>