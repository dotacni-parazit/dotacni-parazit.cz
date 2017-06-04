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
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->setTable('splatka_kalendar');
        $this->setDisplayField('id');
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
            ->decimal('castkaSplatkaPlanovana')
            ->allowEmpty('castkaSplatkaPlanovana');

        $validator
            ->decimal('castkaSplatkaSkutecna')
            ->requirePresence('castkaSplatkaSkutecna', 'create')
            ->notEmpty('castkaSplatkaSkutecna');

        $validator
            ->allowEmpty('uroceniIndikator');

        $validator
            ->dateTime('zaznamAktualizaceDatumCas')
            ->allowEmpty('zaznamAktualizaceDatumCas');

        $validator
            ->requirePresence('zaznamIdentifikator', 'create')
            ->notEmpty('zaznamIdentifikator')
            ->add('zaznamIdentifikator', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
