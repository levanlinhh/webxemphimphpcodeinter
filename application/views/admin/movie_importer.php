<div class="card">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo trans('movie_importer') ?></h3>
                </div>
                <?php echo form_open(base_url() . 'admin/movie_importer/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>
                <div class="panel-body">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="input-group" style="margin-top: 50px;margin-bottom: 10px;">
                            <select id="type" name="type" class="form-control" style="max-width: 220px;">
                                <option value="movies_by_title" <?php if (isset($type) && $type == 'movies_by_title') : echo "selected";
                                                                endif; ?>>Phim lẻ theo tên</option>
                                <option value="movies_by_year" <?php if (isset($type) && $type == 'movies_by_year') : echo "selected";
                                                                endif; ?>>Phim lẻ theo năm</option>
                                <option value="popular_movies" <?php if (isset($type) && $type == 'popular_movies') : echo "selected";
                                                                endif; ?>>Phim lẻ phổ biến</option>
                                <option value="top_rated_movies" <?php if (isset($type) && $type == 'top_rated_movies') : echo "selected";
                                                                    endif; ?>>Phim lẻ đánh giá cao</option>
                                <option value="upcoming_movies" <?php if (isset($type) && $type == 'upcoming_movies') : echo "selected";
                                                                endif; ?>>Phim lẻ sắp ra mắt</option>
                                <option value="tvshows_by_title" <?php if (isset($type) && $type == 'tvshows_by_title') : echo "selected";
                                                                    endif; ?>>Phim bộ theo tên</option>
                                <option value="tvshows_by_year" <?php if (isset($type) && $type == 'tvshows_by_year') : echo "selected";
                                                                endif; ?>>Phim bộ theo năm</option>
                                <option value="popular_tvshows" <?php if (isset($type) && $type == 'popular_tvshows') : echo "selected";
                                                                endif; ?>>Phim bộ phổ biến</option>
                                <option value="top_rated_tvshows" <?php if (isset($type) && $type == 'top_rated_tvshows') : echo "selected";
                                                                    endif; ?>>Phim bộ đánh giá cao</option>
                                <option value="upcoming_tvshows" <?php if (isset($type) && $type == 'upcoming_tvshows') : echo "selected";
                                                                    endif; ?>>Phim bộ đang chiếu</option>
                            </select>
                            <input style="display: <?php if (isset($type) && $type != "movies_by_title" && $type != "tvshows_by_title") : echo "none";
                                                    else : echo "block";
                                                    endif; ?>;" type="text" class="form-control" id="additional-field-title" name="title" value="<?php if (isset($title) && $title != '') : echo $title;
                                                                                                                                                    endif; ?>" placeholder="<?php echo trans('enter_movie_tvshow_title_here') ?>" <?php if (isset($type) && $type != "movies_by_title") : echo "";
                                                                                                                                                                                                                                    else : echo "required";
                                                                                                                                                                                                                                    endif; ?>>
                            <input style="display: <?php if (isset($type) && ($type == "movies_by_year" || $type == "tvshows_by_year")) : echo "block";
                                                    else : echo "none";
                                                    endif; ?>;" type="number" class="form-control" id="additional-field-year" name="year" value="<?php if (isset($year) && $year != '') : echo $year;
                                                                                                                                                    endif; ?>" placeholder="Ex: 2020" <?php if (isset($type) && ($type == "movies_by_year" || $type == "tvshows_by_year")) : echo "required";
                                                                                                                                                                                        endif; ?>>

                            <input style="display: <?php if (isset($type) && ($type == "movies_by_year" || $type == "tvshow_by_year" || $type == "popular_movies" || $type == "popular_tvshows" || $type == "top_rated_movies" || $type == "top_rated_tvshows" || $type == "upcoming_movies" || $type == "upcoming_tvshows")) : echo "block";
                                                    else : echo "none";
                                                    endif; ?>;" type="number" class="form-control" id="additional-field-page" name="page" value="<?php if (isset($page) && $page != '') : echo $page;
                                                                                                                                                    endif; ?>" placeholder="Page no. Ex: 5 (optional)">
                            <div class="input-group-append" id="button-area">
                                <button type="submit" class="btn btn-primary" id="import_btn" type="button" id="button-addon2"><?php echo trans('fetch') ?></button>
                            </div>
                        </div>
                        <?php if (isset($error_message) && $error_message != '') : ?>
                            <div class="alert alert-dismissible alert-danger">
                                <button class="close" type="button" data-dismiss="alert">×</button><strong><?php echo trans('sorry') ?>!</strong><?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ((strpos(film_config('tmbd_api_key'), 'xxx') !== false) || empty(film_config('tmbd_api_key'))) : ?>
                            <div class="alert alert-dismissible alert-warning">
                                <div class="text-dark"><?php echo trans('tmdb_not_configure') ?> <a href="<?php echo base_url('admin/tmdb_setting/') ?>"><?php echo trans('here') ?></a>.</div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php echo form_close(); ?>
                    <div id="result"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("select#type").on("change", function() {
        var select_type = $("select#type option:selected").val();
        if (select_type == "movies_by_title" || select_type == "tvshows_by_title") {
            // hide field
            $("#additional-field-title").css("display", "block");
            $("#additional-field-page").css("display", "none");
            $("#additional-field-year").css("display", "none");
            // required flase
            $("#additional-field-title").prop('required', true);
            $("#additional-field-page").prop('required', false);
            $("#additional-field-year").prop('required', false);
        } else if (select_type == "popular_movies" || select_type == "popular_tvshows" || select_type == "top_rated_movies" || select_type == "top_rated_tvshows" || select_type == "upcoming_movies" || select_type == "upcoming_tvshows") {
            // hide field
            $("#additional-field-title").css("display", "none");
            $("#additional-field-page").css("display", "block");
            $("#additional-field-year").css("display", "none");
            // required flase
            $("#additional-field-title").prop('required', false);
            $("#additional-field-page").prop('required', false);
            $("#additional-field-year").prop('required', false);
        } else if (select_type == "movies_by_year" || select_type == "tvshows_by_year") {
            // hide field
            $("#additional-field-title").css("display", "none");
            $("#additional-field-page").css("display", "block");
            $("#additional-field-year").css("display", "block");
            // required flase
            $("#additional-field-title").prop('required', false);
            $("#additional-field-page").prop('required', false);
            $("#additional-field-year").prop('required', true);
        }
    });
</script>
<br>
<?php if (isset($movies)) : ?>
    <div class="card">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-border panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo trans('search_result') ?></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped" id="datatablessd">
                            <thead>
                                <tr>
                                    <th><?php echo trans('sl'); ?></th>
                                    <th><?php echo trans('thumbnail') ?></th>
                                    <th><?php echo trans('title') ?></th>
                                    <th><?php echo trans('description') ?></th>
                                    <th><?php echo trans('action') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($movies) > 0) :
                                    $sl = 1;
                                    $i = 0;
                                    foreach ($movies as $videos) :
                                        $data = json_decode($movies[$i], true);
                                        $i++;
                                ?>
                                        <tr id='row_2'>
                                            <td class="align-middle"><?php echo $sl++; ?></td>
                                            <td class="align-middle" align="center" style="width:7%">
                                                <?php if (!empty($data['poster_path']) && $data['poster_path'] != '' && $data['poster_path'] != NULL) : ?>
                                                    <img src="<?php echo "https://image.tmdb.org/t/p/w185/" . $data['poster_path']; ?>" class="img-fluid" width="50">
                                                <?php else : ?>
                                                    <img src="<?php echo base_url() . 'uploads/default_image/thumbnail.jpg'; ?>" class="img-fluid" width="50">
                                                <?php endif; ?>
                                            </td>
                                            <td class="align-middle" style="width:20%"><strong><?php if ($content_type == 'tvshow') : echo $data['name'];
                                                                                                else : echo $data['title'];
                                                                                                endif; ?></strong></td>
                                            <td class="align-middle description"><?php echo $data['overview']; ?></td>
                                            <td class="align-middle" style="width:8%">
                                                <div id="<?php echo 'div_' . $data['id']; ?>"><a class="btn btn btn-outline-primary" href="javascript:void(0);" id="<?php echo 'btn_' . $data['id']; ?>" onclick="import_movie(<?php echo $data['id']; ?>)"><?php echo trans('import') ?></a>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                else :
                                    ?>
                                    <tr>
                                        <td><strong><?php echo trans('no_result_found') ?></strong></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ajax import -->
    <script type="text/javascript">
        function import_movie(tmdb_id) {
            var base_url = '<?php echo base_url(); ?>'
            url = base_url + 'admin/complete_import/'
            var to = '<?php if ($content_type == 'tvshow') : echo "tv";
                        else : echo 'movie';
                        endif; ?>'
            swal({
                    title: 'Are you sure?',
                    text: "Click import button to start.\nNote: Actors photo will import by cron.",
                    icon: "warning",
                    buttons: true,
                    buttons: {
                        cancel: {
                            text: "Cancel",
                            value: false,
                            visible: true,
                            className: "btn-white",
                            closeModal: true,
                        },
                        confirm: {
                            text: "Import",
                            value: true,
                            visible: true,
                            className: "",
                            closeModal: false
                        }
                    },
                    dangerMode: false,
                    closeOnClickOutside: false
                })
                .then(function(confirmed) {
                    if (confirmed) {
                        $.ajax({
                                url: url,
                                type: 'POST',
                                data: 'tmdb_id=' + tmdb_id + '&to=' + to,
                                dataType: 'json'
                            })
                            .done(function(response) {
                                swal.stopLoading();
                                swal("Done!", "Imported Successfully", "success");
                                $("#div_" + tmdb_id).html('<button class="btn btn-primary" type="button" disabled="">Imported</button>');
                            })
                            .fail(function(response) {
                                swal('Oops...', 'Something went wrong with ajax !', 'error');
                                $("#div_" + tmdb_id).html('<a class="btn btn btn-outline-primary" href="javascript:void(0);" id="btn_' + tmdb_id + '" onclick="import_movie(' + tmdb_id + ')">Try Again</a>');
                            })
                    } else {
                        $("#div_" + tmdb_id).html('<a class="btn btn btn-outline-primary" href="javascript:void(0);" id="btn_' + tmdb_id + '" onclick="import_movie(' + tmdb_id + ')">Import</a>');
                    }
                })
        }
    </script>
    <!-- END Ajax import -->
<?php endif; ?>