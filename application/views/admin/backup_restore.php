<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo trans('create_backup'); ?></h3>
                </div>
                <div class="panel-body">
                    <br>
                    <div class="col-sm-offset-3 mt-2"> <a href="<?php echo base_url() . 'admin/backup_restore/create' ?>" class="btn btn-primary"><span class="btn-label mr-1"> <i class="fa fa-download"></i></span><?php echo trans('create_now'); ?></a> <br>
                        <br>
                    </div>
                    <table class="table table-bordered table-striped dataTable" id="servertable">
                        <thead>
                            <tr>
                                <th><?php echo trans('sl'); ?></th>
                                <th><?php echo trans('file_name'); ?></th>
                                <th><?php echo trans('file_size'); ?></th>
                                <th><?php echo trans('created'); ?></th>
                                <th><?php echo trans('option'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $files = directory_map('./db_backup/');
                            asort($files);
                            $sl = 0;
                            foreach ($files as $file) :
                                $sl++;
                                if (is_string($file) && pathinfo($file, PATHINFO_EXTENSION) === 'sql') :
                            ?>
                                    <tr>
                                        <td class="align-middle"><?php echo $sl; ?></td>
                                        <td class="align-middle"><?php echo $file; ?></td>
                                        <td class="align-middle"><?php echo $this->common_model->formatSizeUnits(filesize('./db_backup/' . $file)); ?>
                                        </td>
                                        <td class="align-middle"><?php echo date("d/m/Y H:i:s", filemtime('./db_backup/' . $file)); ?></td>
                                        <td class="align-middle">
                                            <a href="<?php echo base_url() . 'admin/backup_restore/download/' . $file ?>" class="btn btn-primary mr-1"><span class="btn-label"> <i class="fa fa-download"></i></span></a>
                                            <a href="<?php echo base_url() . 'admin/backup_restore/delete/' . $file ?>" class="btn btn-danger"><span class="btn-label"> <i class="fa fa-close"></i></span></a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>