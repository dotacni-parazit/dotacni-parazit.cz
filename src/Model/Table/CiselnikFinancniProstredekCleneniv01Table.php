<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikFinancniProstredekCleneniv01 Model
 *
 * @method \App\Model\Entity\CiselnikFinancniProstredekCleneniv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikFinancniProstredekCleneniv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikFinancniProstredekCleneniv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikFinancniProstredekCleneniv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikFinancniProstredekCleneniv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikFinancniProstredekCleneniv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikFinancniProstredekCleneniv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikFinancniProstredekCleneniv01Table extends Table
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

        $this->setTable('ciselnikFinancniProstredekCleneniv01');
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
            ->decimal('financniProstredekCleneniKod')
            ->requirePresence('financniProstredekCleneniKod', 'create')
            ->notEmpty('financniProstredekCleneniKod');

        $validator
            ->requirePresence('financniProstredekCleneniNazev', 'create')
            ->notEmpty('financniProstredekCleneniNazev');

        $validator
            ->dateTime('zaznamPlatnostOdDatum')
            ->requirePresence('zaznamPlatnostOdDatum', 'create')
            ->notEmpty('zaznamPlatnostOdDatum');

        $validator
            ->date('zaznamPlatnostDoDatum')
            ->requirePresence('zaznamPlatnostDoDatum', 'create')
            ->notEmpty('zaznamPlatnostDoDatum');

        return $validator;
    }
}
