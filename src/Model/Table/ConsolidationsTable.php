<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Consolidations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Companies
 * @property \Cake\ORM\Association\BelongsTo $Companies
 * @property \Cake\ORM\Association\BelongsTo $Attachments
 *
 * @method \App\Model\Entity\Consolidation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Consolidation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Consolidation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Consolidation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Consolidation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Consolidation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Consolidation findOrCreate($search, callable $callback = null, $options = [])
 */
class ConsolidationsTable extends Table
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

        $this->setTable('consolidations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Companies', [
            'foreignKey' => 'holding_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'subsidiary_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Attachments', [
            'foreignKey' => 'attachment_id'
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
            ->integer('year')
            ->requirePresence('year', 'create')
            ->notEmpty('year');

        $validator
            ->decimal('shares_percent')
            ->allowEmpty('shares_percent');

        $validator
            ->allowEmpty('notes');

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
        $rules->add($rules->existsIn(['holding_id'], 'Companies'));
        $rules->add($rules->existsIn(['subsidiary_id'], 'Companies'));
        $rules->add($rules->existsIn(['attachment_id'], 'Attachments'));

        return $rules;
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
