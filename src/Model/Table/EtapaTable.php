<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Etapa Model
 *
 * @method \App\Model\Entity\Etapa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Etapa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Etapa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Etapa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etapa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Etapa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Etapa findOrCreate($search, callable $callback = null, $options = [])
 */
class EtapaTable extends Table
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

        $this->setTable('Etapa');
        $this->setDisplayField('idEtapa');
        $this->setPrimaryKey('idEtapa');
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
            ->allowEmpty('idEtapa', 'create');

        $validator
            ->requirePresence('idDotace', 'create')
            ->notEmpty('idDotace');

        $validator
            ->decimal('etapaCislo')
            ->requirePresence('etapaCislo', 'create')
            ->notEmpty('etapaCislo');

        $validator
            ->requirePresence('etapaNazev', 'create')
            ->notEmpty('etapaNazev');

        $validator
            ->dateTime('ukonceniPlanovaneDatum')
            ->requirePresence('ukonceniPlanovaneDatum', 'create')
            ->notEmpty('ukonceniPlanovaneDatum');

        $validator
            ->dateTime('ukonceniSkutecneDatum')
            ->requirePresence('ukonceniSkutecneDatum', 'create')
            ->notEmpty('ukonceniSkutecneDatum');

        $validator
            ->dateTime('zahajeniPlanovaneDatum')
            ->requirePresence('zahajeniPlanovaneDatum', 'create')
            ->notEmpty('zahajeniPlanovaneDatum');

        $validator
            ->dateTime('zahajeniSkutecneDatum')
            ->requirePresence('zahajeniSkutecneDatum', 'create')
            ->notEmpty('zahajeniSkutecneDatum');

        $validator
            ->allowEmpty('poznamka');

        $validator
            ->dateTime('dtAktualizace')
            ->requirePresence('dtAktualizace', 'create')
            ->notEmpty('dtAktualizace');

        return $validator;
    }
}
