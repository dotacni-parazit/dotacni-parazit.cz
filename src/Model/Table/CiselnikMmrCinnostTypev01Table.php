<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikMmrCinnostTypev01 Model
 *
 * @method \App\Model\Entity\CiselnikMmrCinnostTypev01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikMmrCinnostTypev01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrCinnostTypev01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrCinnostTypev01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikMmrCinnostTypev01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrCinnostTypev01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMmrCinnostTypev01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikMmrCinnostTypev01Table extends Table
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

        $this->setTable('ciselnikMmrCinnostTypev01');
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

        return $validator;
    }
}