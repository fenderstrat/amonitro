<!-- Error Message -->
<? if($this->session->flashdata('login_failed')) : ?>
<div class="callout callout-danger">
    <h4>
        <p><?= $this->session->flashdata('login_failed') ?></p>
    </h4>
</div>
<? endif ?>

<!-- Jika validasi gagal -->
<? if($this->session->flashdata('validation')) : ?>
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?= $this->session->flashdata('validation') ?>
</div>
<? endif ?>


<!-- Jika data berhasil disimpan -->
<? if($this->session->flashdata('success')) : ?>
<div class="alert alert-success alert-dismissable">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?= $this->session->flashdata('success') ?>
</div>
<? endif ?>

<!-- Jika data gagal disimpan -->
<? if($this->session->flashdata('fail')) : ?>
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?= $this->session->flashdata('fail') ?>
</div>
<? endif ?>

<!-- Jika upload gagal -->
<? if($this->session->flashdata('upload_error')) : ?>
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?= $this->session->flashdata('upload_error') ?>
</div>
<? endif ?>