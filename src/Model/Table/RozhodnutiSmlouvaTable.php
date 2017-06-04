<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RozhodnutiSmlouva Model
 *
 * @method \App\Model\Entity\RozhodnutiSmlouva get($primaryKey, $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RozhodnutiSmlouva findOrCreate($search, callable $callback = null, $options = [])
 */
class RozhodnutiSmlouvaTable extends Table
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

        $this->setTable('RozhodnutiSmlouva');
        $this->setDisplayField('idSmlouva');
        $this->setPrimaryKey('idSmlouva');
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
            ->allowEmpty('idSmlouva', 'create');

        $validator
            ->requirePresence('idRozhodnuti', 'create')
            ->notEmpty('idRozhodnuti');

        $validator
            ->requirePresence('cisloJednaciRozhodnuti', 'create')
            ->notEmpty('cisloJednaciRozhodnuti');

        $validator
            ->boolean('dokumentDruhKod')
            ->requirePresence('dokumentDruhKod', 'create')
            ->notEmpty('dokumentDruhKod');

        $validator
            ->dateTime('rozhodnutiDatum')
            ->requirePresence('rozhodnutiDatum', 'create')
            ->notEmpty('rozhodnutiDatum');

        $validator
            ->dateTime('dtAktualizace')
            ->requirePresence('dtAktualizace', 'create')
            ->notEmpty('dtAktualizace');

        return $validator;
    }
}
