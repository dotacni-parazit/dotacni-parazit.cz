<?php
namespace App\Model\Table;

use App\Model\Entity\CiselnikUcelZnakDotacniTitulv01;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikUcelZnakv01 Model
 *
 * @method \App\Model\Entity\CiselnikUcelZnakv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikUcelZnakv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikUcelZnakv01Table extends Table
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

        $this->setTable('ciselnikUcelZnakv01');
        $this->setDisplayField('idUcelZnak');
        $this->setPrimaryKey('idUcelZnak');

        $this->hasMany('CiselnikUcelZnakDotacniTitulv01')
            ->setForeignKey('idUcelZnak')
            ->setBindingKey('idUcelZnak')
            ->setProperty('DotacniTituly');
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
            ->allowEmpty('idUcelZnak', 'create');

        $validator
            ->decimal('ucelZnakKod')
            ->requirePresence('ucelZnakKod', 'create')
            ->notEmpty('ucelZnakKod');

        $validator
            ->decimal('statniRozpocetKapitolaKod')
            ->allowEmpty('statniRozpocetKapitolaKod');

        $validator
            ->requirePresence('ucelZnakNazev', 'create')
            ->notEmpty('ucelZnakNazev');

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
