<?php
// CSRF is for security and prevent double POST data
// set in config.php Cross Site Request Forgery
// this is Important
$csrf = array(
    'name' => $this->security->get_csrf_token_name(),
    'hash' => $this->security->get_csrf_hash()
);
?>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" role="form"  method="post" action="<?= base_url() ?>Wilayah_provinsi/simpan_json" id="form">
            <input type="hidden" name="id" id="provinsi_id" />
            <!-- This for CSRF security code -->
            <input type="hidden" name="<?= $csrf['name']; ?>" id="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
            <div class="form-group">
                <label for="kategori" class="col-lg-3 control-label">Nama</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" value="" name="nama" id="nama">
                </div>
            </div>
        </form>
    </div>
</div>