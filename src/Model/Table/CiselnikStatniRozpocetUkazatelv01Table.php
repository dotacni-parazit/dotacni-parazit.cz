<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikStatniRozpocetUkazatelv01 Model
 *
 * @method \App\Model\Entity\CiselnikStatniRozpocetUkazatelv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetUkazatelv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetUkazatelv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetUkazatelv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetUkazatelv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetUkazatelv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetUkazatelv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikStatniRozpocetUkazatelv01Table extends Table
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

        $this->setTable('ciselnikStatniRozpocetUkazatelv01');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('CiselnikStatniRozpocetKapitolav01')
            ->setProperty('StatniRozpocetKapitola')
            ->setBindingKey('statniRozpocetKapitolaKod')
            ->setForeignKey('statniRozpocetKapitolaKod');
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
            ->boolean('idStatniRozpocetKapitola')
            ->allowEmpty('idStatniRozpocetKapitola');

        $validator
            ->requirePresence('statniRozpocetUkazatelKod', 'create')
            ->notEmpty('statniRozpocetUkazatelKod');

        $validator
            ->decimal('statniRozpocetKapitolaKod')
            ->requirePresence('statniRozpocetKapitolaKod', 'create')
            ->notEmpty('statniRozpocetKapitolaKod');

        $validator
            ->allowEmpty('statniRozpocetUkazatelNadrizenyKod');

        $validator
            ->requirePresence('statniRozpocetUkazatelNazev', 'create')
            ->notEmpty('statniRozpocetUkazatelNazev');

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
