<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoLoginCheckFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
       
        $locale = service('request')->getLocale();

        if(session()->has('loggedUser'))
        {
            return redirect()->to($locale.'/dashboard');
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}