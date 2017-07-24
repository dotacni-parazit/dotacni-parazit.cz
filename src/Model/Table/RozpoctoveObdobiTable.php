<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RozpoctoveObdobi Model
 *
 * @method \App\Model\Entity\RozpoctoveObdobi get($primaryKey, $options = [])
 * @method \App\Model\Entity\RozpoctoveObdobi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RozpoctoveObdobi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RozpoctoveObdobi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RozpoctoveObdobi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RozpoctoveObdobi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RozpoctoveObdobi findOrCreate($search, callable $callback = null, $options = [])
 */
class RozpoctoveObdobiTable extends Table
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

        $this->setTable('RozpoctoveObdobi');
        $this->setDisplayField('idObdobi');
        $this->setPrimaryKey('idObdobi');

        $this->belongsTo('CiselnikDotaceTitulv01', [
            'className' => 'CiselnikDotaceTitulv01'
        ])
            ->setForeignKey('iriDotacniTitul')
            ->setBindingKey('idDotaceTitul')
            ->setProperty('CiselnikDotaceTitulv01');

        $this->belongsTo('Rozhodnuti')
            ->setForeignKey('idRozhodnuti')
            ->setBindingKey('idRozhodnuti')
            ->setProperty('Rozhodnuti');
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
            ->allowEmpty('idObdobi', 'create');

        $validator
            ->requirePresence('idRozhodnuti', 'create')
            ->notEmpty('idRozhodnuti');

        $validator
            ->decimal('castkaCerpana')
            ->allowEmpty('castkaCerpana');

        $validator
            ->decimal('castkaUvolnena')
            ->allowEmpty('castkaUvolnena');

        $validator
            ->decimal('castkaVracena')
            ->allowEmpty('castkaVracena');

        $validator
            ->decimal('castkaSpotrebovana')
            ->allowEmpty('castkaSpotrebovana');

        $validator
            ->decimal('rozpoctoveObdobi')
            ->requirePresence('rozpoctoveObdobi', 'create')
            ->notEmpty('rozpoctoveObdobi');

        $validator
            ->boolean('vyporadaniKod')
            ->allowEmpty('vyporadaniKod');

        $validator
            ->allowEmpty('iriDotacniTitul');

        $validator
            ->allowEmpty('iriUcelovyZnak');

        $validator
            ->dateTime('dPlatnost')
            ->requirePresence('dPlatnost', 'create')
            ->notEmpty('dPlatnost');

        $validator
            ->dateTime('dtAktualizace')
            ->requirePresence('dtAktualizace', 'create')
            ->notEmpty('dtAktualizace');

        return $validator;
    }
}
