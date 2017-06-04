<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SplatkaKalendar Model
 *
 * @method \App\Model\Entity\SplatkaKalendar get($primaryKey, $options = [])
 * @method \App\Model\Entity\SplatkaKalendar newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SplatkaKalendar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SplatkaKalendar|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SplatkaKalendar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SplatkaKalendar[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SplatkaKalendar findOrCreate($search, callable $callback = null, $options = [])
 */
class SplatkaKalendarTable extends Table
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

        $this->setTable('SplatkaKalendar');
        $this->setDisplayField('idSKalendar');
        $this->setPrimaryKey('idSKalendar');
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
            ->allowEmpty('idSKalendar', 'create');

        $validator
            ->requirePresence('idRozhodnuti', 'create')
            ->notEmpty('idRozhodnuti');

        $validator
            ->decimal('castkaSplatkaPlanovana')
            ->requirePresence('castkaSplatkaPlanovana', 'create')
            ->notEmpty('castkaSplatkaPlanovana');

        $validator
            ->decimal('castkaSplatkaSkutecna')
            ->requirePresence('castkaSplatkaSkutecna', 'create')
            ->notEmpty('castkaSplatkaSkutecna');

        $validator
            ->boolean('uroceniIndikator')
            ->requirePresence('uroceniIndikator', 'create')
            ->notEmpty('uroceniIndikator');

        $validator
            ->dateTime('dtAktualizace')
            ->requirePresence('dtAktualizace', 'create')
            ->notEmpty('dtAktualizace');

        return $validator;
    }
}
