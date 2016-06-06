<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Validation;

/**
 * Users Model
 *
 */
class UsersTable extends AppTable
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('username');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator->provider('user', Validation\UserValidation::class);

        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->notEmpty('username', __('required'))
            ->add(
                'username', 
                ['unique' => [
                    'rule' => 'validateUnique', 
                    'provider' => 'table', 
                    'message' => 'This value is already in use']
                ]
            );

        $validator
            ->notEmpty('password', __('required'));

        $validator
            ->notEmpty('name', __('required'));

        $validator
            ->allowEmpty('name_kana');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        // パスワード
        $validator
        ->notEmpty('password', __('required'))
        ->add('password', 'valid', [
            'rule' => 'isAlphaNumeric',
            'message' => __('alpha numeric must be valid'),
            'provider' => 'user'
        ])
        // 確認用パスワード
        ->notEmpty('password_confirm', __('required'))
        ->add('password_confirm', 'valid', [
            'rule' => 'isAlphaNumeric',
            'message' => __('alpha numeric must be valid'),
            'provider' => 'user'
        ])
        ->add('password_confirm', 'valid', [
            'rule' => 'isPasswordConfirm',
            'message' => __('password is incorrect for confirmation'),
            'provider' => 'user'
        ]);

        return $validator;
    }

    /**
     * Search Rules.
     *
     * @return Search Query
     */
    public function searchConfiguration()
    {
        $search = new Manager($this);
        $search
        ->value('id', [
            'field' => $this->aliasField('id')
        ])
        // ->callback('companyword', [
        //     'callback' => function ($query, $args, $manager) {
        //         $ids = TableRegistry::get('Companies')->getCompaniesIds($args['companyword']);
        //         $query->andWhere(['company_id IN' => $ids]);
        //     }
        // ])
        ->like('username', [
            'before' => true,
            'after' => true,
            'field' => [$this->aliasField('username')]
        ])
        ->value('admin_flag', [
            'field' => $this->aliasField('mst_project_type_id')
        ])
        ->value('mst_project_status_id', [
            'field' => $this->aliasField('mst_project_status_id')
        ]);
        return $search;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {   //uniqueチェック
        $rules->add($rules->isUnique(['username']));
        return $rules;
    }

    /**
     * set Update Password Flag.
     *
     * @return $data
     */
    public function setUpdatePasswordFlag($data)
    {
        if ( empty($data['User']['update_password_flag']) ) {
            // update_password_flagが未チェックであればバリデーションを実行しないようにカラムを削除する
            unset($data['User']['password']);
            unset($data['User']['password_confirm']);
        }
        return $data;
    }
}
