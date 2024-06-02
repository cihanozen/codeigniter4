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
              <h1><?php echo Lang('Text.TranslationPage');?></h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item accent-olive"><a href="<?php echo base_url();?>"><?php echo lang('Text.Home');?></a></li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url($locale.'/language-lists');?>"><?php echo lang('Text.LanguageLists');?></a></li>
              <li class="breadcrumb-item active">Çeviri Sayfası</li>
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

      <div class="col-12" id="accordion">

      <?php if(!empty(session()->getFlashdata('successUpdate'))) : ?>
        
        <div class="alert alert-success alert-dismissible pb-1">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h6><i class="icon fas fa-check"></i><?php echo session()->getFlashdata('successUpdate'); ?></h6>
        </div>

    <?php endif; ?>
      
        <form id='form' action="<?php echo base_url($locale.'/language-translate/update/'.$uri->getSegment(3))?>" method="POST">

              <div class="card card-dark card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSistem">
                        <div class="card-header">
                            <h4 class="card-title w-100" >
                               <b>Header</b> <small>- Sayfanın en üst bölümünde kullanılan button isimlerini değiştirebilirsiniz</small>
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSistem" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            
                            <div class="form-group">
                              <label>Home</label>
                              <textarea name="home" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['home'];?></textarea>
                            </div>

                            <div class="form-group">
                              <label>Logout</label>
                              <textarea name="logout" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['logout'];?></textarea>
                            </div>

                        </div>
                    </div>
              </div>

              <div class="card card-dark card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapse">
                        <div class="card-header">
                            <h4 class="card-title w-100" >
                               <b>Menu</b> <small>- Sol Tarafta Bulunan Menu Buttonlarının İsimlerini Değiştirebilirsiniz</small>
                            </h4>
                        </div>
                    </a>
                    <div id="collapse" class="collapse" data-parent="#accordion">
                        <div class="card-body">

                    
                        <blockquote class="quote-secondary mt-0">
                          <div class="form-group">
                              <label>Users</label>
                              <textarea name="users" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['users'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>User Lists</label>
                            <textarea name="userLists" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userLists'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>User Add</label>
                            <textarea name="userAdd" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userAdd'];?></textarea>
                          </div>
                        </blockquote>
                  
                        <blockquote class="quote-secondary mt-0">
                          <div class="form-group">
                            <label>User Groups</label>
                            <textarea name="userGroups" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userGroups'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Group Lists</label>
                            <textarea name="groupLists" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['groupLists'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Group Add</label>
                            <textarea name="groupAdd" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['groupAdd'];?></textarea>
                          </div>
                        </blockquote>

                        <blockquote class="quote-secondary mt-0">
                          <div class="form-group">
                            <label>Language Management</label>
                            <textarea name="languageManagement" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['languageManagement'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Language Lists</label>
                            <textarea name="languageLists" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['languageLists'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Add New Language</label>
                            <textarea name="addNewLanguage" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['addNewLanguage'];?></textarea>
                          </div>
                        </blockquote>
                          

                        </div>
                    </div>
               
              </div>

              <div class="card card-dark card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapse1">
                        <div class="card-header">
                            <h4 class="card-title w-100" >
                                <b>Buttons and Inputs</b> <small>- Kaydet, Güncelle, Düzenle, Sil gibi buttonları düzenleyebilirsiniz</small>
                            </h4>
                        </div>
                    </a>
                    <div id="collapse1" class="collapse" data-parent="#accordion">
                        
                    <div class="card-body">
                           
                          <div class="form-group">
                            <label>Save Button</label>
                            <textarea name="saveButton" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['saveButton'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Update Button</label>
                            <textarea name="updateButton" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['updateButton'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Edit Button</label>
                            <textarea name="editButton" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['editButton'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Delete Button</label>
                            <textarea name="deleteButton" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['deleteButton'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Cancel Button</label>
                            <textarea name="cancelButton" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['cancelButton'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Translation</label>
                            <textarea name="translationButton" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['translationButton'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Select</label>
                            <textarea name="select" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['select'];?></textarea>
                          </div>

                    </div>
                      
                    </div>
              </div>

              <div class="card card-dark card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapse2">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                              <b><?php echo Lang('Text.Users');?></b> <small>- Kullanıcılar tablosundaki genel tüm alanları düzenleyebilirsiniz</small>
                            </h4>
                        </div>
                    </a>
                    <div id="collapse2" class="collapse" data-parent="#accordion">
                        <div class="card-body">

                   
                          <div class="form-group">
                              <label>Username</label>
                              <textarea name="username" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['username'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Group Name</label>
                            <textarea name="groupName" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['groupName'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Status</label>
                            <textarea name="status" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['status'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Active</label>
                            <textarea name="active" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['active'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Passive</label>
                            <textarea name="passive" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['passive'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <textarea name="email" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['email'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Password</label>
                            <textarea name="password" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['password'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>User Bio</label>
                            <textarea name="userBio" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userBio'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>User Edit</label>
                            <textarea name="userEdit" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userEdit'];?></textarea>
                          </div>

                          <blockquote class="quote-success mt-0">
                          
                            <div class="form-group">
                                <label>Success Save Message</label>
                                <textarea name="successSave" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['successSave'];?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Success Update Message</label>
                                <textarea name="successUpdate" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['successUpdate'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Success Delete Message</label>
                                <textarea name="successDelete" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['successDelete'];?></textarea>
                            </div>

                          </blockquote>

                          <blockquote class="quote-danger mt-0">
                            <div class="form-group">
                                <label>Username Error Message</label>
                                <textarea name="usernameError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['usernameError'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Password Error Message</label>
                                <textarea name="passwordError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['passwordError'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Email Error Message</label>
                                <textarea name="emailError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['emailError'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>User Bio Error Message</label>
                                <textarea name="userBioError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userBioError'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Status Error Message</label>
                                <textarea name="statusError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['statusError'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Group Name Error Message</label>
                                <textarea name="groupNameError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['groupNameError'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Valid Email Error Message</label>
                                <textarea name="validEmailError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['validEmailError'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Is Unique Email Error Message</label>
                                <textarea name="isUniqueEmailError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['isUniqueEmailError'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Permission Edit Error Message</label>
                                <textarea name="permissionEditError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['permissionEditError'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Root User Error Message</label>
                                <textarea name="adminPermissionError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['adminPermissionError'];?></textarea>
                            </div>

                          </blockquote>

                         
                    
                        </div>
                    </div>
              </div>

              <div class="card card-dark card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapse3">
                        <div class="card-header">
                        <h4 class="card-title w-100">
                              <b><?php echo Lang('Text.UserGroups');?></b> <small>- Kullanıcı Gruplarındaki genel tüm alanları düzenleyebilirsiniz</small>
                        </div>
                    </a>
                    <div id="collapse3" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            
                          <div class="form-group">
                            <label>User Group Edit</label>
                            <textarea name="userGroupEdit" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userGroupEdit'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>User Group Name</label>
                            <textarea name="userGroupName" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userGroupName'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>User Group Status</label>
                            <textarea name="userGroupStatus" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userGroupStatus'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>User Group Permission</label>
                            <textarea name="userGroupPermission" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userGroupPermission'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Permission Area</label>
                            <textarea name="permissionArea" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['permissionArea'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Permission View</label>
                            <textarea name="permissionView" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['permissionView'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Permission Add</label>
                            <textarea name="permissionAdd" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['permissionAdd'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Permission Edit</label>
                            <textarea name="permissionEdit" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['permissionEdit'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Permission Delete</label>
                            <textarea name="permissionDelete" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['permissionDelete'];?></textarea>
                          </div>

                          <blockquote class="quote-success mt-0">
                          
                            <div class="form-group">
                                <label>User Group Success Save Message</label>
                                <textarea name="userGroupSuccessSave" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userGroupSuccessSave'];?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>User Group Success Update Message</label>
                                <textarea name="userGroupSuccessUpdate" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userGroupSuccessUpdate'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>User Group Success Delete Message</label>
                                <textarea name="userGroupSuccessDelete" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userGroupSuccessDelete'];?></textarea>
                            </div>

                          </blockquote>

                          <blockquote class="quote-danger mt-0">
                          
                            <div class="form-group">
                                <label>User Group Name Error Message</label>
                                <textarea name="userGroupNameError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userGroupNameError'];?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>User Group Status Error Message</label>
                                <textarea name="userGroupStatusError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['userGroupStatusError'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Permission Edit Error Message</label>
                                <textarea name="permissionUserGroupEditError" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['permissionUserGroupEditError'];?></textarea>
                            </div>



                            

                          </blockquote>

                        </div>
                    </div>
              </div>

              <div class="card card-dark card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapse4">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <b><?php echo Lang('Text.LanguageManagement');?></b> <small>- Dil listesi, çeviri sayfası düzenlemelerini hızlıca yapabilirsiniz</small>
                            </h4>
                        </div>
                    </a>
                    <div id="collapse4" class="collapse" data-parent="#accordion">
                        <div class="card-body">

                          <div class="form-group">
                            <label>Translation Page</label>
                            <textarea name="translationPage" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['translationPage'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Language Title</label>
                            <textarea name="languageTitle" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['languageTitle'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Short Name</label>
                            <textarea name="shortName" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['shortName'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Short Name</label>
                            <textarea name="flag" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['flag'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Language Status</label>
                            <textarea name="languageStatus" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['languageStatus'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Creation Date</label>
                            <textarea name="creationDate" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['creationDate'];?></textarea>
                          </div>

                          <div class="form-group">
                            <label>Default Language</label>
                            <textarea name="defaultLanguage" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['defaultLanguage'];?></textarea>
                          </div>

                          <blockquote class="quote-success mt-0">
                            
                            <div class="form-group">
                                <label>Translate Success Save Message</label>
                                <textarea name="translateSuccessSave" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['translateSuccessSave'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Language Success Save Message</label>
                                <textarea name="languageSuccessSave" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['languageSuccessSave'];?></textarea>
                            </div>

                            </blockquote>

                            <blockquote class="quote-info mt-0">
                            
                            <div class="form-group">
                                <label>Sweetalert Title</label>
                                <textarea name="sweetalertTitle" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['sweetalertTitle'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Sweetalert Text</label>
                                <textarea name="sweetalertText" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['sweetalertText'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Sweetalert Confirm Button Text</label>
                                <textarea name="confirmButtonText" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['confirmButtonText'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Sweetalert Cancel Button Text</label>
                                <textarea name="cancelButtonText" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['cancelButtonText'];?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Sweetalert Success Delete Message</label>
                                <textarea name="languageSuccessDelete" class="form-control" rows="3" placeholder="Enter ..."><?php echo @$translates['languageSuccessDelete'];?></textarea>
                            </div>

                          </blockquote>

                         

                        </div>
                    </div>
              </div>
               

              <div class="row">
                <div class="col-12 mb-4">
                  <input type="submit" value="<?php echo Lang('Text.SaveButton');?>" class="btn btn-success float-right btnSave">
                  <a href="<?php echo base_url();?>" class="btn btn-secondary float-right mr-3"> <?php echo Lang('Text.CancelButton');?></a>
                </div>
              </div>
        </form>
              
      </div>

   

    <?php } ?>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php echo view('Panel/inc/Footer');?>

</body>
</html>
