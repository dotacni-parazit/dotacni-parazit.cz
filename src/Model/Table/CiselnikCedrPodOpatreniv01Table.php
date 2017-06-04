<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikCedrPodOpatreniv01 Model
 *
 * @method \App\Model\Entity\CiselnikCedrPodOpatreniv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikCedrPodOpatreniv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrPodOpatreniv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrPodOpatreniv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikCedrPodOpatreniv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrPodOpatreniv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrPodOpatreniv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikCedrPodOpatreniv01Table extends Table
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

        $this->setTable('ciselnikCedrPodOpatreniv01');
        $this->setDisplayField('idPodOpatreni');
        $this->setPrimaryKey('idPodOpatreni');
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
            ->allowEmpty('idPodOpatreni', 'create');

        $validator
            ->requirePresence('idOpatreni', 'create')
            ->notEmpty('idOpatreni');

        $validator
            ->requirePresence('podOpatreniKod', 'create')
            ->notEmpty('podOpatreniKod');

        $validator
            ->requirePresence('podOpatreniNazev', 'create')
            ->notEmpty('podOpatreniNazev');

        $validator
            ->decimal('podOpatreniCislo')
            ->allowEmpty('podOpatreniCislo');

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
