<table class="datatable table">
    <thead>
        <tr>
            <th class="no-order" width="40px">#</th>
            <th><?php echo lang('Name') ?></th>
            <th><?php echo lang('Resto') ?> <?php echo lang('Name') ?></th>
            <th class="text-center no-order" width="100px"><?php echo lang('Action') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (@$records as $ir => $r): ?>
        <tr>
            <td><?php echo $ir+1 ?></td>
            <td><?php echo $r->chapter_name ?></td>
            <td><?php echo $r->resto_name ?></td>
            <td class="text-center">
                <div class="btn-group">
                    <button class="btn btn-sm btn-success action_edit" value="<?php echo $r->id ?>"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger action_delete" value="<?php echo $r->id ?>"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<script>
    // Apply Datatable plugin into .datatable
    let myTable = $(".datatable").DataTable({
        dom: 'Brtip',
        columnDefs: [
            { targets: 'no-order', orderable: false }
        ],
        buttons: dtTablesButtons()
    });

    // Remove Previous Buttons
    $(".tableTools-container").html('');
    // Append Datatables buttons into tableTools-container
    myTable.buttons().container().appendTo( $('.tableTools-container') );

    // Edit Button
    $(".action_edit").on('click', function() {
        let target = '<?php echo base_url('chapter/update') ?>/' + $(this).val();
        let form_edit = sendAjax(target);

        $(".form-action-panel .x_panel .x_content").html(form_edit);
    });

    // Delete Button
    $(".action_delete").on('click', function() {
        if(confirm('Delete')) {
            let target = '<?php echo base_url('chapter/delete') ?>/' + $(this).val();
            let response = sendAjax(target, null, '', true);
        } else {
            return false;
        }
    });
</script>