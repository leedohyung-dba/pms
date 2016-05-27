<?php
namespace App\Controller\Component;
use Cake\Controller\Component\AuthComponent;
class NssAuthComponent extends AuthComponent
{
    protected $_defaultConfig = [
        'authenticate' => [
            'Form' => [
                'userModel' => 'Users',
                'fields' => [
                    'username' => 'username',
                    'password' => 'password',
                ],
            ],
        ],
        'loginAction' => [
            'controller' => 'users',
            'action' => 'login',
        ],
        'loginRedirect' => [
            'controller' => 'users',
            'action' => 'index',
        ],
        'authorize' => null,
        'ajaxLogin' => null,
        'flash' => null,
        'logoutRedirect' => null,
        'authError' => null,
        'unauthorizedRedirect' => true,
        'storage' => 'Session',
        'checkAuthIn' => 'Controller.startup',
    ];
}