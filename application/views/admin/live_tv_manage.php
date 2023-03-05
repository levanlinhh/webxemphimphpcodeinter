<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo base_url() . 'admin/manage_live_tv/new'; ?>" class="btn btn-primary waves-effect waves-light"><span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('add_live_tv'); ?></a>
            <?php if ($total_rows > 0) : ?>
                <br>
                <br>
                <table class="table table-bordered table-striped dataTable">
                    <thead>
                        <tr>
                            <th><?php echo trans('sl'); ?></th>
                            <th><?php echo trans('photo'); ?></th>
                            <th><?php echo trans('tv_name'); ?></th>
                            <th><?php echo trans('stream_url'); ?></th>
                            <th><?php echo trans('description'); ?></th>
                            <th><?php echo trans('category'); ?></th>
                            <th><?php echo trans('featured'); ?></th>
                            <th><?php echo trans('publish'); ?></th>
                            <th><?php echo trans('option'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl = 1;
                        foreach ($tvs as $tv) :
                        ?>
                            <tr id='row_<?php echo $tv['live_tv_id']; ?>'>
                                <td class="align-middle"><?php echo $sl++; ?></td>
                                <td class="align-middle" align="center">
                                    <img src="<?php echo $this->live_tv_model->get_tv_thumbnail($tv['thumbnail']); ?>" width="50">
                                </td>
                                <td class="align-middle"><strong><?php echo $tv['tv_name']; ?></strong></td>
                                <td class="align-middle">
                                    <?php
                                    echo mb_substr($tv['stream_url'], 0, 35) . '..';
                                    echo mb_substr($this->live_tv_model->get_live_tv_url($tv['live_tv_id'], 'sd'), 0, 35) . '..';
                                    echo mb_substr($this->live_tv_model->get_live_tv_url($tv['live_tv_id'], 'lq'), 0, 35) . '..';
                                    ?>
                                </td>
                                <td class="align-middle"><?php echo $tv['description']; ?></td>
                                <td class="align-middle"><?php echo $this->live_tv_model->get_live_tv_category($tv['live_tv_category_id']); ?></td>
                                <td class="align-middle">
                                    <div class="animated-checkbox checkbox-inline">
                                        <label>
                                            <input type="checkbox" readonly <?php if ($tv['featured'] == '1') {
                                                                                echo 'checked';
                                                                            } ?>><span class="label-text text-white"></span>
                                        </label>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="animated-checkbox checkbox-inline">
                                        <label>
                                            <input type="checkbox" readonly <?php if ($tv['publish'] == '1') {
                                                                                echo 'checked';
                                                                            } ?>><span class="label-text text-white"></span>
                                        </label>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-white btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a class="dropdown-item" target="_blank" href="<?php echo base_url() . 'live-tv/' . $tv['slug']; ?>"><?php echo trans('preview'); ?></a></li>
                                            <li><a class="dropdown-item" href="<?php echo base_url() . 'admin/manage_live_tv/edit/' . $tv['live_tv_id']; ?>"><?php echo trans('edit'); ?></a></li>
                                            <li><a class="dropdown-item" title="<?php echo trans('delete'); ?>" href="#" onclick="delete_row(<?php echo " 'live_tv' " . ',' . $tv['live_tv_id']; ?>)" class="delete"><?php echo trans('delete'); ?></a> </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="h3 text-center text-white py-3"><?php echo trans('no_tv_found'); ?></div>
            <?php endif; ?>
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
<script src="<?php echo base_url() ?>assets/js/plugins/summernote-bs4.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-tagsinput.min.js"></script>