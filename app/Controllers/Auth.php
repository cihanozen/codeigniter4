<?php

namespace App\Controllers;

use CodeIgniter\Controller;
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
    
        // Eğer post varsa bu kısım çalışıyor!
        if ($this->request->is('post')) 
        {

            //Tüm kuralları ve hataları App>Config>Validation.php içerisine aldım.
            $validation = \Config\Services::validation();

            // View'den gönderilen input datalarını bir arraya aldım.
            $data = [
                'email'     => $this->request->getPost('email'),
                'password'  => $this->request->getPost('password')
            ];

            // Gelen dataları userRules adını verdiğim kısıma gönderip kontrol edilmesini sağladım.
            // Eğer datalar girilen kurallara uymuyorsa giriş sayfasına gönder ve hataları göster yaptım.
            if(!$validation->run($data,'userRules'))
            {
                return view('Panel/Login_v', [
                    'validation' => $validation->getErrors()
                ]);
            }
            else
            {

                // Validate işleminden geçtik şimdi formdan gelen datayı kontrol ediyorum.
                // Model dosyamı kullanmak için buraya aldım.
                $usersModel     = new \App\Models\UsersModel();
                $user_info      = $usersModel->where('email', $data['email'])->first();
                $check_password = Hash::check($data['password'], Hash::make($user_info['password']));
    
                // DB'den gelen şifre ile formdan gelen şifre ile uyuşuyor mu kontrol ettim.
                if(!$check_password)
                {
                    session()->setFlashdata('fail','Şifre Hatalı!');
                    return redirect()->to('/')->withInput();
                }
                else
                {
                    $user_id = $user_info['id'];
                    $userGroup_id = $user_info['group_id'];
                    $user_email = $user_info['email'];
                    $username = $user_info['username'];
                    $status = $user_info['status'];

                    $sessionData = [
                        'user_id' => $user_id,
                        'group_id' => $userGroup_id,
                        'email' => $user_email,
                        'status' => $status,
                        'username' => $username,
                        'locale' => service('request')->getLocale(),
                        'dark_mode' => 0
                    ];

                    session()->set('loggedUser', $sessionData);

                    // Locale BaseController içerisinden geliyor ve sayfayı yönlendiriyoruz.
                    return redirect()->to($this->viewData['locale'].'/dashboard');
                }

            }

        }

    }

    public function logout()
    {

        // Eğer bir session varsa çalışacak alan!
        if(session()->has('loggedUser'))
        {
            // loggedUser isimli session kaldırıldı ve oturumdan çıkış yapıldı!
            session()->remove('loggedUser');
            return redirect()->to('/')->with('fail','Oturumu Kapattınız!');
        }
    }

}
