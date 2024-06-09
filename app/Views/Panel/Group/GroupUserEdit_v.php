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
            <h1><?php echo lang('Text.UserGroupEdit');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('Text.Home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('Text.UserGroupEdit');?></li>
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

      <?php if(!empty(session()->getFlashdata('successUpdate'))) : ?>
        
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('successUpdate'); ?>
        </div>

    <?php endif; ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
          
            <form action="<?php echo base_url($locale.'/user-group-edit/update/'.$uri->getSegment(3))?>" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName"><?php echo lang('Text.UserGroupName');?></label>
                <input type="text" name="group_name" value="<?php echo $userGroup->group_name; ?>" id="inputName" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="inputStatus"><?php echo lang('Text.UserGroupStatus');?></label>
                <select id="inputStatus" name='group_status' class="form-control custom-select">
                  <option selected disabled><?php echo lang('Text.Select');?></option>
                  <option value="1" <?php echo ($userGroup->group_status == 1) ? 'selected' : '';?> ><?php echo lang('Text.Active');?></option>
                  <option value="0" <?php echo ($userGroup->group_status == 0) ? 'selected' : '';?> ><?php echo lang('Text.Passive');?></option>
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
                <h3 class="card-title"><?php echo lang('Text.UserGroupPermission');?></h3>
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
                    </tr>
                  </thead>
                  <input type="hidden" name='group_id' value="<?php echo $userGroup->id; ?>">
                  <tbody>
                    <tr>
                      <td>Dashboard</td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['dashboard_view_p']) ? 'checked' : '' ; ?>
                          <?php //if($userGroup->group_status == 1) { echo 'checked'; }?>
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="dashboard_view_p" name="dashboard_view_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?>>
                          <label for="dashboard_view_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['dashboard_save_p']) ? 'checked' : '' ; ?>
                        
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="dashboard_save_p" name="dashboard_save_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                          <label for="dashboard_save_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                            <input
                            <?php echo isset($permissions['dashboard_edit_p']) ? 'checked' : '' ; ?>
                         
                            class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="dashboard_edit_p"name="dashboard_edit_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                            <label for="dashboard_edit_p" class="custom-control-label" style="cursor: pointer;"></label>
                          </div>  
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['dashboard_delete_p']) ? 'checked' : '' ; ?>
                          
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="dashboard_delete_p" name="dashboard_delete_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                          <label for="dashboard_delete_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>Slider</td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['slider_view_p']) ? 'checked' : '' ; ?>
                          
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="slider_view_p" name="slider_view_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                          <label for="slider_view_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['slider_save_p']) ? 'checked' : '' ; ?>
                       
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="slider_save_p" name="slider_save_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                          <label for="slider_save_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                            <input
                            <?php echo isset($permissions['slider_edit_p']) ? 'checked' : '' ; ?>
                            
                            class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="slider_edit_p" name="slider_edit_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                            <label for="slider_edit_p" class="custom-control-label" style="cursor: pointer;"></label>
                          </div>  
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['slider_delete_p']) ? 'checked' : '' ; ?>

                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="slider_delete_p" name="slider_delete_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                          <label for="slider_delete_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>Kullanıcılar</td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['user_view_p']) ? 'checked' : '' ; ?>
                          
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_view_p" name="user_view_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                          <label for="user_view_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['user_save_p']) ? 'checked' : '' ; ?>
                       
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_save_p" name="user_save_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                          <label for="user_save_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                            <input
                            <?php echo isset($permissions['user_edit_p']) ? 'checked' : '' ; ?>
                            
                            class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_edit_p" name="user_edit_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                            <label for="user_edit_p" class="custom-control-label" style="cursor: pointer;"></label>
                          </div>  
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['user_delete_p']) ? 'checked' : '' ; ?>

                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_delete_p" name="user_delete_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                          <label for="user_delete_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Kullanıcı Grupları</td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['user_group_view_p']) ? 'checked' : '' ; ?>
                         
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_group_view_p" name="user_group_view_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                          <label for="user_group_view_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['user_group_save_p']) ? 'checked' : '' ; ?>
                       
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_group_save_p" name="user_group_save_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                          <label for="user_group_save_p" class="custom-control-label" style="cursor: pointer;"></label>
                        </div>
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                            <input
                            <?php echo isset($permissions['user_group_edit_p']) ? 'checked' : '' ; ?>
                          
                            class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_group_edit_p"name="user_group_edit_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
                            <label for="user_group_edit_p" class="custom-control-label" style="cursor: pointer;"></label>
                          </div>  
                      </td>
                      <td style="width: 20%; text-align:center;">
                        <div class="custom-control custom-checkbox">
                          <input
                          <?php echo isset($permissions['user_group_delete_p']) ? 'checked' : '' ; ?>
                    
                          class="custom-control-input custom-control-input-danger text-center" type="checkbox" id="user_group_delete_p" name="user_group_delete_p" <?php if($userGroup->group_status == 0) { echo 'disabled'; }?> >
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

        <?php if(isAllowedModules("user_group_edit_p")){ ?>

        <div class="row">
          <div class="col-12">
            <input type="submit" value="<?php echo Lang('Text.UpdateButton');?>" class="btn btn-success float-right">
            <a href="<?php echo base_url();?>" class="btn btn-secondary float-right mr-3"> <?php echo Lang('Text.CancelButton');?></a>
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



</body>
</html>
