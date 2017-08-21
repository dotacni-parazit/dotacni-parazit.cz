<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StrukturalniFondy Model
 *
 * @method \App\Model\Entity\StrukturalniFondy get($primaryKey, $options = [])
 * @method \App\Model\Entity\StrukturalniFondy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StrukturalniFondy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StrukturalniFondy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StrukturalniFondy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StrukturalniFondy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StrukturalniFondy findOrCreate($search, callable $callback = null, $options = [])
 */
class StrukturalniFondyTable extends Table
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

        $this->setTable('strukturalniFondy');

        $this->belongsTo('CiselnikMmrPrioritav01')
            ->setForeignKey('cisloPrioritniOsy')
            ->setBindingKey('prioritaKod')
            ->setProperty('MmrPriorita');
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
            ->requirePresence('cisloANazevProgramu', 'create')
            ->notEmpty('cisloANazevProgramu');

        $validator
            ->requirePresence('cisloPrioritniOsy', 'create')
            ->notEmpty('cisloPrioritniOsy');

        $validator
            ->requirePresence('cisloOblastiPodpory', 'create')
            ->notEmpty('cisloOblastiPodpory');

        $validator
            ->requirePresence('cisloProjektu', 'create')
            ->notEmpty('cisloProjektu');

        $validator
            ->requirePresence('nazevProjektu', 'create')
            ->notEmpty('nazevProjektu');

        $validator
            ->requirePresence('popisProjektu', 'create')
            ->notEmpty('popisProjektu');

        $validator
            ->allowEmpty('zadatel');

        $validator
            ->allowEmpty('zadatelIco');

        $validator
            ->requirePresence('pravniForma', 'create')
            ->notEmpty('pravniForma');

        $validator
            ->allowEmpty('pravniFormaSkupina');

        $validator
            ->requirePresence('stavProjektu', 'create')
            ->notEmpty('stavProjektu');

        $validator
            ->dateTime('datumPodpisuSmlouvy')
            ->requirePresence('datumPodpisuSmlouvy', 'create')
            ->notEmpty('datumPodpisuSmlouvy');

        $validator
            ->requirePresence('adresaZadatele', 'create')
            ->notEmpty('adresaZadatele');

        $validator
            ->allowEmpty('krajZadateleKod');

        $validator
            ->allowEmpty('krajZadateleNazev');

        $validator
            ->allowEmpty('obecZadateleKod');

        $validator
            ->requirePresence('obecZadateleNazev', 'create')
            ->notEmpty('obecZadateleNazev');

        $validator
            ->decimal('celkoveZdroje')
            ->requirePresence('celkoveZdroje', 'create')
            ->notEmpty('celkoveZdroje');

        $validator
            ->decimal('verejneZdrojeCelkem')
            ->requirePresence('verejneZdrojeCelkem', 'create')
            ->notEmpty('verejneZdrojeCelkem');

        $validator
            ->decimal('euZdroje')
            ->requirePresence('euZdroje', 'create')
            ->notEmpty('euZdroje');

        $validator
            ->decimal('vyuctovaneVerejneCelkem')
            ->allowEmpty('vyuctovaneVerejneCelkem');

        $validator
            ->decimal('proplaceneEuZdroje')
            ->allowEmpty('proplaceneEuZdroje');

        $validator
            ->decimal('certifikovaneVerejneCelkem')
            ->allowEmpty('certifikovaneVerejneCelkem');

        $validator
            ->decimal('certifikovaneEUZdoje')
            ->allowEmpty('certifikovaneEUZdoje');

        $validator
            ->allowEmpty('kodNUTS');

        $validator
            ->allowEmpty('nazevNUTS');

        $validator
            ->decimal('poradi')
            ->allowEmpty('poradi');

        $validator
            ->decimal('pocetMistRealizace')
            ->allowEmpty('pocetMistRealizace');

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
