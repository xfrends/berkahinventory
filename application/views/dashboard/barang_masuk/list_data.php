<table class="datatable table">
    <thead>
        <tr>
            <th class="no-order" width="40px">#</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Supllier</th>
            <th>Keterangan</th>
            <th>Category </th>
            <th>Merk </th>
            <th>Create at</th>
            <th>Update at</th>
            <th class="text-center no-order" width="100px"><?php echo lang('Action') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (@$records as $ir => $r): ?>
    
        <tr>
            <td><?php echo $ir+1 ?></td>
            <td><?php echo $r->kode_barang ?></td>
            <td><?php echo $r->nama_barang ?></td>
            <td><?php echo $r->jumlah ?></td>
            <td><?php echo $r->supplier ?></td>
            <td><?php echo $r->keterangan_barang ?></td>
            <td><?php echo $r->category_name ?></td>
            <td><?php echo $r->nama_merk ?></td>
            <td><?php echo $r->barang_masuk_created ?></td>
            <td><?php echo $r->barang_masuk_updated_at ?></td>
            <td width="150px" class="text-center">
                <div class="btn-group">
                    <button class="btn btn-sm btn-success action_edit" value="<?php echo $r->m_id ?>"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger action_delete" value="<?php echo $r->m_id ?>"><i class="fas fa-trash"></i></button>
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
        let target = '<?php echo base_url('barang/update_barang_masuk') ?>/' + $(this).val();
        let form_edit = sendAjax(target);

        $(".form-action-panel .x_panel .x_content").html(form_edit);
    });

    // Delete Button
    $(".action_delete").on('click', function() {
        if(confirm('<?php echo lang('ConfirmActionDelete') ?>')) {
            let target = '<?php echo base_url('barang/delete_barang_masuk') ?>/' + $(this).val();
            let response = sendAjax(target, null, '', true);
        } else {
            return false;
        }
    });
</script>