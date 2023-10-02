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


}
