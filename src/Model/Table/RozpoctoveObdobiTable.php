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
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->setTable('rozpoctove_obdobi');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->decimal('castkaCerpana')
            ->allowEmpty('castkaCerpana');

        $validator
            ->decimal('castkaSpotrebovana')
            ->allowEmpty('castkaSpotrebovana');

        $validator
            ->decimal('castkaUvolnena')
            ->allowEmpty('castkaUvolnena');

        $validator
            ->allowEmpty('dotaceTitul');

        $validator
            ->allowEmpty('refRozpoctoveObdobi');

        $validator
            ->integer('rozpocetObdobi')
            ->allowEmpty('rozpocetObdobi');

        $validator
            ->allowEmpty('ucelZnak');

        $validator
            ->dateTime('zaznamAktualizaceDatumCas')
            ->allowEmpty('zaznamAktualizaceDatumCas');

        $validator
            ->requirePresence('zaznamIdentifikator', 'create')
            ->notEmpty('zaznamIdentifikator')
            ->add('zaznamIdentifikator', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->dateTime('zaznamPlatnostDatum')
            ->allowEmpty('zaznamPlatnostDatum');

        $validator
            ->allowEmpty('menaKod');

        $validator
            ->allowEmpty('title');

        $validator
            ->decimal('castkaVracena')
            ->allowEmpty('castkaVracena');

        $validator
            ->requirePresence('about', 'create')
            ->notEmpty('about')
            ->add('about', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['about']));
        $rules->add($rules->isUnique(['zaznamIdentifikator']));

        return $rules;
    }
}
