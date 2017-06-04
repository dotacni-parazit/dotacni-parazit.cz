<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikPodprogramMmrV01 Model
 *
 * @method \App\Model\Entity\CiselnikPodprogramMmrV01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikPodprogramMmrV01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikPodprogramMmrV01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikPodprogramMmrV01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikPodprogramMmrV01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikPodprogramMmrV01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikPodprogramMmrV01 findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CiselnikPodprogramMmrV01Table extends Table
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

        $this->setTable('ciselnik_podprogram_mmr_v01');
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
            ->dateTime('zaznamPlatnostDoDatum')
            ->allowEmpty('zaznamPlatnostDoDatum');

        $validator
            ->dateTime('zaznamPlatnostOdDatum')
            ->allowEmpty('zaznamPlatnostOdDatum');

        $validator
            ->allowEmpty('podprogramKod');

        $validator
            ->allowEmpty('podprogramNazev');

        $validator
            ->requirePresence('zaznamIdentifikator', 'create')
            ->notEmpty('zaznamIdentifikator')
            ->add('zaznamIdentifikator', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['zaznamIdentifikator']));

        return $rules;
    }
}
