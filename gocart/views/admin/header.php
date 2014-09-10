<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Go Cart<?php echo (isset($page_title))?' :: '.$page_title:''; ?></title>

<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/sb-admin.css');?>" rel="stylesheet" type="text/css" />
<!-- Custom Fonts -->
<link href="<?php echo base_url('assets/font-awesome-4.1.0/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
<link type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('assets/css/redactor.css');?>" rel="stylesheet" />

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.0.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/redactor.min.js');?>"></script>

<!--<script src="<?php echo base_url('assets/js//plugins/morris/raphael.min.js');?>"></script>
<script src="<?php echo base_url('assets/js//plugins/morris/morris.min.js');?>"></script>
<script src="<?php echo base_url('assets/js//plugins/morris/morris-data.js');?>"></script>-->

<?php if($this->auth->is_logged_in(false, false)):?>
    
<style type="text/css">
    body {
        margin-top:50px;
    }
    
    @media (max-width: 979px){ 
        body {
            margin-top:0px;
        }
    }
    @media (min-width: 980px) {
        .nav-collapse.collapse {
            height: auto !important;
            overflow: visible !important;
        }
     }
    
    .nav-tabs li a {
        text-transform:uppercase;
        background-color:#f2f2f2;
        border-bottom:1px solid #ddd;
        text-shadow: 0px 1px 0px #fff;
        filter: dropshadow(color=#fff, offx=0, offy=1);
        font-size:12px;
        padding:5px 8px;
    }
    
    .nav-tabs li a:hover {
        border:1px solid #ddd;
        text-shadow: 0px 1px 0px #fff;
        filter: dropshadow(color=#fff, offx=0, offy=1);
    }

</style>
<script type="text/javascript">
$(document).ready(function(){
    $('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
    
    $('.redactor').redactor({
            minHeight: 200,
            imageUpload: '<?php echo site_url(config_item('admin_folder').'/wysiwyg/upload_image');?>',
            fileUpload: '<?php echo site_url(config_item('admin_folder').'/wysiwyg/upload_file');?>',
            imageGetJson: '<?php echo site_url(config_item('admin_folder').'/wysiwyg/get_images');?>',
            imageUploadErrorCallback: function(json)
            {
                alert(json.error);
            },
            fileUploadErrorCallback: function(json)
            {
                alert(json.error);
            }
      });
});
</script>
<?php endif;?>
</head>
<body>
<div id="wrapper">
<div class="row">
        <div class="col-lg-12">
            <?php
            //lets have the flashdata overright "$message" if it exists
            if($this->session->flashdata('message'))
            {
                $message    = $this->session->flashdata('message');
            }
            
            if($this->session->flashdata('error'))
            {
                $error  = $this->session->flashdata('error');
            }
            
            if(function_exists('validation_errors') && validation_errors() != '')
            {
                $error  = validation_errors();
            }
            ?>
            
            <div id="js_error_container" class="alert alert-error" style="display:none;"> 
                <p id="js_error"></p>
            </div>
            
            <div id="js_note_container" class="alert alert-note" style="display:none;">
                
            </div>
            
            <?php if (!empty($message)): ?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">×</a>
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
        
            <?php if (!empty($error)): ?>
                <div class="alert alert-error">
                    <a class="close" data-dismiss="alert">×</a>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
<?php if($this->auth->is_logged_in(false, false)):?>
<?php $admin_url = site_url($this->config->item('admin_folder')).'/';?>
<?php $ci = &get_instance();
      $admin = $ci->session->userdata('admin'); ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">HediyeDedektifi Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="javascript:;">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="javascript:;">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="javascript:;">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="javascript:;">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="javascript:;">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="javascript:;">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="javascript:;">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="javascript:;">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="javascript:;">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="javascript:;">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:;">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $admin["username"]; ?> <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="javascript:;"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo site_url($this->config->item('admin_folder').'/login/logout');?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="">
                            <a href="<?php echo $admin_url;?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#common_sales"><i class="fa fa-fw fa-arrows-v"></i><?php echo lang('common_sales') ?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="common_sales" class="collapse">
                            <li><a href="<?php echo $admin_url;?>orders"><?php echo lang('common_orders') ?></a></li>
                            <?php if($this->auth->check_access('Admin')) : ?>
                            <li><a href="<?php echo $admin_url;?>customers"><?php echo lang('common_customers') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>customers/groups"><?php echo lang('common_groups') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>reports"><?php echo lang('common_reports') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>coupons"><?php echo lang('common_coupons') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>giftcards"><?php echo lang('common_giftcards') ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php
                    // Restrict access to Admins only
                    if($this->auth->check_access('Admin')) : ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#common_catalog"><i class="fa fa-fw fa-arrows-v"></i><?php echo lang('common_catalog') ?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="common_catalog" class="collapse">
                            <li><a href="<?php echo $admin_url;?>categories"><?php echo lang('common_categories') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>products"><?php echo lang('common_products') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>digital_products"><?php echo lang('common_digital_products') ?></a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#common_content"><i class="fa fa-fw fa-arrows-v"></i><?php echo lang('common_content') ?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="common_content" class="collapse">
                            <li><a href="<?php echo $admin_url;?>banners"><?php echo lang('common_banners') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>pages"><?php echo lang('common_pages') ?></a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#common_administrative"><i class="fa fa-fw fa-arrows-v"></i><?php echo lang('common_administrative') ?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="common_administrative" class="collapse">
                            <li><a href="<?php echo $admin_url;?>settings"><?php echo lang('common_gocart_configuration') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>shipping"><?php echo lang('common_shipping_modules') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>payment"><?php echo lang('common_payment_modules') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>settings/canned_messages"><?php echo lang('common_canned_messages') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>locations"><?php echo lang('common_locations') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>admin"><?php echo lang('common_administrators') ?></a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#common_actions"><i class="fa fa-fw fa-arrows-v"></i><?php echo lang('common_actions');?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="common_actions" class="collapse">
                            <li><a href="<?php echo site_url($this->config->item('admin_folder').'/dashboard');?>"><?php echo lang('common_dashboard') ?></a></li>
                            <li><a href="<?php echo site_url();?>"><?php echo lang('common_front_end') ?></a></li>
                            <li><a href="<?php echo site_url($this->config->item('admin_folder').'/login/logout');?>"><?php echo lang('common_log_out') ?></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<?php endif;?>

<div id="page-wrapper">
	<div class="container-fluid">
    <?php if(!empty($page_title)):?>
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo  $page_title; ?></h1>
    </div></div>
    <?php endif;?>
    
    