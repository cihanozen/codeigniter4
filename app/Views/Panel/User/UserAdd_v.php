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
            <h1><?php echo lang('Text.Users');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('Text.Home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('Text.Users');?></li>
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

          <div class="card card-default">


            <form action="<?php echo base_url($locale.'/user-add/save')?>" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName"><?php echo lang('Text.Users.Username');?></label>
                <input type="text" name="username" value="<?php echo set_value('username')?>" id="inputName" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="inputName"><?php echo lang('Text.Users.Password');?></label>
                <input type="password" name="password" value="<?php echo set_value('password')?>" id="inputName" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="inputName"><?php echo lang('Text.Users.Email');?></label>
                <input type="text" name="email" value="<?php echo set_value('email')?>" id="inputName" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="inputDescription"><?php echo lang('Text.Users.UserBio');?></label>
                <input id="inputDescription" name='user_bio' value="<?php echo set_value('user_bio')?>" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="inputClientCompany"><?php echo lang('Text.Users.GroupName');?></label>
                <select id="inputStatus" name='group_id' class="form-control custom-select">
                  <option selected disabled><?php echo lang('Text.Select');?></option>
                
                  <?php foreach($userGroupLists as $userGroupList){ ?>
                    <option value="<?php echo $userGroupList['id'];?>" <?php echo (set_value('group_id') == $userGroupList['id']) ? 'selected' : '' ;?> ><?php echo $userGroupList['group_name'];?></option>
                  <?php } ?>

                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus"><?php echo lang('Text.Users.Status');?></label>
                <select id="inputStatus" name='status' class="form-control custom-select">
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
