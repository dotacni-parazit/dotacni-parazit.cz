<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InvesticniPobidky Model
 *
 * @method \App\Model\Entity\InvesticniPobidky get($primaryKey, $options = [])
 * @method \App\Model\Entity\InvesticniPobidky newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InvesticniPobidky[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InvesticniPobidky|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvesticniPobidky patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InvesticniPobidky[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InvesticniPobidky findOrCreate($search, callable $callback = null, $options = [])
 */
class InvesticniPobidkyTable extends Table
{

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'cedr_custom';
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('investicniPobidky');
        $this->setDisplayField('name');
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
            ->decimal('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('ico');

        $validator
            ->allowEmpty('vymazanoOR');

        $validator
            ->allowEmpty('poznamka');

        $validator
            ->requirePresence('sektor', 'create')
            ->notEmpty('sektor');

        $validator
            ->allowEmpty('cz_nace');

        $validator
            ->requirePresence('druhInvesticniAkce', 'create')
            ->notEmpty('druhInvesticniAkce');

        $validator
            ->requirePresence('zemePuvodu', 'create')
            ->notEmpty('zemePuvodu');

        $validator
            ->decimal('investiceEUR')
            ->requirePresence('investiceEUR', 'create')
            ->notEmpty('investiceEUR');

        $validator
            ->decimal('investiceUSD')
            ->requirePresence('investiceUSD', 'create')
            ->notEmpty('investiceUSD');

        $validator
            ->decimal('investiceCZK')
            ->requirePresence('investiceCZK', 'create')
            ->notEmpty('investiceCZK');

        $validator
            ->integer('vytvorenaPracovniMista')
            ->requirePresence('vytvorenaPracovniMista', 'create')
            ->notEmpty('vytvorenaPracovniMista');

        $validator
            ->allowEmpty('pobidkaDane');

        $validator
            ->allowEmpty('pobidkaPracovniMista');

        $validator
            ->allowEmpty('pobidkaRekvalifikace');

        $validator
            ->allowEmpty('pobidkaPozemky');

        $validator
            ->allowEmpty('pobidkaKapitalovaPodpora');

        $validator
            ->requirePresence('miraVerejnePodpory', 'create')
            ->notEmpty('miraVerejnePodpory');

        $validator
            ->allowEmpty('stropVerejnePodpory');

        $validator
            ->requirePresence('okres', 'create')
            ->notEmpty('okres');

        $validator
            ->requirePresence('kraj', 'create')
            ->notEmpty('kraj');

        $validator
            ->allowEmpty('nutsII');

        $validator
            ->decimal('podaniZameruRok')
            ->requirePresence('podaniZameruRok', 'create')
            ->notEmpty('podaniZameruRok');

        $validator
            ->decimal('rozhodnutiDen')
            ->allowEmpty('rozhodnutiDen');

        $validator
            ->requirePresence('rozhodnutiMesic', 'create')
            ->notEmpty('rozhodnutiMesic');

        $validator
            ->decimal('rozhodnutiRok')
            ->requirePresence('rozhodnutiRok', 'create')
            ->notEmpty('rozhodnutiRok');

        $validator
            ->requirePresence('msp', 'create')
            ->notEmpty('msp');

        $validator
            ->allowEmpty('zruseniRozhodnutiNeboOdstoupeni');

        return $validator;
    }
}
