<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RDM Model
 *
 * @method \App\Model\Entity\RDM get($primaryKey, $options = [])
 * @method \App\Model\Entity\RDM newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RDM[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RDM|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RDM saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RDM patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RDM[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RDM findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RDMTable extends Table
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

        $this->setTable('eagri_rdm');
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('kod_prijemce')
            ->maxLength('kod_prijemce', 255)
            ->allowEmptyString('kod_prijemce');

        $validator
            ->integer('kod_prijemce_num')
            ->allowEmptyString('kod_prijemce_num');

        $validator
            ->scalar('ico_prijemce')
            ->maxLength('ico_prijemce', 255)
            ->allowEmptyString('ico_prijemce');

        $validator
            ->integer('ico_prijemce_num')
            ->allowEmptyString('ico_prijemce_num');

        $validator
            ->scalar('ico_poskytovatele')
            ->maxLength('ico_poskytovatele', 255)
            ->requirePresence('ico_poskytovatele', 'create')
            ->notEmptyString('ico_poskytovatele');

        $validator
            ->integer('castka_kc')
            ->requirePresence('castka_kc', 'create')
            ->notEmptyString('castka_kc');

        $validator
            ->scalar('ucel')
            ->requirePresence('ucel', 'create')
            ->notEmptyString('ucel');

        $validator
            ->scalar('in_year')
            ->requirePresence('in_year', 'create')
            ->notEmptyString('in_year');

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
