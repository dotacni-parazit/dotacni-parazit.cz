<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EkonomikaSubjekt Model
 *
 * @method \App\Model\Entity\EkonomikaSubjekt get($primaryKey, $options = [])
 * @method \App\Model\Entity\EkonomikaSubjekt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EkonomikaSubjekt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EkonomikaSubjekt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EkonomikaSubjekt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EkonomikaSubjekt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EkonomikaSubjekt findOrCreate($search, callable $callback = null, $options = [])
 */
class EkonomikaSubjektTable extends Table
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

        $this->setTable('EkonomikaSubjekt');
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
            ->allowEmpty('id', 'create');

        $validator
            ->decimal('ico')
            ->requirePresence('ico', 'create')
            ->notEmpty('ico');

        return $validator;
    }
}
