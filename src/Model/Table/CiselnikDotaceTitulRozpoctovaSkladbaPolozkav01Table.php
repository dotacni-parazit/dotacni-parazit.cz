<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01 Model
 *
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01 saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01Table extends Table
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

        $this->setTable('ciselnikDotaceTitul_RozpoctovaSkladbaPolozkav01');
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
            ->scalar('idDotaceTitul')
            ->maxLength('idDotaceTitul', 120)
            ->requirePresence('idDotaceTitul', 'create')
            ->notEmptyString('idDotaceTitul');

        $validator
            ->scalar('idRozpoctovaSkladbaPolozka')
            ->maxLength('idRozpoctovaSkladbaPolozka', 120)
            ->requirePresence('idRozpoctovaSkladbaPolozka', 'create')
            ->notEmptyString('idRozpoctovaSkladbaPolozka');

        return $validator;
    }
}
