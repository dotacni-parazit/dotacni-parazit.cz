<?php
namespace App\Model\Table;

use Cake\ORM\Query;
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

        $this->setTable('Dotace');
        $this->setDisplayField('idDotace');
        $this->setPrimaryKey('idDotace');

        $this->belongsTo('PrijemcePomoci')
            ->setForeignKey('idPrijemce')
            ->setBindingKey('idPrijemce')
            ->setProperty('PrijemcePomoci');

        $this->belongsTo('CiselnikMmrOperacniProgramv01')
            ->setForeignKey('iriOperacniProgram')
            ->setBindingKey('idOperacniProgram')
            ->setProperty('MmrOperacniProgram');

        $this->belongsTo('CiselnikMmrPodprogramv01')
            ->setForeignKey('iriPodprogram')
            ->setBindingKey('id')
            ->setProperty('MmrPodprogram');

        $this->belongsTo('CiselnikMmrPrioritav01')
            ->setForeignKey('iriPriorita')
            ->setBindingKey('idPriorita')
            ->setProperty('MmrPriorita');

        $this->belongsTo('CiselnikMmrOpatreniv01')
            ->setForeignKey('iriOpatreni')
            ->setBindingKey('idOpatreni')
            ->setProperty('MmrOpatreni');

        $this->belongsTo('CiselnikMmrPodOpatreniv01')
            ->setForeignKey('iriPodopatreni')
            ->setBindingKey('idPodOpatreni')
            ->setProperty('MmrPodOpatreni');

        $this->belongsTo('CiselnikMmrGrantoveSchemav01')
            ->setForeignKey('iriGrantoveSchema')
            ->setBindingKey('idGrantoveSchema')
            ->setProperty('MmrGrantoveSchema');
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
            ->allowEmpty('idDotace', 'create');

        $validator
            ->requirePresence('idPrijemce', 'create')
            ->notEmpty('idPrijemce');

        $validator
            ->allowEmpty('projektKod');

        $validator
            ->dateTime('podpisDatum')
            ->requirePresence('podpisDatum', 'create')
            ->notEmpty('podpisDatum');

        $validator
            ->decimal('subjektRozliseniKod')
            ->allowEmpty('subjektRozliseniKod');

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
            ->boolean('zmenaSmlouvyIndikator')
            ->requirePresence('zmenaSmlouvyIndikator', 'create')
            ->notEmpty('zmenaSmlouvyIndikator');

        $validator
            ->requirePresence('projektIdnetifikator', 'create')
            ->notEmpty('projektIdnetifikator');

        $validator
            ->allowEmpty('projektNazev');

        $validator
            ->allowEmpty('iriOperacniProgram');

        $validator
            ->allowEmpty('iriPodprogram');

        $validator
            ->allowEmpty('iriPriorita');

        $validator
            ->allowEmpty('iriOpatreni');

        $validator
            ->allowEmpty('iriPodopatreni');

        $validator
            ->allowEmpty('iriGrantoveSchema');

        $validator
            ->boolean('iriProgramPodpora')
            ->allowEmpty('iriProgramPodpora');

        $validator
            ->boolean('iriTypCinnosti')
            ->allowEmpty('iriTypCinnosti');

        $validator
            ->boolean('iriProgram')
            ->allowEmpty('iriProgram');

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
