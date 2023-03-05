<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th><?php echo trans('sl'); ?></th>
                        <th><?php echo trans('title'); ?></th>
                        <th><?php echo trans('issue'); ?></th>
                        <th><?php echo trans('message'); ?></th>
                        <th><?php echo trans('report_date'); ?></th>
                        <th><?php echo trans('status'); ?></th>
                        <th><?php echo trans('option'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1;
                    foreach ($reports as $row) :
                    ?>
                        <tr id='row_<?php echo $row['report_id']; ?>'>
                            <td class="align-middle"><?php echo $sl++; ?></td>
                            <?php
                            $title  =   '';
                            $url    =   '';
                            if ($row['type'] == 'movie' || $row['type'] == 'tvseries') :
                                $title  = $this->common_model->get_title_by_videos_id($row['id']);
                                $title2 = $title . '(' . $row['type'] . ')';
                                if ($row['type'] == 'movie') :
                                    $url = base_url('admin/') . 'videos?title=' . $title;
                                else :
                                    $url = base_url('admin/') . 'tvseries?title=' . $title;
                                endif;
                            else :
                                $title = $this->live_tv_model->get_live_tv_title_by_id($row['id']);
                                $title2 = $title . '(' . $row['type'] . ')';
                                $url = base_url('admin/') . 'manage_live_tv/edit/' . $row['id'];
                            endif;
                            ?>
                            <td class="align-middle"><strong><a href="<?php echo $url; ?>"><?php echo $title2; ?></a></strong></td>
                            <td class="align-middle"><?php echo $row['issue']; ?></td>
                            <td class="align-middle"><?php echo $row['message']; ?></td>
                            <td class="align-middle"><?php echo $row['report_datetime']; ?></td>
                            <td class="align-middle"><?php echo $row['status']; ?></td>
                            <td class="align-middle">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/report_edit/' . $row['report_id']; ?>" id="menu" title="<?php echo trans('edit'); ?>">Edit</a></li>
                                        <li><a class="dropdown-item" href="#" title="<?php echo trans('delete'); ?>" onclick="delete_row(<?php echo " 'report' " . ',' . $row['report_id']; ?>)" class="delete">Delete</a></li>
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