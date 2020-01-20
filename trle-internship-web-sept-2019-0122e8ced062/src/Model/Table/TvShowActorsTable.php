<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TvShowActors Model
 *
 * @property \App\Model\Table\ActorsTable&\Cake\ORM\Association\BelongsTo $Actors
 * @property \App\Model\Table\TvShowsTable&\Cake\ORM\Association\BelongsTo $TvShows
 *
 * @method \App\Model\Entity\TvShowActor get($primaryKey, $options = [])
 * @method \App\Model\Entity\TvShowActor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TvShowActor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TvShowActor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TvShowActor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TvShowActor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TvShowActor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TvShowActor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TvShowActorsTable extends Table
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

        $this->setTable('tv_show_actors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Actors', [
            'foreignKey' => 'actors_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TvShows', [
            'foreignKey' => 'tv_shows_id',
            'joinType' => 'INNER'
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
            ->scalar('role')
            ->maxLength('role', 20)
            ->requirePresence('role', 'create')
            ->notEmptyString('role');

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
        $rules->add($rules->existsIn(['actors_id'], 'Actors'));
        $rules->add($rules->existsIn(['tv_shows_id'], 'TvShows'));

        return $rules;
    }
}
