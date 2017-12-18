<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accesslogs Model
 *
 * @property \App\Model\Table\CardsTable|\Cake\ORM\Association\BelongsTo $Cards
 * @property \App\Model\Table\StationsTable|\Cake\ORM\Association\BelongsTo $Stations
 *
 * @method \App\Model\Entity\Accesslog get($primaryKey, $options = [])
 * @method \App\Model\Entity\Accesslog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Accesslog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Accesslog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accesslog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Accesslog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Accesslog findOrCreate($search, callable $callback = null, $options = [])
 */
class AccesslogsTable extends Table
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

        $this->setTable('accesslogs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cards', [
            'foreignKey' => 'card_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Stations', [
            'foreignKey' => 'station_id',
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
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('time_accessed')
            ->requirePresence('time_accessed', 'create')
            ->notEmpty('time_accessed');

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
        $rules->add($rules->existsIn(['card_id'], 'Cards'));
        $rules->add($rules->existsIn(['station_id'], 'Stations'));

        return $rules;
    }
}
