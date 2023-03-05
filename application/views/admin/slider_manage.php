<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <button data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/slider_add'; ?>" id="menu" class="btn btn-primary waves-effect waves-light"><span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('add_slider') ?></button>
            <br>
            <br>
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th><?php echo trans('sl'); ?></th>
                        <th><?php echo trans('title'); ?></th>
                        <th><?php echo trans('description'); ?></th>
                        <th><?php echo trans('order') ?></th>
                        <th><?php echo trans('action'); ?></th>
                        <th>Button text</th>
                        <th><?php echo trans('status'); ?></th>
                        <th><?php echo trans('option'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1;
                    foreach ($sliders as $slider) : ?>
                        <tr id='row_<?php echo $slider['slider_id']; ?>'>
                            <td class="align-middle"><?php echo $sl++; ?></td>
                            <td class="align-middle"><strong><?php echo $slider['title']; ?></strong></td>
                            <td class="align-middle"><?php echo $slider['description']; ?></td>
                            <td class="align-middle"><?php echo $slider['order']; ?></td>
                            <td class="align-middle">
                                <?php
                                if ($slider['action_type'] == 'movie') :
                                    echo "Movie: " . $this->common_model->get_title_by_videos_id($slider['action_id']);
                                elseif ($slider['action_type'] == 'tvseries') :
                                    echo "TVSeries: " . $this->common_model->get_title_by_videos_id($slider['action_id']);
                                elseif ($slider['action_type'] == 'tv') :
                                    echo "TV Channel: " . $this->live_tv_model->get_live_tv_title_by_id($slider['action_id']);
                                elseif ($slider['action_type'] == 'external_browser') :
                                    echo "External URL: " . $slider['action_url'];
                                elseif ($slider['action_type'] == 'webview') :
                                    echo "WebView URL: " . $slider['action_url'];
                                endif;
                                ?>

                            </td>
                            <td class="align-middle"><?php echo $slider['action_btn_text']; ?></td>
                            <td class="align-middle">
                                <?php if ($slider['publication'] == '1') { ?>
                                    <span class="label label-primary label-xs"><?php echo trans('published'); ?></span>
                                <?php } else { ?>
                                    <span class="label label-warning label-mini"><?php echo trans('unpublished'); ?></span>
                                <?php } ?>
                            </td>
                            <td class="align-middle">
                                <a data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/slider_edit/' . $slider['slider_id']; ?>" id="menu" class="btn btn-icon"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-icon" onclick="delete_row(<?php echo " 'slider' " . ',' . $slider['slider_id']; ?>)"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>