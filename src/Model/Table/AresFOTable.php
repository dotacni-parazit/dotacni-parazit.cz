<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AresFO Model
 *
 * @method \App\Model\Entity\AresFO get($primaryKey, $options = [])
 * @method \App\Model\Entity\AresFO newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AresFO[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AresFO|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AresFO patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AresFO[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AresFO findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AresFOTable extends Table
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

        $this->setTable('fyzicke_osoby');
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
            ->date('datum_narozeni')
            ->requirePresence('datum_narozeni', 'create')
            ->notEmpty('datum_narozeni');

        $validator
            ->scalar('jmeno')
            ->maxLength('jmeno', 100)
            ->requirePresence('jmeno', 'create')
            ->notEmpty('jmeno');

        $validator
            ->scalar('prijmeni')
            ->maxLength('prijmeni', 255)
            ->requirePresence('prijmeni', 'create')
            ->notEmpty('prijmeni');

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
