<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdresaSidlo Model
 *
 * @method \App\Model\Entity\AdresaSidlo get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdresaSidlo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdresaSidlo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdresaSidlo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdresaSidlo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdresaSidlo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdresaSidlo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdresaSidloTable extends Table
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

        $this->setTable('adresa_sidlo');
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
            ->requirePresence('nachaziSeNaUzemiStatu', 'create')
            ->notEmpty('nachaziSeNaUzemiStatu');

        $validator
            ->dateTime('zaznamAktualizaceDatumCas')
            ->requirePresence('zaznamAktualizaceDatumCas', 'create')
            ->notEmpty('zaznamAktualizaceDatumCas');

        $validator
            ->requirePresence('zaznamIdentifikator', 'create')
            ->notEmpty('zaznamIdentifikator')
            ->add('zaznamIdentifikator', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->dateTime('zaznamPlatnostDatum')
            ->requirePresence('zaznamPlatnostDatum', 'create')
            ->notEmpty('zaznamPlatnostDatum');

        $validator
            ->integer('adresniMistoKod')
            ->allowEmpty('adresniMistoKod');

        $validator
            ->integer('castObceKod')
            ->allowEmpty('castObceKod');

        $validator
            ->integer('obecKod')
            ->allowEmpty('obecKod');

        $validator
            ->allowEmpty('obecNazev');

        $validator
            ->integer('objektCisloDomovni')
            ->allowEmpty('objektCisloDomovni');

        $validator
            ->integer('psc')
            ->allowEmpty('psc');

        $validator
            ->integer('uliceKod')
            ->allowEmpty('uliceKod');

        $validator
            ->allowEmpty('uliceNazev');

        $validator
            ->allowEmpty('obec');

        $validator
            ->allowEmpty('title');

        $validator
            ->requirePresence('adresaKvalifikatorKod', 'create')
            ->notEmpty('adresaKvalifikatorKod');

        $validator
            ->integer('mestskyObvodMestskaCastKod')
            ->allowEmpty('mestskyObvodMestskaCastKod');

        $validator
            ->allowEmpty('mestskyObvodMestskaCastNazev');

        $validator
            ->allowEmpty('objektCisloOrientacni');

        $validator
            ->allowEmpty('mestskyObvodMestskaCast');

        $validator
            ->allowEmpty('adresaText');

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
