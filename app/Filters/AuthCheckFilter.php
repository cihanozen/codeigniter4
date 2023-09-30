<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthCheckFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
       
        $locale = service('request')->getLocale();
        
        if(!session()->has('loggedUser'))
        {
            return redirect()->to($locale.'/')->with('fail', 'Oturum açmadan bu sayfaya giremezsiniz!');
        }
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}