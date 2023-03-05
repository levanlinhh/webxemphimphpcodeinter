<?php
    $system_name              =   film_config('system_name');
    $system_short_name        =   film_config('system_short_name');
    $site_name                =   film_config('site_name');
    $business_address         =   film_config('business_address');
    $system_email             =   film_config('system_email');
    $business_phone           =   film_config('business_phone');
    $active_theme             =   film_config('active_theme');
    $color                    =   $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->row()->theme_color;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="DUYPLUS">
    <meta name="copyright" content="Copyright (c) 2022 PHIMFLC">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/plugins/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css?v=<?php echo uniqid(); ?>">
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap-tagsinput.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>assets/css/plugins/summernote-bs4.min.css" rel="stylesheet" />
    <!--Jquery JS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    <title><?php echo $page_title . ' - ' . $system_short_name; ?></title>
    <style type="text/css">.page-number a{position:relative;display:block;padding:.5rem .75rem;margin-left:-1px;line-height:1.25;color:#6772e5;background-color:#FFF;border:1px solid #dee2e6}</style>
</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header hidden-print"><a class="app-header__logo" href="<?php echo base_url(); ?>admin">
            <img src="<?php echo base_url(); ?>assets/images/logo.png" height="45"></a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- visit website -->
            <li><a class="app-nav__item" href="<?php echo base_url(); ?>" target="_blank"><?php echo trans('visit_website'); ?></a></li>
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-cogs"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/manage_profile"><i class="fa fa-user fa-lg"></i> <?php echo trans('profile'); ?></a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>login/logout"><i class="fa fa-cog"></i> <?php echo trans('logout'); ?></a></li>
                </ul>
            </li>
        </ul>
    </header>
    <?php include 'navigation.php'; ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><?php echo $page_title; ?></h1>
            </div>
        </div>
        <?php if($page_name == 'theme_options'):?>
            <?php $this->load->view('theme/'.$active_theme .'/'.$page_name);?>
        <?php else: ?>
            <?php include $page_name . '.php'; ?>
        <?php endif; ?>
    </main>
    <footer></footer>
    <!-- ajax modal  -->

    <div id="mymodal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content p-0 b-0">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="panel-title text-light p-3 m-0"><?php echo $page_title; ?></h3>
                    </div>
                    <div class="modal-body">
                        <div id="modal-loader" style="display: none; text-align: center;"> <img src="<?php echo base_url(); ?>assets/images/preloader.gif" /> </div>

                        <!-- content will be load here -->
                        <div id="dynamic-content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '#menu', function(e) {
                e.preventDefault();
                var url = $(this).data('id'); // it will get action url
                $('#dynamic-content').html(''); // leave it blank before ajax call
                $('#modal-loader').show(); // load ajax loader
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'html'
                })
                .done(function(data) {
                    $('#dynamic-content').html('');
                    $('#dynamic-content').html(data); // load response 
                    $('#modal-loader').hide(); // hide ajax loader 
                })
                .fail(function() {
                    $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                    $('#modal-loader').hide();
                });
            });
        });
    </script>
    <!-- END Ajax modal  -->

    <!-- Ajax Delete -->
    <script type="text/javascript">
        function delete_row2(table_name, row_id) {
            var table_row = '#row_' + row_id
            var base_url = '<?php echo base_url(); ?>'
            url = base_url + 'admin/delete_record/'
            swal({
                title: "Are you Sure??",
                text: "it will be delete permanently",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3CB371',
                cancelButtonText: "Cancel",
                confirmButtonText: "yes! Delete it.",
                showLoaderOnConfirm: true,
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                            url: url,
                            type: 'POST',
                            data: 'row_id=' + row_id + '&table_name=' + table_name,
                            dataType: 'json'
                        })
                        .done(function(response) {
                            swal("Deleted", response.message, response.status);
                            $(table_row).fadeOut(2000);
                        })
                        .fail(function() {
                            swal('Oops...', response.message, response.status);
                        });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        }
    </script>
    <script type="text/javascript">
        function delete_row(table_name, row_id) {
            var table_row = '#row_' + row_id
            var base_url = '<?php echo base_url(); ?>'
            url = base_url + 'admin/delete_record/'
            swal({
                title: 'Are you sure?',
                text: "It will be deleted permanently!",
                icon: "warning",
                buttons: true,
                buttons: ["Cancel", "Delete"],
                dangerMode: true,
                closeOnClickOutside: false
            })
            .then(function(confirmed) {
                if (confirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: 'row_id=' + row_id + '&table_name=' + table_name,
                        dataType: 'json'
                    })
                    .done(function(response) {
                        swal.stopLoading();
                        swal("Deleted!", response.message, response.status);
                        $(table_row).fadeOut(2000);
                    })
                    .fail(function() {
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                    })
                }
            })
        }
    </script>
    <!-- END Ajax Delete -->

    <!-- Javascripts -->
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var success_message = '<?php echo $this->session->flashdata('success'); ?>';
            var error_message = '<?php echo $this->session->flashdata('error'); ?>';
            if (success_message != '') {
                swal('Thông công!', success_message, 'success');
            }
            if (error_message != '') {
                swal('Lỗi!', error_message, 'error');
            }
        });
        $('#datatable').DataTable();
    </script>
</body>

</html>