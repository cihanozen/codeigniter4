<!DOCTYPE html>
<html lang="en">

<?php echo view('Panel/inc/Header');?>

<body class="hold-transition sidebar-mini accent-olive <?php echo (session()->get('loggedUser')['dark_mode'] == 1) ? 'dark-mode' : ''; ?>">
<!-- Site wrapper -->

<div class="wrapper">

<?php echo view('Panel/inc/HeaderContent'); ?>

<?php echo view('Panel/inc/Menu');?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item accent-olive"><a href="#"><?php echo lang('Text.Home');?></a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <?php
      
      if(!isAllowedModules("dashboard_view_p")){ ?>
          
          <div class="callout callout-info">
              <h5><i class="fas fa-info mr-3"></i> Uyarı Mesajı</h5>
              Bu Sayfayı Görüntüleme İzniniz Yok!
          </div>
           
    <?php }else{ ?>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    <?php } ?>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php echo view('Panel/inc/Footer');?>

</body>
</html>
