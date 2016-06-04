<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use UsersDefine;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public $paginate = ['limit' => '5', 'order' => ['Users.id' => 'asc']];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow([
            'login',
            'setup',
        ]);
    }

    public function setup()
    {
        $this->viewBuilder()->layout('login');
        $pageTitle = 'セットアップ';
        $adminFlag = UsersDefine::ADMIN_FLAG;
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The data has been saved.'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The data could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user', 'pageTitle', 'adminFlag'));
        $this->set('_serialize', ['user']);
    }

    public function login()
    {
        $this->viewBuilder()->layout('login');
        $pageTitle = 'ログイン';
        $user = $this->Users->newEntity();
        // ユーザーが一人もDBに登録されていなければ登録してもらう
        if ($this->Users->find()->count() === 0) {
            $this->redirect(['action' => 'setup']);
        }
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(
                    __('Username or password is incorrect'),
                    'default',
                    [],
                    'auth'
                );
            }
        }
        $this->set(compact('pageTitle', 'user'));
    }
    
    /**
     * logout.
     *
     * @access public
     * @author hayasaki
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $pageTitle = 'ユーザー一覧';
        $this->viewBuilder()->layout('default');
        $users = $this->paginate($this->Users);
        $this->set(compact('users', 'pageTitle'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
