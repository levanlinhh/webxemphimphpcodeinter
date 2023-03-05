<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th><?php echo trans('sl'); ?></th>
                        <th><?php echo trans('full_name'); ?></th>
                        <th><?php echo trans('email'); ?></th>
                        <th><?php echo trans('request_movie'); ?></th>
                        <th><?php echo trans('message'); ?></th>
                        <th><?php echo trans('request_date'); ?></th>
                        <th><?php echo trans('status'); ?></th>
                        <th><?php echo trans('option'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1;
                    foreach ($requests as $row) :
                    ?>
                        <tr id='row_<?php echo $row['request_id']; ?>'>
                            <td class="align-middle"><?php echo $sl++; ?></td>
                            <td class="align-middle"><strong><?php echo $row['name']; ?></strong></td>
                            <td class="align-middle"><?php echo $row['email']; ?></td>
                            <td class="align-middle"><?php echo $row['movie_name']; ?></td>
                            <td class="align-middle"><?php echo $row['message']; ?></td>
                            <td class="align-middle"><?php echo $row['request_datetime']; ?></td>
                            <td class="align-middle"><?php echo $row['status']; ?></td>
                            <td class="align-middle">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/request_edit/' . $row['request_id']; ?>" id="menu" title="<?php echo trans('edit'); ?>">Edit</a></li>
                                        <li><a class="dropdown-item" href="#" title="<?php echo trans('delete'); ?>" onclick="delete_row(<?php echo " 'request' " . ',' . $row['request_id']; ?>)" class="delete">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $links; ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/select2.min.js" type="text/javascript"></script>