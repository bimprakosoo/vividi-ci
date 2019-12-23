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
                                <span class="txt-title-desc">Reset Password</span>
                            </div>
                        </div>
                        <?php if (@$_GET["status"] == "passchange_success") { ?>
                            <div class="col-md-12" id="alert-suc">
                                <div class="alert alert-success">
                                    <strong>Success!</strong> Anda Berhasil Mengganti Password Anda.
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (@$_GET["status"] == "passchange_failed") { ?>
                            <div class="col-md-12" id="alert-suc">
                                <div class="alert alert-danger">
                                    <strong>Failed!</strong> Terjadi Kesalahan Pada Password yang Anda Masukkan. Harap Ulangi Kembali.
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <form method="post" action="<?php echo base_url('Admin/Profile/edit_password'); ?>" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                     <input type="hidden" name="dt[f_kode]" class="form-control" value="<?php echo $profil["id"]; ?>" required>
                                    <input type="password" name="dt[f_password_lama]" class="form-control" placeholder="Masukkan Password Lama">
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="dt[f_password_baru]" class="form-control" placeholder="Masukkan Password Baru">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password Baru</label>
                                    <input type="password" name="dt[f_password_confirm]" class="form-control" placeholder="Confirm Password">
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