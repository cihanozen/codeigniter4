<?php

namespace App\Controllers;

use \App\Models\UsersModel;
use \App\Libraries\Hash;

class Auth extends BaseController
{

    public function index()
    {
        return view('Panel/Login_v');
    }

    public function control()
    {
        

        $validation = \Config\Services::validation();

        $check = $this->validate([
            'email' => [
                'rules'     => 'required|valid_email|is_not_unique[users.email]',
                'errors'    => [
                    'required' => 'Email boş bırakılamaz!',
                    'valid_email' => 'Geçerli bir mail adresi yazmadınız!',
                    'is_not_unique' => 'Bu mail adresi kayıtlı değil!'
                ]
            ],
            'password' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => 'Şifre boş bırakılamaz!'
                ]
            ]
        ]);

        if(!$check)
        {
            return view('Panel/Login_v', ['validation' => $this->validator]);
        }
        else
        {

            $email          = $this->request->getPost('email');
            $password       = $this->request->getPost('password');
            $usersModel     = new \App\Models\UsersModel();
            $user_info      = $usersModel->where('email', $email)->first();
            $check_password = Hash::check($password, Hash::make($user_info['password']));

            if(!$check_password)
            {
                session()->setFlashdata('fail','Şifre Hatalı!');
                return redirect()->to('/')->withInput();
            }
            else
            {

                $locale = service('request')->getLocale();

                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to($locale.'/dashboard');
            }

        }

    }

    public function logout()
    {
        if(session()->has('loggedUser'))
        {
            session()->remove('loggedUser');
            return redirect()->to('/')->with('fail','Oturumu Kapattınız!');
        }
    }

}
