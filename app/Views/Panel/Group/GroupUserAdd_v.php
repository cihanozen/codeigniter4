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
            <h1><?php echo lang('Text.GroupAdd');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('Text.Home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('Text.GroupAdd');?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->


      
    </section>

    <!-- Main content -->
    <section class="content">

    <?php
      
      if(!isAllowedModules("user_group_view_p")){ ?>
          
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

          <div class="card card-default">
   
            <form action="<?php echo base_url($locale.'/user-group-add/save')?>" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName"><?php echo lang('Text.UserGroupName');?></label>
                <input type="text" name="group_name" value="<?php echo set_value('group_name')?>" id="inputName" class="form-control" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="inputStatus"><?php echo lang('Text.UserGroupStatus');?></label>
                <select id="inputStatus" name='group_status' class="form-control custom-select">
                  <option selected disabled><?php echo lang('Text.Select');?></option>
                  <option value="1"><?php echo lang('Text.Active');?></option>
                  <option value="0"><?php echo lang('Text.Passive');?></option>
                </select>
              </div>
              
            
            </div>
          
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        
        </div>
       
      </div>

      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grup İzinleri</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th style="width: 20%;"><?php echo lang('Text.PermissionArea');?></th>
                      <th style="width: 20%; text-align:center;"><?php echo lang('Text.PermissionView');?></th>
                      <th style="width: 20%; text-align:center;"><?php echo lang('Text.PermissionAdd');?></th>
                      <th style="width: 20%; text-align:center;"><?php echo lang('Text.PermissionEdit');?></th>
                      <th style="width: 20%; text-align:center;"><?php echo lang('Text.PermissionDelete');?></th>
                  </thead>
                 
                  <tbody>
                    <tr>
                      <td>Dashboard</td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                       
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="dashboard_view_p" name="dashboard_view_p">
                          <label for="dashboard_view_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                        
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="dashboard_save_p" name="dashboard_save_p" >
                          <label for="dashboard_save_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                            <input
                            
                            class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="dashboard_edit_p"name="dashboard_edit_p" >
                            <label for="dashboard_edit_p" class="custom-control-label" style="cursor: pointer;"></label>
                          </div>  
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                         
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="dashboard_delete_p" name="dashboard_delete_p" >
                          <label for="dashboard_delete_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Kullanıcılar</td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_view_p" name="user_view_p">
                          <label for="user_view_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                        
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_save_p" name="user_save_p" >
                          <label for="user_save_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                            <input
                  
                            class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_edit_p"name="user_edit_p" >
                            <label for="user_edit_p" class="custom-control-label" style="cursor: pointer;"></label>
                          </div>  
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                      
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_delete_p" name="user_delete_p" >
                          <label for="user_delete_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Kullanıcı Grupları</td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                       
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_group_view_p" name="user_group_view_p" >
                          <label for="user_group_view_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                         
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_group_save_p" name="user_group_save_p">
                          <label for="user_group_save_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                            <input
                           
                            class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_group_edit_p"name="user_group_edit_p">
                            <label for="user_group_edit_p" class="custom-control-label" style="cursor: pointer;"></label>
                          </div>  
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                       
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_group_delete_p" name="user_group_delete_p">
                          <label for="user_group_delete_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      <?php if(isAllowedModules("user_group_save_p")){ ?>

      <div class="row">
        <div class="col-12">
          <input type="submit" value="<?php echo Lang('Text.Users.Button.Save');?>" class="btn btn-success float-right">
          <a href="<?php echo base_url();?>" class="btn btn-secondary float-right mr-3"> <?php echo Lang('Text.Users.Button.Cancel');?></a>
        </div>
      </div>

      <?php } ?>

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
