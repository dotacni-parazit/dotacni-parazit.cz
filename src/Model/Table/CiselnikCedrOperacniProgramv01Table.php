<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikCedrOperacniProgramv01 Model
 *
 * @method \App\Model\Entity\CiselnikCedrOperacniProgramv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikCedrOperacniProgramv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrOperacniProgramv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrOperacniProgramv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikCedrOperacniProgramv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrOperacniProgramv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikCedrOperacniProgramv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikCedrOperacniProgramv01Table extends Table
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

        $this->setTable('ciselnikCedrOperacniProgramv01');
        $this->setDisplayField('idOperacniProgram');
        $this->setPrimaryKey('idOperacniProgram');

        $this->hasMany('CiselnikCedrPrioritav01')
            ->setForeignKey('idOperacniProgram')
            ->setBindingKey('idOperacniProgram')
            ->setProperty('CedrPriorita');
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
            ->allowEmpty('idOperacniProgram', 'create');

        $validator
            ->requirePresence('operacaniProgramKod', 'create')
            ->notEmpty('operacaniProgramKod');

        $validator
            ->requirePresence('operacaniProgramNazev', 'create')
            ->notEmpty('operacaniProgramNazev');

        $validator
            ->decimal('operacaniProgramCislo')
            ->allowEmpty('operacaniProgramCislo');

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
