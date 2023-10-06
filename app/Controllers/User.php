<?php

namespace App\Controllers;

class User extends BaseController
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\UsersModel();
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

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'locale' => $locale,
            'uri' => $uri
        ];

        return view('Panel/User/UserAdd_v', $data);
    }

    public function userSave()
    {

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);
        
        //$validation = \Config\Services::validation();
        $check = $this->validate([
            'username' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => Lang('Text.Users.Add.Error.Username')
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => Lang('Text.Users.Add.Error.Password')
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => Lang('Text.Users.Add.Error.Email'),
                    'valid_email' => Lang('Text.Users.Add.Error.ValidEmail'),
                    'is_unique' => Lang('Text.Users.Add.Error.IsUnique')
                ]
            ],
            'status'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => Lang('Text.Users.Add.Error.Status')
                ]
            ],
            'group_id'  => [
                'rules' => 'required',
                'errors' => [
                       'required' => Lang('Text.Users.Add.Error.Group')
                ]
            ]
        ]);

        if(!$check)
        {


            return view('Panel/User/UserAdd_v', [
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
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'email'    => $this->request->getPost('email'),
            'user_bio' => $this->request->getPost('user_bio'),
            'group_id' => $this->request->getPost('group_id'),
            'status'   => $this->request->getPost('status')
        );

        $send = $this->userModel->saveUser($data);

        if($send){
            return redirect()->to(base_url($this->viewData['locale'].'/'.'user-lists'))->with('successAdd', Lang('Text.Users.Add.Success'));
        }

        
        }
    }

    public function userEdit($id)
    {
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);

        $data['user'] = $this->userModel->getUser($id)->getRow();
        $data['locale'] = $this->request->getLocale();
        $data['uri'] = service('uri');
        $data['username'] = @$userInfo['username'];
    
        echo view('Panel/User/UserEdit_v',$data);
    }

    public function userUpdate($id)
    {

        $data = array(
            'username'  => $this->request->getPost('username'),
            'password'  => $this->request->getPost('password'),
            'email'     => $this->request->getPost('email'),
            'user_bio'  => $this->request->getPost('user_bio'),
            'group_id'  => $this->request->getPost('group_id'),
            'status'    => $this->request->getPost('status')
        );

        $this->userModel->updateUser($data,$id);

        return redirect()->to(base_url($this->viewData['locale'].'/user-lists'))->with('successUpdate',Lang('Text.Users.Edit.Success'));
       
    }

    public function userDelete($id)
    {

        $this->userModel->deleteUser($id);

        return redirect()->to(base_url($this->viewData['locale'].'/user-lists'))->with('successDelete',Lang('Text.Users.Delete.Success'));

    }

}
