<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikCedrPrioritav01 Model
 *
 * @method \App\Model\Entity\CiselnikCedrPrioritav01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikCedrPrioritav01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrPrioritav01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrPrioritav01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikCedrPrioritav01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrPrioritav01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrPrioritav01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikCedrPrioritav01Table extends Table
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

        $this->setTable('ciselnikCedrPrioritav01');
        $this->setDisplayField('idPriorita');
        $this->setPrimaryKey('idPriorita');
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
            ->requirePresence('idOperacniProgram', 'create')
            ->notEmpty('idOperacniProgram');

        $validator
            ->boolean('idPodprogram')
            ->allowEmpty('idPodprogram');

        $validator
            ->requirePresence('prioritaKod', 'create')
            ->notEmpty('prioritaKod');

        $validator
            ->requirePresence('prioritaNazev', 'create')
            ->notEmpty('prioritaNazev');

        $validator
            ->decimal('prioritaCislo')
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
