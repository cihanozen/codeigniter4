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
            <h1><?php echo Lang('Text.SliderAdd');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('Text.Home');?></a></li>
              <li class="breadcrumb-item active"><?php echo Lang('Text.SliderAdd');?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">

    <?php
      
      if(!isAllowedModules("user_view_p")){ ?>
          
          <div class="callout callout-info">
              <h5><i class="fas fa-info mr-3"></i> <?php echo Lang('Text.WarningMessage');?></h5>
              <?php echo Lang('Text.WarningDesc');?>
          </div>
           
    <?php }else{ ?>

      <div class="row">
        <div class="col-md-12">
       
        <?php 
      
            if(isset($errors)) { ?>
        
                <?php foreach($errors as $error){?>
 
                  <div class="alert alert-danger alert-dismissible pb-1">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-exclamation-triangle"></i> <?php echo $error;?></h6>
                  </div>
              
                <?php } ?>
             
            <?php }  ?>

            <?php if(session()->getFlashdata('errors')):?>
                <div class="alert alert-danger">
                <?php foreach(session()->getFlashdata('errors') as $error):?>

                  <?php echo esc($error)?>

                <?php endforeach ?>
                </div>
            <?php endif ?>

          <div class="card card-default">

       

            <form action="<?php echo base_url($locale.'/slider-save')?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName"><?php echo Lang('Text.SliderTitle');?></label>
                <input type="text" name="title" value="<?php echo set_value('title')?>" id="inputName" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="inputName"><?php echo Lang('Text.SliderDescription');?></label>
                <input type="text" name="description" value="<?php echo set_value('description')?>" id="inputName" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                    <input type="file" name="image" />
              </div>
              
            </div>
          
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
       
      </div>
      <div class="row">
        <div class="col-12">
       
          <input type="submit" value="<?php echo Lang('Text.SaveButton');?>" class="btn btn-success float-right">
          <a href="<?php echo base_url();?>" class="btn btn-secondary float-right mr-3"><?php echo Lang('Text.CancelButton');?></a>
        </div>
      </div>
      </form>

    <?php } ?>


    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php echo view('Panel/inc/Footer');?>


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
