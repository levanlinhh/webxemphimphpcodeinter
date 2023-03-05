<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <button data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/star_add'; ?>" id="menu" class="btn btn-primary waves-effect waves-light"><span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('add_star'); ?></button>
            <button data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/star_add_tmdb'; ?>" id="menu" class="btn btn-primary waves-effect waves-light"><span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('fetch_from_TMDB'); ?></button>
            <br>
            <br>
            <?php if ($total_rows > 0) : ?>
                <table class="table table-bordered table-striped dataTable">
                    <thead>
                        <tr>
                            <th><?php echo trans('sl'); ?></th>
                            <th><?php echo trans('photo'); ?></th>
                            <th><?php echo trans('star_name'); ?></th>
                            <th><?php echo trans('star_type'); ?></th>
                            <th><?php echo trans('star_bio'); ?></th>
                            <th><?php echo trans('option'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sl = 1;
                        foreach ($stars as $star) :
                        ?>
                            <tr id='row_<?php echo $star['star_id']; ?>'>
                                <td class="align-middle"><?php echo $sl++; ?></td>
                                <td class="align-middle" align="center">
                                    <img src="<?php echo $this->common_model->get_img('star', $star['star_id']); ?>" class="" width="60" alt="<?php echo $star['star_name']; ?>_photo">
                                </td>
                                <td class="align-middle"><strong><?php echo $star['star_name']; ?></strong></td>
                                <td class="align-middle"><?php echo $star['star_type']; ?></td>
                                <td class="align-middle"><?php echo $star['star_desc']; ?></td>
                                <td class="align-middle">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/star_edit/' . $star['star_id']; ?>" id="menu"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger" onclick="delete_row(<?php echo " 'star' " . ',' . $star['star_id']; ?>)"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <h3 class="text-white"><?php echo trans('no_star_found'); ?></h3>
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