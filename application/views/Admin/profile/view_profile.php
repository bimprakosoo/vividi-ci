<script>
    window.setTimeout(function() {
        $("#alert-suc").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);
</script>
<div class="space-hig-top">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body box-hubungi pad-rata">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="space-med">
                                <span class="txt-title-desc">Detail Profile</span>
                            </div>
                        </div>
                        <?php if (@$_GET["status"] == "edit_success") { ?>
                            <div class="col-md-12" id="alert-suc">
                                <div class="alert alert-success">
                                    <strong>Success!</strong> Perubahan pada Akun Anda Berhasil di Simpan.
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (@$_GET["status"] == "edit_failed") { ?>
                            <div class="col-md-12" id="alert-suc">
                                <div class="alert alert-danger">
                                    <strong>Failed!</strong> Terjadi Kesalahan Pada Perubahan Akun Anda. Harap Ulangi Kembali.
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (@$_GET["status"] == "email_exist") { ?>
                            <div class="col-md-12" id="alert-suc">
                                <div class="alert alert-warning">
                                    <strong>Failed!</strong> Email yang Anda Masukkan Tersedia. Harap Gunakan Email Yang Berbeda.
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <?= validation_errors() ?>
                            <form method="post" action="<?php echo base_url('Admin/Profile/edit_profile'); ?>" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" name="dt[f_kode]" class="form-control" value="<?php echo $profil["id"]; ?>" required>
                                    <input type="hidden" name="dt[email_lama]" class="form-control" value="<?php echo $profil["email"]; ?>" required>
                                    <?php
                                    $awal  = explode(" ", $profil["nama"]);
                                    $cc    = strlen($awal[0]);
                                    $akhir = substr($profil["nama"], $cc);
                                    ?>
                                    <div class="form-group">
                                        <label>Nama Depan</label>
                                        <input type="text" name="dt[nama_awal]" class="form-control" value="<?= $awal[0] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Belakang</label>
                                        <input type="text" name="dt[nama_akhir]" class="form-control" value="<?= $akhir ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="text" name="dt[f_telepon]" class="form-control" value="<?php echo $profil["telepon"]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="dt[f_email]" class="form-control" value="<?php echo $profil["email"]; ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary float-left" value="Simpan" name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>