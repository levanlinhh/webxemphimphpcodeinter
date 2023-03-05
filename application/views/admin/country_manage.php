<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <button data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/country_add'; ?>" id="menu" class="btn btn-primary waves-effect waves-light"><span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('add_country'); ?></button>
            <br>
            <br>
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th><?php echo trans('sl'); ?></th>
                        <th><?php echo trans('name'); ?></th>
                        <th><?php echo trans('icon'); ?></th>
                        <th><?php echo trans('slug'); ?></th>
                        <th><?php echo trans('description'); ?></th>
                        <th><?php echo trans('status'); ?></th>
                        <th><?php echo trans('option'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1;
                    foreach ($countries as $country) : ?>
                        <tr id='row_<?php echo $country['country_id']; ?>'>
                            <td class="align-middle"><?php echo $sl++; ?></td>
                            <td class="align-middle"><strong><?php echo $country['name']; ?></strong></td>
                            <td class="align-middle" align="center"><img width="30" src="<?php echo $this->common_model->get_country_image_url($country['country_id']); ?>"></>
                            <td class="align-middle"><?php echo $country['slug']; ?></td>
                            <td class="align-middle"><?php echo $country['description']; ?></td>
                            <td class="align-middle">
                                <?php if ($country['publication'] == '1') { ?>
                                    <span class="label label-primary label-xs"><?php echo trans('published'); ?></span>
                                <?php } else { ?>
                                    <span class="label label-warning label-mini"><?php echo trans('unpublished'); ?></span>
                                <?php } ?>
                            </td>
                            <td class="align-middle">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/country_edit/' . $country['country_id']; ?>" id="menu"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger" onclick="delete_row(<?php echo " 'country' " . ',' . $country['country_id']; ?>)"><i class="fa fa-remove"></i></a>
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