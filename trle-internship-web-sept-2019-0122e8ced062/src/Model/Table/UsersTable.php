<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use phpDocumentor\Reflection\Types\Context;
use function Sodium\add;

/**
 * Users Model
 *
 * @property \App\Model\Table\SchedulersTable&\Cake\ORM\Association\HasMany $Schedulers
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Proffer.Proffer', [
            'image' => [
                'root' => WWW_ROOT . 'image_dir',
                'dir' => 'image_dir',
                'thumbnailSizes' => [
                    'small' => [
                        'w' => 200,
                        'h' => 200,
                        'jpeg_quality'	=> 100
                    ],
                    'large' => [
                        'w' => 100,
                        'h' => 300
                    ],
                ],
                'thumbnailMethod' => 'gd'
            ]
        ]);

        $this->hasMany('Schedulers', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 20)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 20)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->date('date_of_birth')
            ->allowEmptyDate('date_of_birth');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 10)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->allowEmptyString('password', 'null', 'update')
            ->requirePresence('password', 'create')
            ->add('password', [
                'match' => [
                    'rule' => ['compareWith', 'confirm_password'],
                    'message' => ('The passwords do not match!'),
                    'on' => function ($context) {
                        return !empty($context['data']['password']);
                    }
                ]
            ]);

        $validator
            ->add('image', 'type', [
                'rule' => function($value, $context)
                {
                    if($value['name'] === '')
                        return true;

                    $type = $value['type'];

                    $allowedTypes = ['image/png', 'image/gif', 'image/jpeg'];

                    if(in_array($type, $allowedTypes)) {
                        return true;
                    }
                    return false;
                },
                'message' => 'Allowed image types are: png, jpeg and gif.',
            ]);

        $validator
            ->add('image', 'size', [
                'rule' => function($value, $context)
                {
                    if($value['name'] === '')
                        return true;

                    $size = $value['size'];
                    $allowedSize = 10485760;

                    if($size <= $allowedSize) {
                        return true;
                    }
                        return false;
                },
                'message' => 'Max allowed image size is 10MB.',
            ]);


        $validator
            ->boolean('is_active')
            ->allowEmptyString('is_active');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('updated_by')
            ->allowEmptyString('updated_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
