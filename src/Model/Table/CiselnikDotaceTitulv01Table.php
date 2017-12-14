<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikDotaceTitulv01 Model
 *
 * @method \App\Model\Entity\CiselnikDotaceTitulv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikDotaceTitulv01Table extends Table
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

        $this->setTable('ciselnikDotaceTitulv01');
        $this->setDisplayField('idDotaceTitul');
        $this->setPrimaryKey('idDotaceTitul');

        $this->belongsTo('CiselnikStatniRozpocetKapitolav01')
            ->setBindingKey('statniRozpocetKapitolaKod')
            ->setForeignKey('statniRozpocetKapitolaKod')
            ->setProperty('CiselnikStatniRozpocetKapitola');

        $this->hasMany('RozpoctoveObdobi')
            ->setBindingKey('iriDotacniTitul')
            ->setForeignKey('idDotaceTitul')
            ->setProperty('RozpoctoveObdobi');

        $this->hasOne('CiselnikDotaceTitulStatniRozpocetUkazatelv01')
            ->setBindingKey('idDotaceTitul')
            ->setForeignKey('idDotaceTitul')
            ->setProperty('StatniRozpocetUkazatel');
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
            ->allowEmpty('idDotaceTitul', 'create');

        $validator
            ->decimal('dotaceTitulKod')
            ->requirePresence('dotaceTitulKod', 'create')
            ->notEmpty('dotaceTitulKod');

        $validator
            ->requirePresence('dotaceTitulVlastniKod', 'create')
            ->notEmpty('dotaceTitulVlastniKod');

        $validator
            ->decimal('statniRozpocetKapitolaKod')
            ->requirePresence('statniRozpocetKapitolaKod', 'create')
            ->notEmpty('statniRozpocetKapitolaKod');

        $validator
            ->requirePresence('dotaceTitulNazev', 'create')
            ->notEmpty('dotaceTitulNazev');

        $validator
            ->requirePresence('dotaceTitulNazevZkraceny', 'create')
            ->notEmpty('dotaceTitulNazevZkraceny');

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
