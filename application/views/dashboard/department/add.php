<form id="parsley-form" class="form-horizontal" novalidate name="form_add">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label"><?php echo lang ('Name') ?><span class="required">*</span></label>
        <input type="text" class="form-control" name="dept_name" required="required">
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
      $("#parsley-form").parsley().on('field:validated', function(){}).on('form:submit', function(){
        var link = "<?php echo base_url('department/add') ?>",
        form_selector = "form[name='form_add']";
        submitForm(null, form_selector, link);
        return false;
    });

</script>