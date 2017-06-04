<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Etapa Model
 *
 * @method \App\Model\Entity\Etapa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Etapa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Etapa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Etapa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etapa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Etapa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Etapa findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EtapaTable extends Table
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

        $this->setTable('etapa');
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
            ->requirePresence('etapaIdentifikator', 'create')
            ->notEmpty('etapaIdentifikator');

        $validator
            ->allowEmpty('etapaNazev');

        $validator
            ->allowEmpty('poznamka');

        $validator
            ->dateTime('ukonceniPlanovaneDatum')
            ->allowEmpty('ukonceniPlanovaneDatum');

        $validator
            ->dateTime('ukonceniSkutecneDatum')
            ->allowEmpty('ukonceniSkutecneDatum');

        $validator
            ->dateTime('zahajeniPlanovaneDatum')
            ->allowEmpty('zahajeniPlanovaneDatum');

        $validator
            ->dateTime('zahajeniSkutecneDatum')
            ->allowEmpty('zahajeniSkutecneDatum');

        $validator
            ->dateTime('zaznamAktualizaceDatumCas')
            ->allowEmpty('zaznamAktualizaceDatumCas');

        $validator
            ->requirePresence('zaznamIdentifikator', 'create')
            ->notEmpty('zaznamIdentifikator')
            ->add('zaznamIdentifikator', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('title');

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
