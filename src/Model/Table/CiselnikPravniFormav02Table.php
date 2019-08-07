<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikPravniFormav02 Model
 *
 * @method \App\Model\Entity\CiselnikPravniFormav02 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikPravniFormav02 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikPravniFormav02[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikPravniFormav02|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikPravniFormav02 saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikPravniFormav02 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikPravniFormav02[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikPravniFormav02 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikPravniFormav02Table extends Table
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

        $this->setTable('ciselnikPravniFormav02');
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
            ->scalar('id')
            ->maxLength('id', 85)
            ->allowEmptyString('id', null, 'create');

        $validator
            ->decimal('pravniFormaKod')
            ->requirePresence('pravniFormaKod', 'create')
            ->notEmptyString('pravniFormaKod');

        $validator
            ->scalar('pravniFormaNazev')
            ->maxLength('pravniFormaNazev', 117)
            ->requirePresence('pravniFormaNazev', 'create')
            ->notEmptyString('pravniFormaNazev');

        $validator
            ->scalar('pravniFormaNazevZkraceny')
            ->maxLength('pravniFormaNazevZkraceny', 3)
            ->requirePresence('pravniFormaNazevZkraceny', 'create')
            ->notEmptyString('pravniFormaNazevZkraceny');

        $validator
            ->decimal('pravniFormaTypKod')
            ->requirePresence('pravniFormaTypKod', 'create')
            ->notEmptyString('pravniFormaTypKod');

        $validator
            ->dateTime('zaznamPlatnostOdDatum')
            ->requirePresence('zaznamPlatnostOdDatum', 'create')
            ->notEmptyDateTime('zaznamPlatnostOdDatum');

        $validator
            ->dateTime('zaznamPlatnostDoDatum')
            ->requirePresence('zaznamPlatnostDoDatum', 'create')
            ->notEmptyDateTime('zaznamPlatnostDoDatum');

        return $validator;
    }
}
