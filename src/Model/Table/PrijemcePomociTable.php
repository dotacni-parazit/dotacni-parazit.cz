<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrijemcePomoci Model
 *
 * @method \App\Model\Entity\PrijemcePomoci get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrijemcePomoci newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PrijemcePomoci[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrijemcePomoci|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrijemcePomoci patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrijemcePomoci[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrijemcePomoci findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrijemcePomociTable extends Table
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

        $this->setTable('prijemce_pomoci');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Dotace', ['bindingKey' => 'obdrzelDotaci', 'foreignKey' => 'about']);
        $this->hasOne('AdresaSidlo', ['bindingKey' => 'sidliNaAdrese', 'foreignKey' => 'about']);
        $this->hasOne('AdresaTrvaleBydliste', ['bindingKey' => 'maTrvaleBydlisteNaAdrese', 'foreignKey' => 'about']);
        $this->hasOne('CiselnikStatV01', ['bindingKey' => 'jePrislusnikStatu', 'foreignKey' => 'about']);
        $this->hasOne('CiselnikPravniFormaV01', ['bindingKey' => 'jeRegistrovanSPravniFormou', 'foreignKey' => 'about']);
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
            ->requirePresence('jePrislusnikStatu', 'create')
            ->notEmpty('jePrislusnikStatu');

        $validator
            ->requirePresence('jeRegistrovanSPravniFormou', 'create')
            ->notEmpty('jeRegistrovanSPravniFormou');

        $validator
            ->requirePresence('obdrzelDotaci', 'create')
            ->notEmpty('obdrzelDotaci');

        $validator
            ->allowEmpty('sidliNaAdrese');

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
            ->integer('ico')
            ->allowEmpty('ico');

        $validator
            ->allowEmpty('obchodniJmeno');

        $validator
            ->allowEmpty('legalName');

        $validator
            ->allowEmpty('maTrvaleBydlisteNaAdrese');

        $validator
            ->allowEmpty('jmeno');

        $validator
            ->allowEmpty('prijmeni');

        $validator
            ->integer('narozeniRok')
            ->allowEmpty('narozeniRok');

        $validator
            ->allowEmpty('firstName');

        $validator
            ->allowEmpty('lastName');

        $validator
            ->allowEmpty('dic');

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
