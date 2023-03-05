<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-5">
                    <button data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/user_add'; ?>" id="menu" class="btn btn-primary waves-effect waves-light"><span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('add_user'); ?></button> <br>
                    <br>
                </div>
                <div class="col-lg-4 offset-lg-3">
                    <form method="get" action="<?php echo base_url('admin/manage_user') ?>">
                        <div class="input-group">
                            <input type="text" name="name" value="<?php if (isset($name)) {
                                                                        echo $name;
                                                                    } ?>" class="form-control" id="title" placeholder="User Name">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><?php echo trans("search"); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th><?php echo trans('sl'); ?></th>
                        <th><?php echo trans('full_name'); ?></th>
                        <th><?php echo trans('email'); ?></th>
                        <th><?php echo trans('role'); ?></th>
                        <th><?php echo trans('last_login'); ?></th>
                        <th><?php echo trans('option'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1;
                    foreach ($users as $user) :
                    ?>
                        <tr id='row_<?php echo $user['user_id']; ?>'>
                            <td class="align-middle"><?php echo $sl++; ?></td>
                            <td class="align-middle"><strong><?php echo $user['name']; ?></strong></td>
                            <td class="align-middle"><?php echo $user['email']; ?></td>
                            <td class="align-middle"><?php echo $user['role']; ?></td>
                            <td class="align-middle"><?php echo date("H:i, d-m-Y", strtotime($user['last_login'])); ?></td>
                            <td class="align-middle">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/user_edit/' . $user['user_id']; ?>" id="menu"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger" onclick="delete_row(<?php echo " 'user' " . ',' . $user['user_id']; ?>)"><i class="fa fa-remove"></i></a>
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