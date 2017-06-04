<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikRozpoctovaSkladbaPolozkav01 Model
 *
 * @method \App\Model\Entity\CiselnikRozpoctovaSkladbaPolozkav01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikRozpoctovaSkladbaPolozkav01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikRozpoctovaSkladbaPolozkav01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikRozpoctovaSkladbaPolozkav01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikRozpoctovaSkladbaPolozkav01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikRozpoctovaSkladbaPolozkav01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikRozpoctovaSkladbaPolozkav01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikRozpoctovaSkladbaPolozkav01Table extends Table
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

        $this->setTable('ciselnikRozpoctovaSkladbaPolozkav01');
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
            ->decimal('rozpoctovaSkladbaPolozkaKod')
            ->requirePresence('rozpoctovaSkladbaPolozkaKod', 'create')
            ->notEmpty('rozpoctovaSkladbaPolozkaKod');

        $validator
            ->requirePresence('rozpoctovaSkladbaPolozkaNazev', 'create')
            ->notEmpty('rozpoctovaSkladbaPolozkaNazev');

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
