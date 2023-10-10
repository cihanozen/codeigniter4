<?php

namespace App\Controllers;

class User extends BaseController
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

        return view('Panel/User/User_v', $data);

    }

    public function userLists()
    {

        $uri = service('uri');
        $locale = $this->request->getLocale();

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);
        $users = $this->userModel->getUser();

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'locale' => $locale,
            'users' => $users,
            'uri' => $uri
        ];

        return view('Panel/User/UserLists_v', $data);
    }

    public function userAdd()
    {
        $uri = service('uri');
        $locale = $this->request->getLocale();

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);
        $userGroup = $this->userGroupModel->getUserGroup();

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'userGroupLists' => $userGroup,
            'locale' => $locale,
            'uri' => $uri
        ];

        return view('Panel/User/UserAdd_v', $data);
    }

    public function userSave()
    {

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);
        $userGroup = $this->userGroupModel->getUserGroup();

        //$validation = \Config\Services::validation();
        $check = $this->validate([
            'username' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => Lang('Text.UsernameError')
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => Lang('Text.PasswordError')
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => Lang('Text.PasswordError'),
                    'valid_email' => Lang('Text.ValidEmailError'),
                    'is_unique' => Lang('Text.IsUniqueEmailError')
                ]
            ],
            'status'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => Lang('Text.StatusError')
                ]
            ],
            'group_id'  => [
                'rules' => 'required',
                'errors' => [
                       'required' => Lang('Text.GroupNameError')
                ]
            ]
        ]);

        if(!$check)
        {

            return view('Panel/User/UserAdd_v', [
              'username' => @$userInfo['username'],
              'email' => @$userInfo['email'],
              'userGroupLists' => $userGroup,
              'locale' => $this->viewData['locale'],
              'uri' => $this->viewData['uri'],
              'errors' => $this->validator->getErrors()
            ]);
            
        }
        else
        {

            $data = array(
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'email'    => $this->request->getPost('email'),
                'user_bio' => $this->request->getPost('user_bio'),
                'group_id' => $this->request->getPost('group_id'),
                'status'   => $this->request->getPost('status')
            );

            $send = $this->userModel->saveUser($data);

            if($send){
                return redirect()->to(base_url($this->viewData['locale'].'/'.'user-lists'))->with('successAdd', Lang('Text.SuccessSave'));
            }

        }
    }

    public function userEdit($id)
    {

        //$user_id = session()->get('loggedUser')['user_id'];
        
        if($id == 1)
        {
            return redirect()->to(base_url($this->viewData['locale'].'/user-lists'))->with('successDelete', Lang('Text.AdminPermissionError'));
        }
    
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);
        $userGroup = $this->userGroupModel->getUserGroup();

        $data['user'] = $this->userModel->getUser($id)->getRow();
        $data['userGroupLists'] = $this->userGroupModel->getUserGroup();
        $data['locale'] = $this->request->getLocale();
        $data['uri'] = service('uri');
        $data['username'] = @$userInfo['username'];
    
        echo view('Panel/User/UserEdit_v',$data);
    }

    public function userUpdate($id)
    {
        
        if(!isAllowedModules("user_edit_p")){
            
            return redirect()->to(base_url($this->viewData['locale'].'/user-lists'))->with('successDelete', Lang('Text.PermissionEditError'));
        
        }else{

            $data = array(
                'username'  => $this->request->getPost('username'),
                'email'     => $this->request->getPost('email'),
                'user_bio'  => $this->request->getPost('user_bio'),
                'group_id'  => $this->request->getPost('group_id'),
                'status'    => $this->request->getPost('status')
            );

            $this->userModel->updateUser($data,$id);

            return redirect()->to(base_url($this->viewData['locale'].'/user-lists'))->with('successUpdate',Lang('Text.SuccessDelete'));
           
        }
        


    }

    public function userDelete($id)
    {

        $this->userModel->deleteUser($id);

        return redirect()->to(base_url($this->viewData['locale'].'/user-lists'))->with('successDelete',Lang('Text.SuccessDelete'));

    }

}
