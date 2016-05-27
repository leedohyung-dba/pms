// <?php
// namespace App\Controller\Component;
// use Cake\Controller\Component;
// use App\Statics\NssAcl;
// class NssAclComponent extends Component
// {
//     public $components = ['RequestHandler', 'Flash'];
//     public function initialize(array $config)
//     {
//         $this->aclCheck();
//     }
//     /**
//      * aclCheck.
//      *
//      * @SuppressWarnings(PHPMD.ExitExpression)
//      */
//     public function aclCheck()
//     {
//         $controller = $this->_registry->getController();
//         $action = strtolower($controller->request->params['action']);
//         if (!$controller->isAction($action)) {
//             return;
//         }
//         if (NssAcl::check(['controller' => $controller->name, 'action' => $action])) {
//             return;
//         }
//         $message = NssAcl::errorMessage(['controller' => $controller->name, 'action' => $action]);
//         $this->Flash->error($message);
//         $this->response = $controller->redirect(['controller' => 'Dashboards', 'action' => 'index']);
//         $this->response->send();
//         exit;
//     }
// }