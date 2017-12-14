<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikProgramv01 Model
 *
 * @method \App\Model\Entity\CiselnikProgramv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikProgramv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikProgramv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikProgramv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikProgramv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikProgramv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikProgramv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikProgramv01Table extends Table
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

        $this->setTable('ciselnikProgramv01');
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
            ->requirePresence('programKod', 'create')
            ->notEmpty('programKod');

        $validator
            ->requirePresence('programNazev', 'create')
            ->notEmpty('programNazev');

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
