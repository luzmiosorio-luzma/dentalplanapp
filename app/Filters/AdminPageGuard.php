<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminPageGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ((string) session()->get('role') !== '1') {
            return redirect()->to('user');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}
