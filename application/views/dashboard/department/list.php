<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 form-search-panel">
        <div class="x_panel">   
            <div class="x_title">                                       
                <h2><?php echo lang('Search') ?><small><?php echo lang('MasterDepartment') ?></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form name="search" class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-sm-3 col-xs-12"><?php echo lang('Name') ?></label>
                        <div class="col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-xs-12" name="dept_name">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary search-data"><i class="fas fa-search"></i> <?php echo lang('Search') ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 form-action-panel">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo lang('Action') ?><small><?php echo lang('MasterDepartment') ?></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content"></div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 table-data-panel">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo lang('List') ?><small><?php echo lang('MasterDepartment') ?></small></h2>
                <div class="pull-right tableTools-container"></div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content"></div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('vendors/parsleyjs/dist/parsley.min.js') ?>"></script> 
<script>
$(document).ready(function() {
    // Height Change Handler
    $(".form-action-panel").bind('heightChange', function() {
        // View Manipulation
        let form_action_height = $(".form-action-panel .x_panel").outerHeight();
        let form_search_height = $(".form-search-panel .x_panel").outerHeight();

        if(form_search_height < form_action_height)
            $(".form-search-panel .x_panel").css('height', form_action_height);
    });

    // Load Form Add
    let form_add = sendAjax('<?php echo base_url('department/add') ?>');
    $(".form-action-panel .x_panel .x_content").html(form_add);

    // Trigger heightChange
    $(".form-action-panel").trigger('heightChange');

    // Search Button
    $("form[name='search']").on('submit', function(e) {
        e.preventDefault();
        let uri = '<?php echo base_url('department/index') ?>';
        let data = $("form[name='search']").serialize() + "&submit=1";
        let response = sendAjax(uri, data);

        $(".table-data-panel .x_panel .x_content").html(response);
    });
});
</script>