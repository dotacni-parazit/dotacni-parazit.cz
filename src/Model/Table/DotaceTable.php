<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dotace Model
 *
 * @method \App\Model\Entity\Dotace get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dotace newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dotace[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dotace|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dotace patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dotace[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dotace findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DotaceTable extends Table
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

        $this->setTable('dotace');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Rozhodnuti', ['bindingKey' => 'byloRozhodnuto', 'foreignKey' => 'about']);
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
            ->allowEmpty('byloRozhodnuto');

        $validator
            ->dateTime('podaniDatum')
            ->allowEmpty('podaniDatum');

        $validator
            ->allowEmpty('projektKod');

        $validator
            ->dateTime('smlouvaPodpisDatum')
            ->allowEmpty('smlouvaPodpisDatum');

        $validator
            ->dateTime('zaznamAktualizaceDatumCas')
            ->allowEmpty('zaznamAktualizaceDatumCas');

        $validator
            ->allowEmpty('zaznamIdentifikator')
            ->add('zaznamIdentifikator', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->dateTime('zaznamPlatnostDatum')
            ->allowEmpty('zaznamPlatnostDatum');

        $validator
            ->allowEmpty('zmenaSmlouvaIdikator');

        $validator
            ->allowEmpty('projektIdentifikator');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('podprogram');

        $validator
            ->allowEmpty('operacniProgramCEDR');

        $validator
            ->integer('subjektRozliseniKod')
            ->allowEmpty('subjektRozliseniKod');

        $validator
            ->allowEmpty('operacniProgramMMR');

        $validator
            ->allowEmpty('prioritaMMR');

        $validator
            ->allowEmpty('opatreniMMR');

        $validator
            ->allowEmpty('podOpatreni');

        $validator
            ->allowEmpty('grantoveSchemaMMR');

        $validator
            ->dateTime('ukonceniSkutecneDatum')
            ->allowEmpty('ukonceniSkutecneDatum');

        $validator
            ->dateTime('zahajeniSkutecneDatum')
            ->allowEmpty('zahajeniSkutecneDatum');

        $validator
            ->dateTime('ukonceniPlanovaneDatum')
            ->allowEmpty('ukonceniPlanovaneDatum');

        $validator
            ->allowEmpty('clenenNaEtapu');

        $validator
            ->allowEmpty('realizovanNaUzemi');

        $validator
            ->allowEmpty('prioritaCEDR');

        $validator
            ->allowEmpty('projektNadrizenyIdentifikator');

        $validator
            ->allowEmpty('podOpatreniCEDR');

        $validator
            ->allowEmpty('opatreniCEDR');

        $validator
            ->allowEmpty('poznamkaCEDR');

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
