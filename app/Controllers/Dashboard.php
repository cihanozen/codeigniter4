<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index()
    {
        
        $userModel = new \App\Models\UsersModel();
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserId);

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'locale' => $this->viewData['locale'],
            'uri' => $this->viewData['uri']
        ];

        return view('Panel/Dashboard_v', $data);
     
    }

    public function dark_mode()
    {

        $dark_mode = session()->get('loggedUser')['dark_mode'];

        if($dark_mode == 0)
        {
            $_SESSION['loggedUser']['dark_mode'] = 1;
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
        else
        {
            $_SESSION['loggedUser']['dark_mode'] = 0;
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }

    }

}
