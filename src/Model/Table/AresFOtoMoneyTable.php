<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AresFOtoMoney Model
 *
 * @property \App\Model\Table\FyzickeOsobyTable|\Cake\ORM\Association\BelongsTo $FyzickeOsoby
 *
 * @method \App\Model\Entity\AresFOtoMoney get($primaryKey, $options = [])
 * @method \App\Model\Entity\AresFOtoMoney newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AresFOtoMoney[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AresFOtoMoney|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AresFOtoMoney patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AresFOtoMoney[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AresFOtoMoney findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AresFOtoMoneyTable extends Table
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

        $this->setTable('fyzicke_osoby_to_money');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('FyzickeOsoby', [
            'foreignKey' => 'fo_id',
            'joinType' => 'INNER'
        ]);
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
            ->decimal('sum_cedr_rozhodnuti')
            ->requirePresence('sum_cedr_rozhodnuti', 'create')
            ->notEmpty('sum_cedr_rozhodnuti');

        $validator
            ->decimal('sum_cedr_spotreba')
            ->requirePresence('sum_cedr_spotreba', 'create')
            ->notEmpty('sum_cedr_spotreba');

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
        $rules->add($rules->existsIn(['fo_id'], 'FyzickeOsoby'));

        return $rules;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'ares_kokes';
    }
}
