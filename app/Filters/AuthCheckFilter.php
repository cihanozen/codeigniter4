<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthCheckFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        $uri = service('uri');
        $locale = service('request')->getLocale();
        $status = @session()->get('loggedUser')['status'];
        
        if(!session()->has('loggedUser'))
        {
            return redirect()->to(base_url($locale))->with('fail', 'Oturum açmadan bu sayfaya giremezsiniz!');
        }

        if($status == 0)
        {
            session()->remove('loggedUser');
            return redirect()->to(base_url('/'))->with('fail','Oturum açma yetkiniz yok!');
        }
        
        if($uri->getSegment(2) == "")
        {
            session()->remove('loggedUser');
            return redirect()->to(base_url('/'));
        }
  
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}