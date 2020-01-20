<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Seasons Model
 *
 * @property \App\Model\Table\TvShowsTable&\Cake\ORM\Association\BelongsTo $TvShows
 *
 * @method \App\Model\Entity\Season get($primaryKey, $options = [])
 * @method \App\Model\Entity\Season newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Season[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Season|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Season saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Season patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Season[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Season findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SeasonsTable extends Table
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

        $this->setTable('seasons');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TvShows', [
            'foreignKey' => 'tv_shows_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Episodes', [
            'foreignKey' => 'seasons_id'
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
            ->scalar('title')
            ->maxLength('title', 20)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

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
        $rules->add($rules->existsIn(['tv_shows_id'], 'TvShows'));

        return $rules;
    }
}
