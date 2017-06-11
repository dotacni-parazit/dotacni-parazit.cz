<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikFinancniZdrojv01 Model
 *
 * @method \App\Model\Entity\CiselnikFinancniZdrojv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikFinancniZdrojv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikFinancniZdrojv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikFinancniZdrojv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikFinancniZdrojv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikFinancniZdrojv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikFinancniZdrojv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikFinancniZdrojv01Table extends Table
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

        $this->setTable('ciselnikFinancniZdrojv01');
        $this->setDisplayField('financniZdrojNazev');
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
            ->requirePresence('financniZdrojKod', 'create')
            ->notEmpty('financniZdrojKod');

        $validator
            ->allowEmpty('financniZdrojNadrizenyKod');

        $validator
            ->requirePresence('financniZdrojNazev', 'create')
            ->notEmpty('financniZdrojNazev');

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
