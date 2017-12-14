<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikMmrGrantoveSchemav01 Model
 *
 * @method \App\Model\Entity\CiselnikMmrGrantoveSchemav01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikMmrGrantoveSchemav01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrGrantoveSchemav01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrGrantoveSchemav01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikMmrGrantoveSchemav01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrGrantoveSchemav01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrGrantoveSchemav01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikMmrGrantoveSchemav01Table extends Table
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

        $this->setTable('ciselnikMmrGrantoveSchemav01');
        $this->setDisplayField('idGrantoveSchema');
        $this->setPrimaryKey('idGrantoveSchema');
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
            ->allowEmpty('idGrantoveSchema', 'create');

        $validator
            ->requirePresence('grantoveSchemaKod', 'create')
            ->notEmpty('grantoveSchemaKod');

        $validator
            ->requirePresence('grantoveSchemaNazev', 'create')
            ->notEmpty('grantoveSchemaNazev');

        $validator
            ->boolean('grantoveSchemaCislo')
            ->allowEmpty('grantoveSchemaCislo');

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
