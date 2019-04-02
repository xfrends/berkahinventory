<form id="parsley-form" class="form-horizontal" novalidate name="form_edit">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Category<span class="required">*</span></label>
        <div class="dropdown">
            <?php echo form_dropdown('category_id', $category,$records->category_id, 'class="form-control" required="required"'); ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Merk<span class="required">*</span></label>
        <div class="dropdown">
            <?php echo form_dropdown('merk_id', $merk,$records->merk_id, 'class="form-control" required="required"'); ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Satuan<span class="required">*</span></label>
        <div class="dropdown">
            <?php echo form_dropdown('satuan_id', $product,$records->satuan_id, 'class="form-control" required="required"'); ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Nama Barang <span class="required">*</span></label>
        <input type="text" class="form-control" name="name" value="<?php echo $records->nama_barang ?>" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Harga<span class="required">*</span></label>
        <input type="text" class="form-control" name="harga" value="<?php echo $records->harga ?>" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Kode Barang<span class="required">*</span></label>
        <input type="text" class="form-control" name="kode_barang" value="<?php echo $records->kode_barang ?>" required="required">
    </div>
    <!-- <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Stock Masuk<span class="required">*</span></label>
        <input type="text" class="form-control" name="stock_masuk" value="<?php echo $records->stock_masuk ?>" required="required">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label">Stock Keluar<span class="required">*</span></label>
        <input type="text" class="form-control" name="stock_keluar" value="<?php echo $records->stock_keluar ?>" required="required">
    </div> -->
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
        var link = "<?php echo base_url('barang/update/'.$records->m_id) ?>",
            form_selector = "form[name='form_edit']";

        submitForm(null, form_selector, link);
        return false;
    });
</script>