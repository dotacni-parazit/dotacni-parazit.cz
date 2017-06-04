<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikDotaceTitulV01 Model
 *
 * @method \App\Model\Entity\CiselnikDotaceTitulV01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulV01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulV01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulV01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulV01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulV01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulV01 findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CiselnikDotaceTitulV01Table extends Table
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

        $this->setTable('ciselnik_dotace_titul_v01');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('about', 'create')
            ->notEmpty('about')
            ->add('about', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('dotaceTitulCiselnikAxisDotaceTitulKod', 'create')
            ->notEmpty('dotaceTitulCiselnikAxisDotaceTitulKod');

        $validator
            ->requirePresence('dotaceTitulNazevZkraceny', 'create')
            ->notEmpty('dotaceTitulNazevZkraceny');

        $validator
            ->requirePresence('statniRozpocetKapitolaCiselnikAxisKapitolaKod', 'create')
            ->notEmpty('statniRozpocetKapitolaCiselnikAxisKapitolaKod');

        $validator
            ->dateTime('zaznamPlatnostDoDatum')
            ->requirePresence('zaznamPlatnostDoDatum', 'create')
            ->notEmpty('zaznamPlatnostDoDatum');

        $validator
            ->dateTime('zaznamPlatnostOdDatum')
            ->requirePresence('zaznamPlatnostOdDatum', 'create')
            ->notEmpty('zaznamPlatnostOdDatum');

        $validator
            ->requirePresence('dotaceTitulKod', 'create')
            ->notEmpty('dotaceTitulKod');

        $validator
            ->requirePresence('dotaceTitulNazev', 'create')
            ->notEmpty('dotaceTitulNazev');

        $validator
            ->requirePresence('dotaceTitulVlastniKod', 'create')
            ->notEmpty('dotaceTitulVlastniKod');

        $validator
            ->integer('statniRozpocetKapitolaKod')
            ->requirePresence('statniRozpocetKapitolaKod', 'create')
            ->notEmpty('statniRozpocetKapitolaKod');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('prefLabel', 'create')
            ->notEmpty('prefLabel');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['about']));

        return $rules;
    }
}
