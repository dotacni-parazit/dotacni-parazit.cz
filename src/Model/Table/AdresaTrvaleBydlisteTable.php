<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdresaTrvaleBydliste Model
 *
 * @method \App\Model\Entity\AdresaTrvaleBydliste get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdresaTrvaleBydliste newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdresaTrvaleBydliste[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdresaTrvaleBydliste|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdresaTrvaleBydliste patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdresaTrvaleBydliste[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdresaTrvaleBydliste findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdresaTrvaleBydlisteTable extends Table
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

        $this->setTable('adresa_trvale_bydliste');
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
            ->allowEmpty('nachaziSeNaUzemiStatu');

        $validator
            ->dateTime('zaznamAktualizaceDatumCas')
            ->allowEmpty('zaznamAktualizaceDatumCas');

        $validator
            ->requirePresence('zaznamIdentifikator', 'create')
            ->notEmpty('zaznamIdentifikator')
            ->add('zaznamIdentifikator', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->dateTime('zaznamPlatnostDatum')
            ->allowEmpty('zaznamPlatnostDatum');

        $validator
            ->integer('obecKod')
            ->allowEmpty('obecKod');

        $validator
            ->allowEmpty('obecNazev');

        $validator
            ->allowEmpty('obec');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('adresaKvalifikatorKod');

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
