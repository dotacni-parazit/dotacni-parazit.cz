<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdresaBydliste Model
 *
 * @method \App\Model\Entity\AdresaBydliste get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdresaBydliste newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdresaBydliste[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdresaBydliste|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdresaBydliste patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdresaBydliste[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdresaBydliste findOrCreate($search, callable $callback = null, $options = [])
 */
class AdresaBydlisteTable extends Table
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

        $this->setTable('AdresaBydliste');
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
            ->decimal('adrTyp')
            ->requirePresence('adrTyp', 'create')
            ->notEmpty('adrTyp');

        $validator
            ->requirePresence('iriStat', 'create')
            ->notEmpty('iriStat');

        $validator
            ->allowEmpty('obec');

        $validator
            ->decimal('obecKod')
            ->allowEmpty('obecKod');

        $validator
            ->allowEmpty('obecNazev');

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
