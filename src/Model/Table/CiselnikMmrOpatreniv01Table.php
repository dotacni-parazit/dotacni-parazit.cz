<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikMmrOpatreniv01 Model
 *
 * @method \App\Model\Entity\CiselnikMmrOpatreniv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikMmrOpatreniv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrOpatreniv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrOpatreniv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikMmrOpatreniv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrOpatreniv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrOpatreniv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikMmrOpatreniv01Table extends Table
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

        $this->setTable('ciselnikMmrOpatreniv01');
        $this->setDisplayField('idOpatreni');
        $this->setPrimaryKey('idOpatreni');

        $this->belongsTo('CiselnikMmrPrioritav01')
            ->setBindingKey('idPriorita')
            ->setForeignKey('idPriorita')
            ->setProperty('MmrPriorita');
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
            ->allowEmpty('idOpatreni', 'create');

        $validator
            ->requirePresence('idPriorita', 'create')
            ->notEmpty('idPriorita');

        $validator
            ->requirePresence('opatreniKod', 'create')
            ->notEmpty('opatreniKod');

        $validator
            ->requirePresence('opatreniNazev', 'create')
            ->notEmpty('opatreniNazev');

        $validator
            ->boolean('opatreniCislo')
            ->allowEmpty('opatreniCislo');

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
