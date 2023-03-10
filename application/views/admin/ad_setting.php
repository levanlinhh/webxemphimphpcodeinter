<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo trans('sl'); ?></th>
                        <th> <?php echo trans('ads_name'); ?></th>
                        <th><?php echo trans('unique_name'); ?></th>
                        <th><?php echo trans('type'); ?></th>
                        <th><?php echo trans('ads_size'); ?></th>
                        <th><?php echo trans('status'); ?></th>
                        <th><?php echo trans('option'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ads = $this->common_model->get_all_ads();
                    $sl = 1;
                    foreach ($ads as $ad) :
                    ?>
                        <tr id='row_<?php echo $ad['ads_id']; ?>'>
                            <td class="align-middle"><?php echo $sl++; ?></td>
                            <td class="align-middle"><strong><?php echo $ad['ads_name']; ?></strong></td>
                            <td class="align-middle"><?php echo $ad['unique_name']; ?></td>
                            <td class="align-middle"><?php echo $ad['ads_type']; ?></td>
                            <td class="align-middle"><?php echo $ad['ads_size']; ?></td>
                            <td class="align-middle"><?php if ($ad['enable'] == '1') {
                                                            echo trans('enable');
                                                        } else {
                                                            echo trans('disable');
                                                        } ?></td>
                            <td class="align-middle">
                                <a href="<?php echo base_url() . 'admin/ad_setting/edit/' . $ad['ads_id']; ?>" class="btn btn-icon"><i class="fa fa-edit"></i></a>
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
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/select2.min.js" type="text/javascript"></script>