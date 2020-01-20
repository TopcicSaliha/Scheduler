<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TvShows Model
 *
 * @method \App\Model\Entity\TvShow get($primaryKey, $options = [])
 * @method \App\Model\Entity\TvShow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TvShow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TvShow|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TvShow saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TvShow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TvShow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TvShow findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TvShowsTable extends Table
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

        $this->setTable('tv_shows');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->belongsToMany('Genres', [
            'joinTable' => 'tv_shows_genre',
            'foreignKey' => 'tv_shows_id',
            'bindingKey' => 'id',
            'targetForeignKey' => 'genres_id'
        ]);

        $this->hasMany('Seasons', [
            'foreignKey' => 'tv_shows_id'

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
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('year')
            ->requirePresence('year', 'create')
            ->notEmptyString('year');

        $validator
            ->integer('duration')
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

        $validator
            ->scalar('cover')
            ->maxLength('cover', 255)
            ->requirePresence('cover', 'create')
            ->notEmptyString('cover');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('updated_by')
            ->allowEmptyString('updated_by');

        return $validator;
    }
}
