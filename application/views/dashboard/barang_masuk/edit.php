<form id="parsley-form" class="form-horizontal" novalidate name="form_edit">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">id barang<span class="required">*</span></label>
        <div class="dropdown">
            <?php echo form_dropdown('barang_id', $product,$records->barang_id, 'class="form-control" required="required"'); ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Jumlah<span class="required">*</span></label>
        <input type="text" class="form-control" name="jumlah" value="<?php echo $records->jumlah ?>" required="required">
    </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Supplier<span class="required">*</span></label>
        <input type="text" class="form-control" name="supplier" value="<?php echo $records->supplier ?>" required="required">
    </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Keterangan<span class="required">*</span></label>
        <input type="text" class="form-control" name="keterangan" value="<?php echo $records->keterangan_barang ?>" required="required">
    </div>
    </div>
    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> <?php echo lang('Update') ?></button>
        </div>
    </div>
</form>
<script>
    // To Validate Form
    $("#parsley-form").parsley().on('field:validated',function(){}).on('form:submit', function(){
        var link = "<?php echo base_url('barang/update_barang_masuk/'.$records->m_id) ?>",
            form_selector = "form[name='form_edit']";

        submitForm(null, form_selector, link);
        return false;
    });
</script>