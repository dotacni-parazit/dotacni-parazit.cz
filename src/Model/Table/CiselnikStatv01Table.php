<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikStatv01 Model
 *
 * @method \App\Model\Entity\CiselnikStatv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikStatv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikStatv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikStatv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikStatv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikStatv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikStatv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikStatv01Table extends Table
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

        $this->setTable('ciselnikStatv01');
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
            ->requirePresence('statKod3Znaky', 'create')
            ->notEmpty('statKod3Znaky');

        $validator
            ->decimal('statKod3Cisla')
            ->requirePresence('statKod3Cisla', 'create')
            ->notEmpty('statKod3Cisla');

        $validator
            ->allowEmpty('statKodOmezeny');

        $validator
            ->requirePresence('statNazev', 'create')
            ->notEmpty('statNazev');

        $validator
            ->requirePresence('statNazevZkraceny', 'create')
            ->notEmpty('statNazevZkraceny');

        $validator
            ->allowEmpty('statNazevEn');

        $validator
            ->allowEmpty('statNazevZkracenyEn');

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
