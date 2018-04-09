<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stations Model
 *
 * @property \App\Model\Table\AccesslogsTable|\Cake\ORM\Association\HasMany $Accesslogs
 *
 * @method \App\Model\Entity\Station get($primaryKey, $options = [])
 * @method \App\Model\Entity\Station newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Station[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Station|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Station patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Station[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Station findOrCreate($search, callable $callback = null, $options = [])
 */
class StationsTable extends Table
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

        $this->setTable('stations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Accesslogs', [
            'foreignKey' => 'station_id'
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('accessLevelRequired')
            ->maxLength('accessLevelRequired', 3)
            ->requirePresence('accessLevelRequired', 'create')
            ->notEmpty('accessLevelRequired');

        $validator
            ->scalar('stationKey')
            ->maxLength('stationKey', 255)
            ->requirePresence('stationKey', 'create')
            ->notEmpty('stationKey');

        return $validator;
    }
}
