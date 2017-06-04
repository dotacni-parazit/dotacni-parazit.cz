<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RozhodnutiSmlouva Model
 *
 * @method \App\Model\Entity\RozhodnutiSmlouva get($primaryKey, $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RozhodnutiSmlouvaTable extends Table
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

        $this->setTable('rozhodnuti_smlouva');
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
            ->requirePresence('cisloJednaciRozhodnuti', 'create')
            ->notEmpty('cisloJednaciRozhodnuti');

        $validator
            ->integer('dokumentDruhKod')
            ->requirePresence('dokumentDruhKod', 'create')
            ->notEmpty('dokumentDruhKod');

        $validator
            ->dateTime('rozhodnutiDatum')
            ->requirePresence('rozhodnutiDatum', 'create')
            ->notEmpty('rozhodnutiDatum');

        $validator
            ->dateTime('zaznamAktualizaceDatumCas')
            ->requirePresence('zaznamAktualizaceDatumCas', 'create')
            ->notEmpty('zaznamAktualizaceDatumCas');

        $validator
            ->requirePresence('zaznamIdentifikator', 'create')
            ->notEmpty('zaznamIdentifikator')
            ->add('zaznamIdentifikator', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

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
