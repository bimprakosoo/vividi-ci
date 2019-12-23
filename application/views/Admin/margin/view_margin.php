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
                           <div class="modal-body">
                                <div class="space-med">
                                    <span class="txt-title-desc txt-margin">Margin Harga Saat Ini : <span class="txt-merah"><?=$margin["f_margin"]?>%</span> Dari Kontrak Rate</span>
                                </div>
                                <?php if (@$_GET["status"] == "success_margin") { ?>
                                    <div class="col-md-12 alert alert-success space-med" id="alert-suc">
                                        <strong>Success!</strong> Margin Berhasil di Perbarui.
                                    </div>
                                <?php } ?>
                                <?php if (@$_GET["status"] == "failed_margin") { ?>
                                    <div class="col-md-12 alert alert-danger space-med" id="alert-suc" >
                                        <strong>Failed!</strong> Margin Gagal di Perbarui.
                                    </div>
                                <?php } ?>
                                <hr>
                                 <?php echo form_open(base_url('Admin/margin/ubah_margin')); ?>
                                <label>Atur Margin Baru</label>
                                <div class="input-group input-group-sm">
                                    <input type="number" name="dt[margin]" class="form-control" value="<?=$margin["f_margin"]?>" min="1" required>
                                    <span class="input-group-btn">
                                        <input type="submit" class="btn btn-info btn-flat" value="Simpan">
                                    </span>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
