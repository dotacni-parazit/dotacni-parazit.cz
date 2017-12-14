<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikUcelZnakDotacniTitulv01 Model
 *
 * @method \App\Model\Entity\CiselnikUcelZnakDotacniTitulv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakDotacniTitulv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakDotacniTitulv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakDotacniTitulv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakDotacniTitulv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakDotacniTitulv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakDotacniTitulv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikUcelZnakDotacniTitulv01Table extends Table
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

        $this->setTable('ciselnikUcelZnak_DotacniTitulv01');

        $this->belongsTo('CiselnikDotaceTitulv01')
            ->setProperty('DotaceTitul')
            ->setBindingKey('idDotaceTitul')
            ->setForeignKey('idDotaceTitul');

        $this->belongsTo('CiselnikUcelZnakv01')
            ->setProperty('UcelZnak')
            ->setBindingKey('idUcelZnak')
            ->setForeignKey('idUcelZnak');
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
            ->requirePresence('idUcelZnak', 'create')
            ->notEmpty('idUcelZnak');

        $validator
            ->requirePresence('idDotaceTitul', 'create')
            ->notEmpty('idDotaceTitul');

        $validator
            ->dateTime('zaznamDatumPlatnost')
            ->requirePresence('zaznamDatumPlatnost', 'create')
            ->notEmpty('zaznamDatumPlatnost');

        return $validator;
    }
}
