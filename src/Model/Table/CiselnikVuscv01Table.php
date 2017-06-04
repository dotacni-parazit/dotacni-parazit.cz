<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikVuscv01 Model
 *
 * @method \App\Model\Entity\CiselnikVuscv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikVuscv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikVuscv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikVuscv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikVuscv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikVuscv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikVuscv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikVuscv01Table extends Table
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

        $this->setTable('ciselnikVuscv01');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->decimal('vuscKod')
            ->requirePresence('vuscKod', 'create')
            ->notEmpty('vuscKod');

        $validator
            ->requirePresence('krajNutsKod', 'create')
            ->notEmpty('krajNutsKod');

        $validator
            ->requirePresence('vuscNazev', 'create')
            ->notEmpty('vuscNazev');

        $validator
            ->decimal('globalniNavrhZmenaIdentifikator')
            ->requirePresence('globalniNavrhZmenaIdentifikator', 'create')
            ->notEmpty('globalniNavrhZmenaIdentifikator');

        $validator
            ->boolean('nespravnostIndikator')
            ->requirePresence('nespravnostIndikator', 'create')
            ->notEmpty('nespravnostIndikator');

        $validator
            ->decimal('transakceIdentifikator')
            ->allowEmpty('transakceIdentifikator');

        $validator
            ->dateTime('zaznamPlatnostOdDatum')
            ->requirePresence('zaznamPlatnostOdDatum', 'create')
            ->notEmpty('zaznamPlatnostOdDatum');

        $validator
            ->dateTime('zaznamPlatnostDoDatum')
            ->requirePresence('zaznamPlatnostDoDatum', 'create')
            ->notEmpty('zaznamPlatnostDoDatum');

        return $validator;
    }
}
