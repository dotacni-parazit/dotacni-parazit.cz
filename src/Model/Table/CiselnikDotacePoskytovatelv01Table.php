<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikDotacePoskytovatelv01 Model
 *
 * @method \App\Model\Entity\CiselnikDotacePoskytovatelv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikDotacePoskytovatelv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikDotacePoskytovatelv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotacePoskytovatelv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikDotacePoskytovatelv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotacePoskytovatelv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotacePoskytovatelv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikDotacePoskytovatelv01Table extends Table
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

        $this->setTable('ciselnikDotacePoskytovatelv01');
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
            ->decimal('dotacePoskytovatelKod')
            ->requirePresence('dotacePoskytovatelKod', 'create')
            ->notEmpty('dotacePoskytovatelKod');

        $validator
            ->requirePresence('dotacePoskytovatelNazev', 'create')
            ->notEmpty('dotacePoskytovatelNazev');

        $validator
            ->boolean('dotacePoskytovatelNadrizenyKod')
            ->allowEmpty('dotacePoskytovatelNadrizenyKod');

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
