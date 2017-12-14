<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01 Model
 *
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01Table extends Table
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

        $this->setTable('ciselnikDotaceTitul_RozpoctovaSkladbaParagrafv01');
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
            ->requirePresence('idDotaceTitul', 'create')
            ->notEmpty('idDotaceTitul');

        $validator
            ->requirePresence('idRozpoctovaSkladbaParagraf', 'create')
            ->notEmpty('idRozpoctovaSkladbaParagraf');

        $validator
            ->dateTime('zaznamDatumPlatnost')
            ->requirePresence('zaznamDatumPlatnost', 'create')
            ->notEmpty('zaznamDatumPlatnost');

        return $validator;
    }
}
