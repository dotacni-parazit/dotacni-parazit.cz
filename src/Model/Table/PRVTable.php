<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PRV Model
 *
 * @method \App\Model\Entity\PRV get($primaryKey, $options = [])
 * @method \App\Model\Entity\PRV newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PRV[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PRV|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PRV patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PRV[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PRV findOrCreate($search, callable $callback = null, $options = [])
 */
class PRVTable extends Table
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

        $this->setTable('program_rozvoje_venkova');
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
            ->allowEmpty('ico');

        $validator
            ->requirePresence('jmeno', 'create')
            ->notEmpty('jmeno');

        $validator
            ->requirePresence('obec', 'create')
            ->notEmpty('obec');

        $validator
            ->requirePresence('okres', 'create')
            ->notEmpty('okres');

        $validator
            ->requirePresence('zdroj', 'create')
            ->notEmpty('zdroj');

        $validator
            ->requirePresence('opatreni', 'create')
            ->notEmpty('opatreni');

        $validator
            ->decimal('czk_tuzemske')
            ->requirePresence('czk_tuzemske', 'create')
            ->notEmpty('czk_tuzemske');

        $validator
            ->decimal('czk_evropske')
            ->requirePresence('czk_evropske', 'create')
            ->notEmpty('czk_evropske');

        $validator
            ->decimal('czk_celkem')
            ->requirePresence('czk_celkem', 'create')
            ->notEmpty('czk_celkem');

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
