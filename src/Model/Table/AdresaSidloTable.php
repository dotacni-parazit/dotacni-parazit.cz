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

        $this->setTable('AdresaSidlo');
        $this->setDisplayField('idAdresa');
        $this->setPrimaryKey('idAdresa');
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
            ->allowEmpty('idAdresa', 'create');

        $validator
            ->requirePresence('idPrijemce', 'create')
            ->notEmpty('idPrijemce');

        $validator
            ->boolean('adrTyp')
            ->requirePresence('adrTyp', 'create')
            ->notEmpty('adrTyp');

        $validator
            ->requirePresence('iriStat', 'create')
            ->notEmpty('iriStat');

        $validator
            ->allowEmpty('iriObec');

        $validator
            ->decimal('obecKod')
            ->allowEmpty('obecKod');

        $validator
            ->allowEmpty('obecNazev');

        $validator
            ->decimal('psc')
            ->allowEmpty('psc');

        $validator
            ->decimal('adresniMistoKod')
            ->allowEmpty('adresniMistoKod');

        $validator
            ->boolean('iriCastObce')
            ->allowEmpty('iriCastObce');

        $validator
            ->decimal('castObceKod')
            ->allowEmpty('castObceKod');

        $validator
            ->decimal('cisloDomovni')
            ->allowEmpty('cisloDomovni');

        $validator
            ->allowEmpty('cisloOrientacni');

        $validator
            ->decimal('uliceKod')
            ->allowEmpty('uliceKod');

        $validator
            ->allowEmpty('ulice');

        $validator
            ->allowEmpty('adresaText');

        $validator
            ->dateTime('dPlatnost')
            ->requirePresence('dPlatnost', 'create')
            ->notEmpty('dPlatnost');

        $validator
            ->dateTime('dtAktualizace')
            ->requirePresence('dtAktualizace', 'create')
            ->notEmpty('dtAktualizace');

        return $validator;
    }
}
