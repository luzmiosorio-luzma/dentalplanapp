<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $allowedRoles = $arguments ?? [];
        $userRole = (string) session()->get('role');

        if (!in_array($userRole, $allowedRoles, true)) {
            return service('response')
                ->setStatusCode(403)
                ->setJSON(['status' => 'error', 'message' => 'No autorizado']);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}
