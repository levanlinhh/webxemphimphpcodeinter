<div id="title-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h1 class="text-uppercase"><?php echo trans('focus_keyword'); ?>: <?php echo $tags_name; ?></h1>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url(); ?>"><i class="fi ion-ios-home"></i><?php echo trans('site_title'); ?></a>
                    </li>
                    <li class="active"><?php echo $tags_name; ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="section-opt">
    <div class="container">
        <div class="row">
            <?php if ($total_rows > 0) : ?>
                <div class="col-md-12 col-sm-12">
                    <div class="latest-movie movie-opt">
                        <div class="row clean-preset">
                            <div class="movie-container">
                                <?php foreach ($all_published_videos as $videos) : ?>
                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <?php include('thumbnail.php'); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : echo "<h3 class='text-center text-uppercase'>No movie found by tag:  " . $tags_name . "</h3>";
            endif; ?>
        </div>
        <?php if ($total_rows > 24) : echo $links;
        endif; ?>
    </div>
</div>