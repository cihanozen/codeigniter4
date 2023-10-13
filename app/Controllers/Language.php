<?php

namespace App\Controllers;

class Language extends BaseController
{

    private $userModel;
    private $userGroupModel;
    private $languageModel;
    private $countryModel;
    private $translateModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\UsersModel();
        $this->userGroupModel = new \App\Models\UsersGroupModel();
        $this->languageModel = new \App\Models\LanguageModel();
        $this->countryModel = new \App\Models\CountryModel();
        $this->translateModel = new \App\Models\TranslateModel();
    }

    public function index()
    {

        /*
        $uri = service('uri');
        $locale = $this->request->getLocale();

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'locale' => $locale,
            'uri' => $uri
        ];

        return view('Panel/User/User_v', $data);
        */

    }

    public function languageLists()
    {

        /*
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        */

        $uri = service('uri');
        $locale = $this->request->getLocale();

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);
        $users = $this->userModel->getUser();

        $languages = $this->languageModel->find();

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'locale' => $locale,
            'users' => $users,
            'languages' => $languages,
            'uri' => $uri
        ];

        return view('Panel/Language/LanguageLists_v', $data);
        
    }

    public function languageAdd()
    {

        $uri = service('uri');
        $locale = $this->request->getLocale();

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);
        $userGroup = $this->userGroupModel->getUserGroup();

        $countrysData = $this->countryModel->getCountry();

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'countrys' => $countrysData,
            'locale' => $locale,
            'uri' => $uri
        ];
        
        return view('Panel/Language/LanguageAdd_v',$data);

    }

    public function languageSave()
    {


        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);
        $languageInfo = $this->languageModel->find();


        //$validation = \Config\Services::validation();
        $check = $this->validate([
            'language_name_tr' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => 'Lütfen türkçe bir dil başlığı yazın!'
                ]
            ],
            'language_country_tr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lütfen bir ülke seçin!'
                ]
            ],
            'language_name_en' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => 'Lütfen ingilizce bir dil başlığı yazın!'
                ]
            ],
            'language_country_en' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please choose a country!'
                ]
            ]
          
        ]);

        if(!$check)
        {

      
            $datag = ([
                'errors' => $this->validator->getErrors()
            ]);

            echo json_encode($datag);

        }
        else
        {

            $xxx = $this->request->getPost('language_short_name');
            $short_name = strtolower($xxx);

            // Klasör eklimi kontrol et
            if(file_exists('app/Language/'.$short_name)){
             
                // Klasör yoktu ve içerisine varolan klasöre dosyayı ekledi
                $file = fopen('app/Language/'.$short_name.'/Text.php', "w") or die('Hatalı');
                $txt =
"<?php
return [];
?>";
                fwrite($file,$txt);
                fclose($file);

            }else{

                // Yeni klasör oluşturdu
                mkdir('app/Language/'.$short_name, 0777, true);

                // Yeni dosyayı yeni oluşturulan klasör içerisine ekledi

                $file = fopen('app/Language/'.$short_name.'/Text.php', "w") or die('Hatalı');
                $txt =
"<?php
return [];
?>";
                fwrite($file,$txt);
                fclose($file);

            }

            $data = array(
                'language_name_tr'      => $this->request->getPost('language_name_tr'),
                'language_country_tr'   => $this->request->getPost('language_country_tr'),
                'language_name_en'      => $this->request->getPost('language_name_en'),
                'language_country_en'   => $this->request->getPost('language_country_en'),
                'language_short_name'   => $short_name,
                'language_status'       => 0 // aktif değil
            );

            $send = $this->languageModel->saveLanguage($data);

            if($send)
            {

                $newData = array(
                    'main' => $short_name
                );

                $this->translateModel->saveTranslate($newData);

                $array = ([
                    'mesaj' => Lang('Text.Users.Add.Success')
                ]);
    
                $datac = ([
                    'success' => $array
                ]);
    
                echo json_encode($datac);

            }
            
        }
    }

    public function languageDelete()
    {

        $id = $this->request->getPost('id');

        $this->languageModel->deleteLanguage($id);

        echo 1;

        //return redirect()->to(base_url($this->viewData['locale'].'/language-lists'))->with('successDelete',Lang('Text.LanguageSuccessDelete'));

    }

    public function languageTranslate($id)
    {

        $uri = service('uri');
        $locale = $this->request->getLocale();

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);

        $translates = $this->translateModel->getTranslate($id);
        $jsonData = json_decode($translates['content'],true);

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'locale' => $locale,
            'translates' => $jsonData,
            'uri' => $uri
        ];

        return view('Panel/Language/LanguageTranslate_v', $data);
    }

    public function languageTranslateUpdate($id)
    {
        
        $jsonData = json_encode($_POST);

        $data = array(
            'main'      => $id,
            'content'   => $jsonData
        );

        $arrayData = json_decode($jsonData,true);

                    // Klasör eklimi kontrol et
                    if(file_exists('app/Language/'.$id)){
             
                        // Klasör yoktu ve içerisine varolan klasöre dosyayı ekledi
                        $file = fopen('app/Language/'.$id.'/Text.php', "w") or die('Hatalı');
                        $txt =
        "<?php
        return [
        // Header
            'Home'                              => '".$arrayData['home']."',
            'Logout'                            => '".$arrayData['logout']."',
        // Menu
            'Users'                             => '".$arrayData['users']."',
            'UserLists'                         => '".$arrayData['userLists']."',
            'UserAdd'                           => '".$arrayData['userAdd']."',
            'UserGroups'                        => '".$arrayData['userGroups']."',
            'GroupLists'                        => '".$arrayData['groupLists']."',
            'GroupAdd'                          => '".$arrayData['groupAdd']."',
            'LanguageManagement'                => '".$arrayData['languageManagement']."',
            'LanguageLists'                     => '".$arrayData['languageLists']."',
            'AddNewLanguage'                    => '".$arrayData['addNewLanguage']."',
        // Buttons and Inputs
            'SaveButton'                        => '".$arrayData['saveButton']."',
            'UpdateButton'                      => '".$arrayData['updateButton']."',
            'EditButton'                        => '".$arrayData['editButton']."',
            'DeleteButton'                      => '".$arrayData['deleteButton']."',
            'CancelButton'                      => '".$arrayData['cancelButton']."',
            'TranslationButton'                 => '".$arrayData['translationButton']."',
            'Select'                            => '".$arrayData['select']."',
        // Users
            'Username'                          => '".$arrayData['username']."',
            'GroupName'                         => '".$arrayData['groupName']."',
            'Status'                            => '".$arrayData['status']."',
            'Active'                            => '".$arrayData['active']."',
            'Passive'                           => '".$arrayData['passive']."',
            'Email'                             => '".$arrayData['email']."',
            'Password'                          => '".$arrayData['password']."',
            'UserBio'                           => '".$arrayData['userBio']."',
            'UserEdit'                          => '".$arrayData['userEdit']."',
            'SuccessSave'                       => '".$arrayData['successSave']."',
            'SuccessUpdate'                     => '".$arrayData['successUpdate']."',
            'SuccessDelete'                     => '".$arrayData['successDelete']."',
            'PermissionEditError'               => '".$arrayData['permissionEditError']."',
            'AdminPermissionError'              => '".$arrayData['adminPermissionError']."',
            'UsernameError'                     => '".$arrayData['usernameError']."',
            'PasswordError'                     => '".$arrayData['passwordError']."',
            'EmailError'                        => '".$arrayData['emailError']."',
            'UserBioError'                      => '".$arrayData['userBioError']."',
            'StatusError'                       => '".$arrayData['statusError']."',
            'GroupNameError'                    => '".$arrayData['groupNameError']."',
            'ValidEmailError'                   => '".$arrayData['validEmailError']."',
            'IsUniqueEmailError'                => '".$arrayData['isUniqueEmailError']."',
        // User Groups
            'UserGroupEdit'                     => '".$arrayData['userGroupEdit']."',
            'UserGroupName'                     => '".$arrayData['userGroupName']."',
            'UserGroupStatus'                   => '".$arrayData['userGroupStatus']."',
            'UserGroupPermission'               => '".$arrayData['userGroupPermission']."',
            'PermissionArea'                    => '".$arrayData['permissionArea']."',
            'PermissionView'                    => '".$arrayData['permissionView']."',
            'PermissionAdd'                     => '".$arrayData['permissionAdd']."',
            'PermissionEdit'                    => '".$arrayData['permissionEdit']."',
            'PermissionDelete'                  => '".$arrayData['permissionDelete']."',
            'UserGroupSuccessSave'              => '".$arrayData['userGroupSuccessSave']."',
            'UserGroupSuccessUpdate'            => '".$arrayData['userGroupSuccessUpdate']."',
            'UserGroupSuccessDelete'            => '".$arrayData['userGroupSuccessDelete']."',
            'UserGroupNameError'                => '".$arrayData['userGroupNameError']."',
            'UserGroupStatusError'              => '".$arrayData['userGroupStatusError']."',
            'PermissionUserGroupEditError'      => '".$arrayData['permissionUserGroupEditError']."',
        // Languages
            'TranslationPage'                   => '".$arrayData['translationPage']."',
            'LanguageTitle'                     => '".$arrayData['languageTitle']."',
            'ShortName'                         => '".$arrayData['shortName']."',
            'Flag'                              => '".$arrayData['flag']."',
            'LanguageStatus'                    => '".$arrayData['languageStatus']."',
            'CreationDate'                      => '".$arrayData['creationDate']."',
            'DefaultLanguage'                   => '".$arrayData['defaultLanguage']."',
            'TranslateSuccessSave'              => '".$arrayData['translateSuccessSave']."',
            'LanguageSuccessSave'               => '".$arrayData['languageSuccessSave']."',
            'SweetalertTitle'                   => '".$arrayData['sweetalertTitle']."',
            'SweetalertText'                    => '".$arrayData['sweetalertText']."',
            'ConfirmButtonText'                 => '".$arrayData['confirmButtonText']."',
            'CancelButtonText'                  => '".$arrayData['cancelButtonText']."',
            'LanguageSuccessDelete'             => '".$arrayData['languageSuccessDelete']."',
            
            
            
            
        ];
        ?>";
                        fwrite($file,$txt);
                        fclose($file);
        
                    }else{
        
                        // Yeni klasör oluşturdu
                        mkdir('app/Language/'.$id, 0777, true);
        
                        // Yeni dosyayı yeni oluşturulan klasör içerisine ekledi
        
                        $file = fopen('app/Language/'.$id.'/Text.php', "w") or die('Hatalı');
                        $txt =
        "<?php
        return [
        // Header
            'Home'                              => '".$arrayData['home']."',
            'Logout'                            => '".$arrayData['logout']."',
        // Menu
            'Users'                             => '".$arrayData['users']."',
            'UserLists'                         => '".$arrayData['userLists']."',
            'UserAdd'                           => '".$arrayData['userAdd']."',
            'UserGroups'                        => '".$arrayData['userGroups']."',
            'GroupLists'                        => '".$arrayData['groupLists']."',
            'GroupAdd'                          => '".$arrayData['groupAdd']."',
            'LanguageManagement'                => '".$arrayData['languageManagement']."',
            'LanguageLists'                     => '".$arrayData['languageLists']."',
            'AddNewLanguage'                    => '".$arrayData['addNewLanguage']."',
        // Buttons and Inputs
            'SaveButton'                        => '".$arrayData['saveButton']."',
            'UpdateButton'                      => '".$arrayData['updateButton']."',
            'EditButton'                        => '".$arrayData['editButton']."',
            'DeleteButton'                      => '".$arrayData['deleteButton']."',
            'CancelButton'                      => '".$arrayData['cancelButton']."',
            'TranslationButton'                 => '".$arrayData['translationButton']."',
            'Select'                            => '".$arrayData['select']."',
        // Users
            'Username'                          => '".$arrayData['username']."',
            'GroupName'                         => '".$arrayData['groupName']."',
            'Status'                            => '".$arrayData['status']."',
            'Active'                            => '".$arrayData['active']."',
            'Passive'                           => '".$arrayData['passive']."',
            'Email'                             => '".$arrayData['email']."',
            'Password'                          => '".$arrayData['password']."',
            'UserBio'                           => '".$arrayData['userBio']."',
            'UserEdit'                          => '".$arrayData['userEdit']."',
            'SuccessSave'                       => '".$arrayData['successSave']."',
            'SuccessUpdate'                     => '".$arrayData['successUpdate']."',
            'SuccessDelete'                     => '".$arrayData['successDelete']."',
            'PermissionEditError'               => '".$arrayData['permissionEditError']."',
            'AdminPermissionError'              => '".$arrayData['adminPermissionError']."',
            'UsernameError'                     => '".$arrayData['usernameError']."',
            'PasswordError'                     => '".$arrayData['passwordError']."',
            'EmailError'                        => '".$arrayData['emailError']."',
            'UserBioError'                      => '".$arrayData['userBioError']."',
            'StatusError'                       => '".$arrayData['statusError']."',
            'GroupNameError'                    => '".$arrayData['groupNameError']."',
            'ValidEmailError'                   => '".$arrayData['validEmailError']."',
            'IsUniqueEmailError'                => '".$arrayData['isUniqueEmailError']."',
        // User Groups
            'UserGroupEdit'                     => '".$arrayData['userGroupEdit']."',
            'UserGroupName'                     => '".$arrayData['userGroupName']."',
            'UserGroupStatus'                   => '".$arrayData['userGroupStatus']."',
            'UserGroupPermission'               => '".$arrayData['userGroupPermission']."',
            'PermissionArea'                    => '".$arrayData['permissionArea']."',
            'PermissionView'                    => '".$arrayData['permissionView']."',
            'PermissionAdd'                     => '".$arrayData['permissionAdd']."',
            'PermissionEdit'                    => '".$arrayData['permissionEdit']."',
            'PermissionDelete'                  => '".$arrayData['permissionDelete']."',
            'UserGroupSuccessSave'              => '".$arrayData['userGroupSuccessSave']."',
            'UserGroupSuccessUpdate'            => '".$arrayData['userGroupSuccessUpdate']."',
            'UserGroupSuccessDelete'            => '".$arrayData['userGroupSuccessDelete']."',
            'UserGroupNameError'                => '".$arrayData['userGroupNameError']."',
            'UserGroupStatusError'              => '".$arrayData['userGroupStatusError']."',
            'PermissionUserGroupEditError'      => '".$arrayData['permissionUserGroupEditError']."',
        // Languages
            'TranslationPage'                   => '".$arrayData['translationPage']."',
            'LanguageTitle'                     => '".$arrayData['languageTitle']."',
            'ShortName'                         => '".$arrayData['shortName']."',
            'Flag'                              => '".$arrayData['flag']."',
            'LanguageStatus'                    => '".$arrayData['languageStatus']."',
            'CreationDate'                      => '".$arrayData['creationDate']."',
            'DefaultLanguage'                   => '".$arrayData['defaultLanguage']."',
            'TranslateSuccessSave'              => '".$arrayData['translateSuccessSave']."',
            'LanguageSuccessSave'               => '".$arrayData['languageSuccessSave']."',
            'SweetalertTitle'                   => '".$arrayData['sweetalertTitle']."',
            'SweetalertText'                    => '".$arrayData['sweetalertText']."',
            'ConfirmButtonText'                 => '".$arrayData['confirmButtonText']."',
            'CancelButtonText'                  => '".$arrayData['cancelButtonText']."',
            'LanguageSuccessDelete'             => '".$arrayData['languageSuccessDelete']."',
            
            
            
            
            
        ];
        ?>";
                        fwrite($file,$txt);
                        fclose($file);
        
                    }

        $this->translateModel->updateTranslate($data,$id);

        return redirect()->to(base_url($this->viewData['locale'].'/language-translate'.'/'.$id))->with('successUpdate',Lang('Text.TranslateSuccessSave'));;


    }

    public function languageSelectedChange()
    {
        $id = $this->request->getPost('id');
        $idSelected = $this->request->getPost('idSelected');
        $shortSelected = $this->request->getPost('shortSelected');

        $firstData = array(
            'language_selected' => 0
        );

        $this->languageModel->updateLanguageSelectNoId($firstData);

        $data = array(
            'language_selected' => ($idSelected == 0) ? 1 : 0
        );
  
        $this->languageModel->updateLanguageSelect($data,$id);

        $loggedUserId = session()->get('loggedUser');

        $sessionData = [
            'user_id' => $loggedUserId['user_id'],
            'group_id' => $loggedUserId['group_id'],
            'email' => $loggedUserId['email'],
            'status' => $loggedUserId['status'],
            'username' => $loggedUserId['username'],
            'dark_mode' => $loggedUserId['dark_mode'],
            'locale' => $shortSelected
        ];

        session()->set('loggedUser', $sessionData);

        echo $newUrl = base_url($shortSelected.'/language-lists');

    }

}
