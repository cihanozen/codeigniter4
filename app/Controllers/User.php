<?php

namespace App\Controllers;

class User extends BaseController
{

    public function index()
    {

        $locale = $this->request->getLocale();
        $userModel = new \App\Models\UsersModel();
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserId);

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'locale' => $locale
        ];

        return view('Panel/User_v', $data);

    }

    public function userLists()
    {
        echo "Kullanıcı Listesi Sayfası";
    }


}
