<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AresSidla Model
 *
 * @method \App\Model\Entity\AresSidla get($primaryKey, $options = [])
 * @method \App\Model\Entity\AresSidla newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AresSidla[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AresSidla|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AresSidla patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AresSidla[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AresSidla findOrCreate($search, callable $callback = null, $options = [])
 */
class AresSidlaTable extends Table
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

        $this->setTable('sidla');
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
            ->scalar('ulice')
            ->maxLength('ulice', 48)
            ->allowEmpty('ulice');

        $validator
            ->scalar('obec')
            ->maxLength('obec', 48)
            ->allowEmpty('obec');

        $validator
            ->scalar('stat')
            ->maxLength('stat', 51)
            ->allowEmpty('stat');

        $validator
            ->decimal('psc')
            ->allowEmpty('psc');

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
