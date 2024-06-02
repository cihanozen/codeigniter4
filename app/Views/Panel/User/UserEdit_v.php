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

      <?php if(!empty(session()->getFlashdata('successUpdate'))) : ?>
        
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('successUpdate'); ?>
        </div>

    <?php endif; ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title"><?php echo lang('Text.UserEdit');?></h3>

            </div>

            <form action="<?php echo base_url($locale.'/user-edit/update/'.$uri->getSegment(3))?>" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName"><?php echo lang('Text.Users.Username');?></label>
                <input type="text" name="username" value="<?php echo $user->username; ?>" id="inputName" class="form-control" autocomplete="off">
              </div>
             
              <div class="form-group">
                <label for="inputName"><?php echo lang('Text.Users.Email');?></label>
                <input type="text" name="email" value="<?php echo $user->email; ?>" id="inputName" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="inputDescription"><?php echo lang('Text.Users.UserBio');?></label>
                <input id="inputDescription" name='user_bio' value="<?php echo $user->user_bio; ?>" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="inputClientCompany"><?php echo lang('Text.Users.GroupName');?></label>
                <select id="inputStatus" name='group_id' class="form-control custom-select">
                  <option selected disabled><?php echo lang('Text.Select');?></option>
                 
                  <?php foreach($userGroupLists as $userGroupList){ ?>
                    <option value="<?php echo $userGroupList['id'];?>" <?php echo ($userGroupList['id'] == $user->group_id) ? 'selected' : '' ;?> ><?php echo $userGroupList['group_name'];?></option>
                  <?php } ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus"><?php echo lang('Text.Users.Status');?></label>
                <select id="inputStatus" name='status' class="form-control custom-select">
                  <option selected disabled><?php echo lang('Text.Select');?></option>
                  <option value="1" <?php echo ($user->status == 1) ? 'selected' : '';?> ><?php echo lang('Text.Active');?></option>
                  <option value="0" <?php echo ($user->status == 0) ? 'selected' : '';?> ><?php echo lang('Text.Passive');?></option>
                </select>
              </div>
              
            
            </div>
          
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
       
      </div>

      <?php if(isAllowedModules("user_edit_p")){ ?>

      <div class="row mb-4">
        <div class="col-12">
          <input type="submit" value="<?php echo lang('Text.UpdateButton');?>" class="btn btn-success float-right">
          <a href="<?php echo base_url();?>" class="btn btn-secondary float-right mr-3"><?php echo lang('Text.CancelButton');?></a>
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
