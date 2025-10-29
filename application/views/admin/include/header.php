<!DOCTYPE html>
<html lang="en" dir="<?php echo text_dir(); ?>">
<head>
  <?php $settings = get_settings(); ?>
  <?php $user = get_logged_user($this->session->userdata('id')); ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="Codericks">
  <link rel="icon" href="<?php echo base_url($settings->favicon) ?>">
  
  <title><?php echo html_escape($settings->site_name); ?> &bull; <?php if(isset($this->chamber->name)){echo html_escape($this->chamber->name).' &bull;';} ?> <?php if(isset($page_title)){echo html_escape($page_title);}else{echo "Dashboard";} ?></title>


  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/line-icons/lineicons.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/admin_default.css?var=<?= settings()->version ?>&time=<?=time();?>">
  <!-- Google Font: DM Sans -->
  <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,400i,700" rel="stylesheet">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- sweet alert -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/sweet-alert.css">
  <!-- tags inputs -->
  <link href="<?php echo base_url() ?>assets/admin/css/bootstrap-tagsinput.css" rel="stylesheet" />
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/select2/css/select2.min.css">
  <!-- nice-select -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/nice-select.css">
  <!-- date & time picker -->
  <link href="<?php echo base_url() ?>assets/admin/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/admin/css/timepicker.min.css" rel="stylesheet">
  <!-- css animation -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/aos.css">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/fullcalendar-main.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/summernote/summernote-bs4.min.css">

  <?php if (text_dir() == 'rtl'): ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/custom-rtl.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/bootstrap-rtl.min.css" crossorigin="anonymous">
  <?php endif ?>

  <script type="text/javascript">
   var csrf_token = '<?= $this->security->get_csrf_hash(); ?>';
   var token_name = '<?= $this->security->get_csrf_token_name();?>'
 </script>

  <?php if (settings()->enable_captcha == 1 && settings()->captcha_site_key != ''): ?>
      <script src='https://www.google.com/recaptcha/api.js'></script>
  <?php endif; ?>
 
  </head>

  <body class="hold-transition sidebar-mini">
  
  <div class="wrapper <?php if(settings()->site_info == 3){echo "d-none";} ?>">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav pl-3">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?php if(is_user()): ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a target="_blank" href="<?php echo base_url($this->business->slug) ?>" class="btn btn-outline-secondary btn-sm mt-1 ml-2"><i class="lni lni-eye"></i> <?php echo trans('view-page') ?></a>
        </li>
      <?php else: ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a target="_blank" href="<?php echo base_url() ?>" class="btn btn-outline-secondary btn-sm mt-1 ml-2"><i class="lni lni-eye"></i> <?php echo trans('view-site') ?></a>
        </li>
      <?php endif; ?>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav <?php if(text_dir() == 'ltr'){echo "ml-auto";} ?>">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown pr-4">
        <a class="nav-link user-log" data-toggle="dropdown" href="#">
          <i class="lnib lni-user"></i> <?php echo ucfirst(user()->name) ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right mr-4">
          
          <a href="#" class="dropdown-item">
            <div class="media">
              <?php if (user()->role == 'admin'): ?>
                
              <?php else: ?>
                <img src="<?php echo base_url(user()->thumb) ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <?php endif ?>
              
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo character_limiter(user()->name, 18); ?>
                </h3>
                <p class="text-sm"><?php echo user()->email; ?></p>
                <p class="text-sm text-muted"><i class="far fa-clock"></i> <?php echo get_time_ago(user()->created_at); ?></p>
              </div>
            </div>
          </a>

          <?php if (user()->role == 'user'): ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('admin/settings/profile') ?>" class="dropdown-item">
            <i class="lni lni-user mr-2"></i> <?php echo trans('manage-profile') ?>
          </a>
          <?php endif ?>

          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('admin/settings/change_password') ?>" class="dropdown-item">
            <i class="lni lni-lock-alt mr-2"></i> <?php echo trans('change-password') ?>
          </a>

          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item">
            <i class="lni lni-exit mr-2"></i> <?php echo trans('logout') ?>
          </a>
        </div>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->


