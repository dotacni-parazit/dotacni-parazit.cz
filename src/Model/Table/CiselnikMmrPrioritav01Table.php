<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikMmrPrioritav01 Model
 *
 * @method \App\Model\Entity\CiselnikMmrPrioritav01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikMmrPrioritav01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrPrioritav01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrPrioritav01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikMmrPrioritav01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrPrioritav01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrPrioritav01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikMmrPrioritav01Table extends Table
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

        $this->setTable('ciselnikMmrPrioritav01');
        $this->setDisplayField('idPriorita');
        $this->setPrimaryKey('idPriorita');

        $this->belongsTo('CiselnikMmrOperacniProgramv01')
            ->setBindingKey('idOperacniProgram')
            ->setForeignKey('idOperacniProgram')
            ->setProperty('MmrOperacniProgram');

        $this->belongsTo('CiselnikMmrPodprogramv01')
            ->setBindingKey('id')
            ->setForeignKey('idPodprogram')
            ->setProperty('MmrPodprogram');

        $this->hasMany('CiselnikMmrOpatreniv01')
            ->setBindingKey('idPriorita')
            ->setForeignKey('idPriorita')
            ->setProperty('MmrOpatreni');
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
            ->allowEmpty('idPriorita', 'create');

        $validator
            ->allowEmpty('idOperacniProgram');

        $validator
            ->allowEmpty('idPodprogram');

        $validator
            ->requirePresence('prioritaKod', 'create')
            ->notEmpty('prioritaKod');

        $validator
            ->requirePresence('prioritaNazev', 'create')
            ->notEmpty('prioritaNazev');

        $validator
            ->boolean('prioritaCislo')
            ->allowEmpty('prioritaCislo');

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
