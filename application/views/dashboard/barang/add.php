<form id="parsley-form" action="" class="form-horizontal" novalidate name="form_add">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <label class="control-label">Category<span class="required">*</span></label>
            <div class="dropdown">
                <?php echo form_dropdown('category_id', $category,null, 'class="form-control" required="required"'); ?>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <label class="control-label">Nama Barang<span class="required">*</span></label>
            <input type="text" class="form-control" name="name" required="required">
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <label class="control-label">Kode Barang<span class="required">*</span></label>
            <input type="text" class="form-control" name="kode_barang" required="required">
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <label class="control-label">Stock Masuk<span class="required">*</span></label>
            <input type="text" class="form-control" name="stock_masuk" required="required">
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <label class="control-label">Stock Keluar<span class="required">*</span></label>
            <input type="text" class="form-control" name="stock_keluar" required="required">
        </div>
        <div class="clearfix"></div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> <?php echo lang('button_save') ?></button>
            </div>
        </div>
</form>

<script>
    $("#parsley-form").parsley().on('field:validated', function(){}).on('form:submit', 
        function(){
            var link = "<?php echo base_url('barang/create') ?>",
            form_selector = "form[name='form_add']";
            submitForm(null, form_selector, link);
            return false;
        }
    );

</script>