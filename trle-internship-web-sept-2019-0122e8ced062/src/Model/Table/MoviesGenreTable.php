<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MoviesGenre Model
 *
 * @property \App\Model\Table\GenresTable&\Cake\ORM\Association\BelongsTo $Genres
 * @property \App\Model\Table\MoviesTable&\Cake\ORM\Association\BelongsTo $Movies
 *
 * @method \App\Model\Entity\MoviesGenre get($primaryKey, $options = [])
 * @method \App\Model\Entity\MoviesGenre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MoviesGenre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MoviesGenre|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoviesGenre saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoviesGenre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MoviesGenre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MoviesGenre findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MoviesGenreTable extends Table
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

        $this->setTable('movies_genre');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Genres', [
            'foreignKey' => 'genres_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Movies', [
            'foreignKey' => 'movies_id',
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
        $rules->add($rules->existsIn(['genres_id'], 'Genres'));
        $rules->add($rules->existsIn(['movies_id'], 'Movies'));

        return $rules;
    }
}
