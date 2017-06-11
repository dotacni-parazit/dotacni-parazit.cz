<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cache Model
 *
 * @method \App\Model\Entity\Cache get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cache newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cache[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cache|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cache patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cache[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cache findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CacheTable extends Table
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

        $this->setTable('cache');
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
            ->requirePresence('identifier', 'create')
            ->notEmpty('identifier');

        $validator
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        return $validator;
    }
}
