<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StrukturalniFondy2020 Model
 *
 * @method \App\Model\Entity\StrukturalniFondy2020 get($primaryKey, $options = [])
 * @method \App\Model\Entity\StrukturalniFondy2020 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StrukturalniFondy2020[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StrukturalniFondy2020|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StrukturalniFondy2020 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StrukturalniFondy2020[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StrukturalniFondy2020 findOrCreate($search, callable $callback = null, $options = [])
 */
class StrukturalniFondy2020Table extends Table
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

        $this->setTable('strukturalniFondy2020');
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
            ->requirePresence('operacniProgram', 'create')
            ->notEmpty('operacniProgram');

        $validator
            ->requirePresence('cisloPrioritniOsy', 'create')
            ->notEmpty('cisloPrioritniOsy');

        $validator
            ->requirePresence('registracniCisloProjektu', 'create')
            ->notEmpty('registracniCisloProjektu');

        $validator
            ->requirePresence('nazevProjektu', 'create')
            ->notEmpty('nazevProjektu');

        $validator
            ->allowEmpty('popisProjektu');

        $validator
            ->requirePresence('zadatel', 'create')
            ->notEmpty('zadatel');

        $validator
            ->allowEmpty('zadatelIco');

        $validator
            ->requirePresence('zadatelPravniForma', 'create')
            ->notEmpty('zadatelPravniForma');

        $validator
            ->allowEmpty('zadatelPsc');

        $validator
            ->allowEmpty('datumZahajeni');

        $validator
            ->requirePresence('datumUkonceniPredpokladane', 'create')
            ->notEmpty('datumUkonceniPredpokladane');

        $validator
            ->allowEmpty('datumUkonceniSkutecne');

        $validator
            ->requirePresence('stavRealizace', 'create')
            ->notEmpty('stavRealizace');

        $validator
            ->requirePresence('zeme', 'create')
            ->notEmpty('zeme');

        $validator
            ->allowEmpty('kodNUTS');

        $validator
            ->allowEmpty('nazevNUTS');

        $validator
            ->allowEmpty('intervenceKod');

        $validator
            ->allowEmpty('intervenceNazev');

        $validator
            ->requirePresence('fond', 'create')
            ->notEmpty('fond');

        $validator
            ->decimal('miraSpolufinancovaniEU')
            ->requirePresence('miraSpolufinancovaniEU', 'create')
            ->notEmpty('miraSpolufinancovaniEU');

        $validator
            ->decimal('celkoveZdroje')
            ->requirePresence('celkoveZdroje', 'create')
            ->notEmpty('celkoveZdroje');

        $validator
            ->decimal('schvaleneZdrojeEU')
            ->requirePresence('schvaleneZdrojeEU', 'create')
            ->notEmpty('schvaleneZdrojeEU');

        $validator
            ->decimal('schvaleneZdrojeVerejne')
            ->requirePresence('schvaleneZdrojeVerejne', 'create')
            ->notEmpty('schvaleneZdrojeVerejne');

        $validator
            ->decimal('schvaleneZdrojeSoukrome')
            ->requirePresence('schvaleneZdrojeSoukrome', 'create')
            ->notEmpty('schvaleneZdrojeSoukrome');

        $validator
            ->decimal('vyuctovaneZdroje')
            ->requirePresence('vyuctovaneZdroje', 'create')
            ->notEmpty('vyuctovaneZdroje');

        $validator
            ->decimal('vyuctovaneZdrojeEU')
            ->requirePresence('vyuctovaneZdrojeEU', 'create')
            ->notEmpty('vyuctovaneZdrojeEU');

        $validator
            ->decimal('vyuctovaneZdrojeVerejne')
            ->requirePresence('vyuctovaneZdrojeVerejne', 'create')
            ->notEmpty('vyuctovaneZdrojeVerejne');

        $validator
            ->decimal('vyuctovaneZdrojeSoukrome')
            ->requirePresence('vyuctovaneZdrojeSoukrome', 'create')
            ->notEmpty('vyuctovaneZdrojeSoukrome');

        $validator
            ->requirePresence('menaKod', 'create')
            ->notEmpty('menaKod');

        return $validator;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'cedr_custom';
    }
}
