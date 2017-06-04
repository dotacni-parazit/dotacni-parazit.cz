<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rozhodnuti Model
 *
 * @method \App\Model\Entity\Rozhodnuti get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rozhodnuti newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rozhodnuti[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rozhodnuti|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rozhodnuti patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rozhodnuti[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rozhodnuti findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RozhodnutiTable extends Table
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

        $this->setTable('rozhodnuti');
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
            ->decimal('castkaPozadovana')
            ->allowEmpty('castkaPozadovana');

        $validator
            ->decimal('castkaRozhodnuta')
            ->allowEmpty('castkaRozhodnuta');

        $validator
            ->allowEmpty('dotaciPoskytl');

        $validator
            ->allowEmpty('financniProstredekCleneni');

        $validator
            ->allowEmpty('financovanoZeZdroje');

        $validator
            ->allowEmpty('maSmlouvuORozhodnuti');

        $validator
            ->allowEmpty('refRozhodnutiRok');

        $validator
            ->integer('rokRozhodnuti')
            ->allowEmpty('rokRozhodnuti');

        $validator
            ->allowEmpty('rozpoctoveObdobi');

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
            ->allowEmpty('menaKod');

        $validator
            ->allowEmpty('investiceIndikator');

        $validator
            ->allowEmpty('navratnostIndikator');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('splatkaKalendar');

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
