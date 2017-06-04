<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikStatniRozpocetKapitolav01 Model
 *
 * @method \App\Model\Entity\CiselnikStatniRozpocetKapitolav01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetKapitolav01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetKapitolav01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetKapitolav01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetKapitolav01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetKapitolav01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikStatniRozpocetKapitolav01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikStatniRozpocetKapitolav01Table extends Table
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

        $this->setTable('ciselnikStatniRozpocetKapitolav01');
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
            ->decimal('statniRozpocetKapitolaKod')
            ->requirePresence('statniRozpocetKapitolaKod', 'create')
            ->notEmpty('statniRozpocetKapitolaKod');

        $validator
            ->requirePresence('statniRozpocetKapitolaNazev', 'create')
            ->notEmpty('statniRozpocetKapitolaNazev');

        $validator
            ->dateTime('zaznamPlatnostOdDatum')
            ->requirePresence('zaznamPlatnostOdDatum', 'create')
            ->notEmpty('zaznamPlatnostOdDatum');

        $validator
            ->dateTime('zaznamPlatnostDoDatum')
            ->requirePresence('zaznamPlatnostDoDatum', 'create')
            ->notEmpty('zaznamPlatnostDoDatum');

        return $validator;
    }
}
