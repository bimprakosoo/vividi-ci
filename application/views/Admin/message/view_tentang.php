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
                                <span class="txt-title-desc">Detail Tentang Dashboard Mitra
                                </span>
                            </div>
                        </div>
                        <?php if (@$_GET["status"] == "success_saving") { ?>
                            <div class="col-md-12 space-med" id="alert-suc">
                                <div class="alert alert-success">
                                    <strong>Success!</strong> Berhasil Memperbarui Konten.
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <?php echo form_open(base_url('Admin/Message/save_tentang')); ?>
                            <textarea id="editor1" name="editor1" rows="10" cols="80"><?= $post["f_post"] ?></textarea>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary float-left" value="Simpan" name="submit">
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>