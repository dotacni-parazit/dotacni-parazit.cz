<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikCedrOpatreniv01 Model
 *
 * @method \App\Model\Entity\CiselnikCedrOpatreniv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikCedrOpatreniv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrOpatreniv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrOpatreniv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikCedrOpatreniv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrOpatreniv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrOpatreniv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikCedrOpatreniv01Table extends Table
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

        $this->setTable('ciselnikCedrOpatreniv01');
        $this->setDisplayField('idOpatreni');
        $this->setPrimaryKey('idOpatreni');

        $this->belongsTo('CiselnikCedrPrioritav01')
            ->setBindingKey('idPriorita')
            ->setForeignKey('idPriorita')
            ->setProperty('CedrPriorita');

        $this->hasMany('CiselnikCedrPodOpatreniv01')
            ->setBindingKey('idOpatreni')
            ->setForeignKey('idOpatreni')
            ->setProperty('CedrPodOpatreni');
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
            ->decimal('opatreniCislo')
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
