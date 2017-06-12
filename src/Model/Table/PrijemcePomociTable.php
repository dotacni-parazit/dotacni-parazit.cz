<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrijemcePomoci Model
 *
 * @method \App\Model\Entity\PrijemcePomoci get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrijemcePomoci newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PrijemcePomoci[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrijemcePomoci|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrijemcePomoci patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrijemcePomoci[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrijemcePomoci findOrCreate($search, callable $callback = null, $options = [])
 */
class PrijemcePomociTable extends Table
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

        $this->setTable('PrijemcePomoci');
        $this->setDisplayField('idPrijemce');
        $this->setPrimaryKey('idPrijemce');

        $this->belongsTo('EkonomikaSubjekt')
            ->setForeignKey('iriEkonomikaSubjekt')
            ->setBindingKey('id')
            ->setProperty('EkonomikaSubjekt');

        $this->belongsTo('CiselnikPravniFormav01')
            ->setForeignKey('iriPravniForma')
            ->setBindingKey('id')
            ->setProperty('PravniForma');

        $this->belongsTo('CiselnikStatv01')
            ->setForeignKey('iriStat')
            ->setBindingKey('id')
            ->setProperty('Stat');

        $this->belongsTo('Osoba')
            ->setForeignKey('iriOsoba')
            ->setBindingKey('id')
            ->setProperty('Osoba');
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
            ->allowEmpty('idPrijemce', 'create');

        $validator
            ->decimal('ico')
            ->allowEmpty('ico');

        $validator
            ->allowEmpty('obchodniJmeno');

        $validator
            ->allowEmpty('jmeno');

        $validator
            ->allowEmpty('prijmeni');

        $validator
            ->requirePresence('iriPravniForma', 'create')
            ->notEmpty('iriPravniForma');

        $validator
            ->decimal('rokNarozeni')
            ->allowEmpty('rokNarozeni');

        $validator
            ->requirePresence('iriStat', 'create')
            ->notEmpty('iriStat');

        $validator
            ->allowEmpty('iriOsoba');

        $validator
            ->allowEmpty('iriEkonomikaSubjekt');

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
