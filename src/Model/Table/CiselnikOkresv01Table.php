<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikOkresv01 Model
 *
 * @method \App\Model\Entity\CiselnikOkresv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikOkresv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikOkresv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikOkresv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikOkresv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikOkresv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikOkresv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikOkresv01Table extends Table
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

        $this->setTable('ciselnikOkresv01');
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
            ->decimal('okresKod')
            ->requirePresence('okresKod', 'create')
            ->notEmpty('okresKod');

        $validator
            ->requirePresence('okresNazev', 'create')
            ->notEmpty('okresNazev');

        $validator
            ->requirePresence('okresNutsKod', 'create')
            ->notEmpty('okresNutsKod');

        $validator
            ->requirePresence('krajNad', 'create')
            ->notEmpty('krajNad');

        $validator
            ->allowEmpty('vuscNad');

        $validator
            ->decimal('globalniNavrhZmenaIdentifikator')
            ->requirePresence('globalniNavrhZmenaIdentifikator', 'create')
            ->notEmpty('globalniNavrhZmenaIdentifikator');

        $validator
            ->boolean('nespravnostIndikator')
            ->requirePresence('nespravnostIndikator', 'create')
            ->notEmpty('nespravnostIndikator');

        $validator
            ->decimal('transakceIdentifikator')
            ->allowEmpty('transakceIdentifikator');

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
