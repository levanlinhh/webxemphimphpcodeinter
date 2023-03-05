<?php
$slider_type    =   film_config('slider_type');
if ($slider_type == 'cubik') :
    include('cubik_slider.php');
elseif ($slider_type == "movie" || $slider_type == "image" || $slider_type == "tv") :
    include('main_slider.php');
endif;
