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
            <h1>Yeni Dil Ekle<?php //echo lang('Text.Users');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo lang('Text.Home');?></a></li>
              <li class="breadcrumb-item active">Yeni Dil Ekle<?php //echo lang('Text.Users');?></li>
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

          <div class="ajaxError"></div>
          <div class="ajaxSuccess"></div>

          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Yeni Dil Ekle<?php //echo lang('Text.NewUserAdd');?></h3>
            </div>

            <form id='form' action="<?php echo base_url($locale.'/language-add/save')?>" method="POST">

            <ul class="nav nav-tabs mt-4 mb-4" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active"
                id="custom-content-above-home-tab"
                data-toggle="pill"
                href="#custom-content-above-home"
                role="tab"
                aria-controls="custom-content-above-home"
                aria-selected="true">
                <img src="//upload.wikimedia.org/wikipedia/commons/b/b4/Flag_of_Turkey.svg" width="35" class="pr-2"/> Türkçe</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"
                id="custom-content-above-profile-tab"
                data-toggle="pill"
                href="#custom-content-above-profile"
                role="tab"
                aria-controls="custom-content-above-profile"
                aria-selected="false">
                <img src="//upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg" width="35" class="pr-2"/> English</a>
              </li>
            </ul>

            <div class="tab-content" id="custom-content-above-tabContent">
              
              <div class="tab-pane fade active show" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
               
              <div class="card-body">
              
              <div class="form-group">
                <label for="inputName">Dil Başlık</label>
                <input type="text" name="language_name_tr" value="<?php echo set_value('language_name_tr')?>" id="inputName" class="form-control language_name_tr" autocomplete="off">
              </div>

              <div class="form-group">
              <label for="inputName">Ülke</label>
                  <select id="deneme" name="language_country_tr" class="form-control select2bs4c select2-hidden-accessible language_country_tr" style="width: 100%;">
                    
                  <?php foreach($countrys as $country){ ?>
                    <option value="<?php echo $country['name']?>" data-id="<?php echo $country['rewrite']?>" ><?php echo $country['name']?></option>
                  <?php } ?>

                  </select>
        
              </div>

              
            </div>

            </div>
              
              <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                  
              <div class="card-body">
              
              <div class="form-group">
                <label for="inputName">Dil Başlık<?php //echo lang('Text.Users.Username');?></label>
                <input type="text" name="language_name_en" value="<?php echo set_value('language_name_en')?>" id="inputName" class="form-control language_name_en" autocomplete="off">
              </div>

              <div class="form-group">
              <label for="inputName">Ülke<?php //echo lang('Text.Users.Username');?></label>
                  <select name="language_country_en" class="form-control select2bs4c select2-hidden-accessible language_country_en" style="width: 100%;">
                    
                  <?php foreach($countrys as $country){ ?>
                    <option><?php echo $country['name']?></option>
                  <?php } ?>

                
                  </select>
              </div>

              
            </div>

              </div>
              
            </div>

         


            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
       
      </div>
      <div class="row">
        <div class="col-12">
          <input type="reset" value="<?php echo Lang('Text.SaveButton');?>" class="btn btn-success float-right btnSave">
          <a href="<?php echo base_url();?>" class="btn btn-secondary float-right mr-3"> <?php echo Lang('Text.CancelButton');?></a>
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

<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js')?>"></script>

<script>

$('.select2bs4c').select2({
      theme: 'bootstrap4',
    });

$('.btnSave').on('click',function(){

  $('.ajaxError').text('');
  $('.ajaxSuccess').text('');
    
  var language_short_name = $("#deneme").select2().find(":selected").data("id");
  var language_country_tr = $(".language_country_tr").val();
  var language_country_en = $(".language_country_en").val();
  var language_name_tr = $(".language_name_tr").val();
  var language_name_en = $(".language_name_en").val();

  $.ajax({

    type: 'POST',
    url: '<?php echo base_url($locale.'/language-add/save')?>',
    data: {
      language_country_tr : language_country_tr,
      language_country_en : language_country_en,
      language_name_tr : language_name_tr,
      language_name_en : language_name_en,
      language_short_name : language_short_name
    },
    success: function(data){

      var json = JSON.parse(data);

      $.each(json.errors, function(i,item){

        var $temp = `
        
          <div class="alert alert-danger alert-dismissible pb-1">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h6><i class="icon fas fa-exclamation-triangle"></i> ${item} </h6>
          </div>

        `;


        $('.ajaxError').append($temp);
        $('.select2bs4c').select2({
          theme: 'bootstrap4',
        });

      


      });

      $.each(json.success, function(i,value){

        var $temp2 = `

          <div class="alert alert-success alert-dismissible pb-1">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h6><i class="icon fas fa-exclamation-triangle"></i> ${value} </h6>
          </div>

        `;

        $('.ajaxSuccess').append($temp2);
        $('.select2bs4c').select2({
          theme: 'bootstrap4',
        });

       

      });

  
    }

  });



});

</script>

</body>
</html>
