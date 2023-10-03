<?php

namespace App\Controllers;

class UserGroup extends BaseController
{

    public function index()
    {

        $uri = service('uri');
        $locale = $this->request->getLocale();
        $userModel = new \App\Models\UsersModel();
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserId);

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

        $userModel = new \App\Models\UsersModel();
        $userGroupModel = new \App\Models\UsersGroupModel();
        
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserId);
        $users = $userModel->getUser();

        $userGroups = $userGroupModel->getUserGroup();

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

    public function userGroupAdd()
    {
        $uri = service('uri');
        $locale = $this->request->getLocale();

        $userModel = new \App\Models\UsersModel();
        $userGroupModel = new \App\Models\UsersGroupModel();

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserId);

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
        $userModel = new \App\Models\UsersModel();
        $userGroupModel = new \App\Models\UsersGroupModel();
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserId);
        $users = $userModel->getUser();
        
        //$validation = \Config\Services::validation();
        $check = $this->validate([
            'group_name' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => Lang('Text.UsersGroup.Error.GroupName')
                ]
            ],
            'group_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => Lang('Text.UsersGroup.Error.GroupStatus')
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

            $data = array(
                'group_name' => $this->request->getPost('group_name'),
                'group_status' => $this->request->getPost('group_status')
            );

            $send = $userGroupModel->saveUserGroup($data);

            if($send){
                return redirect()->to(base_url($this->viewData['locale'].'/'.'user-group-lists'))->with('successAdd', Lang('Text.UsersGroup.Add.Success'));
            }

        }
    }

    public function userGroupEdit($id)
    {
        
        $userModel = new \App\Models\UsersModel();
        $userGroupModel = new \App\Models\UsersGroupModel();

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserId);

        $data['userGroup'] = $userGroupModel->getUserGroup($id)->getRow();
        $data['locale'] = $this->request->getLocale();
        $data['uri'] = service('uri');
        $data['username'] = @$userInfo['username'];
    
        echo view('Panel/Group/GroupUserEdit_v',$data);
        
    }

    public function userGroupUpdate($id)
    {


        $userModel = new \App\Models\UsersModel();
        $userGroupModel = new \App\Models\UsersGroupModel();

        $locale = $this->request->getLocale();

        $uri = service('uri');

        $data = array(
            'group_name' => $this->request->getPost('group_name'),
            'group_status' => $this->request->getPost('group_status')
        );

        $userGroupModel->updateUserGroup($data,$id);

        return redirect()->to(base_url($this->request->getLocale().'/user-group-lists'))->with('successUpdate',Lang('Text.UsersGroup.Edit.Success'));
       
    }

    public function userGroupDelete($id)
    {

        $userGroupModel = new \App\Models\UsersGroupModel();
        $userGroupModel->deleteUserGroup($id);

        return redirect()->to(base_url($this->request->getLocale().'/user-group-lists'))->with('successDelete',Lang('Text.UsersGroup.Delete.Success'));

    }


}
