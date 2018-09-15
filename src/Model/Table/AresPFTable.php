<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AresPF Model
 *
 * @method \App\Model\Entity\AresPF get($primaryKey, $options = [])
 * @method \App\Model\Entity\AresPF newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AresPF[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AresPF|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AresPF patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AresPF[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AresPF findOrCreate($search, callable $callback = null, $options = [])
 */
class AresPFTable extends Table
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

        $this->setTable('pravni_formy');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->decimal('ico')
            ->requirePresence('ico', 'create')
            ->notEmpty('ico');

        $validator
            ->date('dod')
            ->requirePresence('dod', 'create')
            ->notEmpty('dod');

        $validator
            ->date('ddo')
            ->allowEmpty('ddo');

        $validator
            ->decimal('kpf')
            ->requirePresence('kpf', 'create')
            ->notEmpty('kpf');

        $validator
            ->scalar('npf')
            ->maxLength('npf', 88)
            ->allowEmpty('npf');

        $validator
            ->scalar('pfo')
            ->maxLength('pfo', 1)
            ->requirePresence('pfo', 'create')
            ->notEmpty('pfo');

        $validator
            ->scalar('tzu')
            ->maxLength('tzu', 10)
            ->requirePresence('tzu', 'create')
            ->notEmpty('tzu');

        return $validator;
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
