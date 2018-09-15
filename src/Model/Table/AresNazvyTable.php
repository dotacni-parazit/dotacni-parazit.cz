<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AresNazvy Model
 *
 * @method \App\Model\Entity\AresNazvy get($primaryKey, $options = [])
 * @method \App\Model\Entity\AresNazvy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AresNazvy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AresNazvy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AresNazvy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AresNazvy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AresNazvy findOrCreate($search, callable $callback = null, $options = [])
 */
class AresNazvyTable extends Table
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

        $this->setTable('nazvy');
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
            ->scalar('nazev')
            ->maxLength('nazev', 389)
            ->allowEmpty('nazev');

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
