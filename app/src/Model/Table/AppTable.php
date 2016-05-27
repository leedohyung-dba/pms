<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
/**
 * App Model.
 */
class AppTable extends Table
{
    /**
     * Initialize method.
     *
     * @param array $config The configuration for the Table.
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Reincarnation.SoftDelete', ['boolean' => false, 'timestamp' => 'deleted']);
        $this->addBehavior('Search.Search');
    }
}