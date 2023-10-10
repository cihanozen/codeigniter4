<?php

namespace App\Controllers;

class UserGroup extends BaseController
{

    private $userModel;
    private $userGroupModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\UsersModel();
        $this->userGroupModel = new \App\Models\UsersGroupModel();
    }

    public function index()
    {

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

        return view('Panel/Group/GroupUser_v', $data);

    }

    public function userGroupLists()
    {

        $uri = service('uri');
        $locale = $this->request->getLocale();

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);
        $users = $this->userModel->getUser();

        $userGroups = $this->userGroupModel->getUserGroup();

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'locale' => $locale,
            'users' => $users,
            'userGroups' => $userGroups,
            'uri' => $uri
        ];

        return view('Panel/Group/GroupUserLists_v', $data);
    }

    public function userGroupPermission()
    {

        $uri = service('uri');
        $locale = $this->request->getLocale();
        
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);
        $userGroupLists = $this->userGroupModel->findAll();

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'userGroupLists' => $userGroupLists,
            'locale' => $locale,
            'uri' => $uri
        ];


        return view('Panel/Group/GroupUserPermission_v', $data);
    }

    public function userGroupAdd()
    {
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

        return view('Panel/Group/GroupUserAdd_v', $data);
    }

    public function userGroupSave()
    {

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);
        
        //$validation = \Config\Services::validation();
        $check = $this->validate([
            'group_name' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => Lang('Text.UserGroupNameError')
                ]
            ],
            'group_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => Lang('Text.UserGroupStatusError')
                ]
            ]

        ]);

        if(!$check)
        {
            return view('Panel/Group/GroupUserAdd_v', [
              'username' => @$userInfo['username'],
              'email' => @$userInfo['email'],
              'locale' => $this->viewData['locale'],
              'uri' => $this->viewData['uri'],
              'errors' => $this->validator->getErrors()
            ]);
        
        }
        else
        {

            $permission = json_encode($this->request->getPost());
    
            $data = array(
                'group_name' => $this->request->getPost('group_name'),
                'group_status' => $this->request->getPost('group_status'),
                'group_permission' => $permission
            );

            $send = $this->userGroupModel->saveUserGroup($data);

            if($send){
                return redirect()->to(base_url($this->viewData['locale'].'/'.'user-group-lists'))->with('successAdd', Lang('Text.UserGroupSuccessSave'));
            }

        }
    }

    public function userGroupEdit($id)
    {

        if($id == 1)
        {
            return redirect()->to(base_url($this->viewData['locale'].'/user-group-lists'))->with('permissionError', Lang('Text.AdminPermissionError'));
        }

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);

        $data['userGroup'] = $this->userGroupModel->getUserGroup($id)->getRow();

        $permissions = $data['userGroup']->group_permission;

        $data['permissions'] = json_decode($permissions,true);
        $data['locale'] = $this->request->getLocale();
        $data['uri'] = service('uri');
        $data['username'] = @$userInfo['username'];
    
        echo view('Panel/Group/GroupUserEdit_v',$data);
        
    }

    public function userGroupUpdate($id)
    {

        $permission = json_encode($this->request->getPost());
    
        $locale = $this->request->getLocale();

        $uri = service('uri');

        $data = array(
            'group_name' => $this->request->getPost('group_name'),
            'group_status' => $this->request->getPost('group_status'),
            'group_permission' => ($this->request->getPost('group_status') == 1) ? $permission : '' ,
        );

        $this->userGroupModel->updateUserGroup($data,$id);

        return redirect()->to(base_url($this->request->getLocale().'/user-group-lists'))->with('successUpdate',Lang('Text.UserGroupSuccessUpdate'));
       
    }

    public function userGroupDelete($id)
    {

        $this->userGroupModel->deleteUserGroup($id);

        return redirect()->to(base_url($this->request->getLocale().'/user-group-lists'))->with('successDelete',Lang('Text.UserGroupSuccessDelete'));

    }

}
