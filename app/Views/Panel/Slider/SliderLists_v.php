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
            <h1><?php echo Lang('Text.SliderLists');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active"><?php echo Lang('Text.SliderLists');?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
          <div class="col-12">

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                  <?php echo session()->getFlashdata('success');?>
                </div>
              <?php endif ?>

              <?php if(session()->getFlashdata('successDelete')): ?>
                <div class="alert alert-success">
                  <?php echo session()->getFlashdata('successDelete');?>
                </div>
              <?php endif ?>
 
            <div class="card">

              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th><?php echo Lang('Text.SliderListsImage');?></th>
                      <th><?php echo Lang('Text.SliderListsTitle');?></th>
                      <th><?php echo Lang('Text.SliderListsDescription');?></th>
                      <th><?php echo Lang('Text.SliderListsCreatedAt');?></th>
                      <th><?php echo Lang('Text.SliderListsActions');?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($sliders)):?>
                    <?php foreach($sliders as $slider): ?>
                      <tr>
                        <td><?= $slider['id']; ?></td>
                        <td><img src="<?= base_url($slider['image_path']) ?>" width="100" /></td>
                        <td><?= $slider['title']; ?></td>
                        <td><?= $slider['description']; ?></td>
                        <td><?= $slider['created_at']; ?></td>
                        <td>
                          <a class="btn btn-danger btn-sm" href="<?php echo base_url($locale.'/slider-lists/delete').'/'.$slider['id'];?>">
                              <i class="fas fa-trash">
                              </i>
                              <?php echo Lang('Text.PermissionDelete');?>
                              </a>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach?>
                  <?php else:?>
                    <td colspan="6" style="text-align: center;"><?php echo Lang('Text.SliderEmpty');?></td>
                  <?php endif;?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php echo view('Panel/inc/Footer');?>

</body>
</html>
