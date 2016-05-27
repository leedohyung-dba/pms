<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Utility\Inflector;
use App\Statics\UserInfo;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = [
        'Auth' => [
            'className' => 'NssAuth',
        ],
    ];
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Altair.Altair');
        $this->loadComponent('PropertyEnum.AutoSet');
        if ($this->request->action === 'index') {
            $this->loadComponent('Search.Prg');
        }
    }

    /**
     * Before Filter callback.
     *
     * @param \Cake\Event\Event $event The beforeFilter event.
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $baseUrl = Router::url('/');
        $this->set(compact('baseUrl'));
        // ログイン情報を取得
        $loginUser = $this->Auth->user();
        // ユーザーIDをStatic領域で保持
        UserInfo::$id = $loginUser['id'];
        // $this->loadComponent('NssAcl'); // @MEMO UserInfo::$idを設定してから
    }
}
