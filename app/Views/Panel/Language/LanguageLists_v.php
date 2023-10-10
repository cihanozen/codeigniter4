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
            <h1><?php echo lang('Text.LanguageLists');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo lang('Text.Home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('Text.LanguageLists');?></li>
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

      <?php if(!empty(session()->getFlashdata('successAdd'))) : ?>
        
        <div class="alert alert-success alert-dismissible pb-1">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h6><i class="icon fas fa-check"></i><?php echo session()->getFlashdata('successAdd'); ?></h6>
        </div>

    <?php endif; ?>

    <?php if(!empty(session()->getFlashdata('successDelete'))) : ?>
        
        <div class="alert alert-danger alert-dismissible pb-1">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h6><i class="icon fas fa-exclamation-triangle"></i><?php echo session()->getFlashdata('successDelete'); ?></h6>
        </div>

    <?php endif; ?>

    <?php if(!empty(session()->getFlashdata('successUpdate'))) : ?>
        
        <div class="alert alert-success alert-dismissible pb-1">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h6><i class="icon fas fa-check"></i><?php echo session()->getFlashdata('successUpdate'); ?></h6>
        </div>

    <?php endif; ?>

      <!-- Default box -->
      <div class="card">

        <div class="card-body p-0">

          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #ID
                      </th>
                      <th style="width: 20%">
                        <?php echo Lang('Text.LanguageTitle');?>
                      </th>
                      <th style="width: 10%">
                        <?php echo Lang('Text.ShortName');?>
                      </th>
                      <th style="width: 10%">
                        <?php echo Lang('Text.Flag');?>
                      </th>
                      <th style="width: 15%">
                        <?php echo Lang('Text.LanguageStatus');?>
                      </th>
                      <th style="width: 10%">
                        <?php echo Lang('Text.CreationDate');?>
                      </th>
                      <th class="text-right"></th>
                  </tr>
              </thead>
              <tbody>
                 <?php foreach($languages as $language) { ?>
                  <tr>
                      <td>
                      <?php echo $language['id'];?>
                      </td>
                      <td>
                      <?php echo $language['language_name_tr'];?>
                      </td>
                      <td>
                      <?php echo $language['language_short_name'];?>
                      </td>

                      <td>
                      <i class="flag-icon flag-icon-<?php echo $language['language_short_name'];?>"></i>
                      </td>

                      <td>
                      <?php status($language['language_status']);?> <?php status_selected($language['language_selected']);?>
                      </td>
                     
                      <td>
                      <?php echo dateFormat($language['language_created_at']);?>
                      </td>
                      
                      <td class="project-actions text-right">

                        <a class="btn btn-primary btn-sm <?php //echo ($user['id'] == 1) ? 'disabled' : ''; ?>" href="<?php echo base_url($locale.'/language-translate').'/'.$language['language_short_name'];?>">
                              <i class="fas fa-language pr-1"></i>
                              <?php echo Lang('Text.TranslationButton');?>
                          </a>

                          <a class="btn btn-danger btn-sm <?php echo ($language['id'] == 1 || $language['id'] == 2) ? 'disabled' : ''; ?>" href="<?php echo base_url($locale.'/language-lists/delete').'/'.$language['id'];?>">
                              <i class="fas fa-trash pr-1"></i>
                              <?php echo Lang('Text.DeleteButton');?>
                          </a>

                      </td>
                    
                  </tr>
                  <?php  } ?>
            
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
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
