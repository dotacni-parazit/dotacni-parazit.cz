<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AresUdaje Model
 *
 * @method \App\Model\Entity\AresUdaje get($primaryKey, $options = [])
 * @method \App\Model\Entity\AresUdaje newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AresUdaje[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AresUdaje|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AresUdaje patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AresUdaje[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AresUdaje findOrCreate($search, callable $callback = null, $options = [])
 */
class AresUdajeTable extends Table
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

        $this->setTable('udaje');
        $this->setDisplayField('ico');
        $this->setPrimaryKey('ico');
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
            ->decimal('ico')
            ->allowEmpty('ico', 'create');

        $validator
            ->date('aktualizace_db')
            ->requirePresence('aktualizace_db', 'create')
            ->notEmpty('aktualizace_db');

        $validator
            ->date('datum_vypisu')
            ->requirePresence('datum_vypisu', 'create')
            ->notEmpty('datum_vypisu');

        $validator
            ->date('platnost_od')
            ->allowEmpty('platnost_od');

        $validator
            ->date('datum_zapisu')
            ->requirePresence('datum_zapisu', 'create')
            ->notEmpty('datum_zapisu');

        $validator
            ->scalar('stav_subjektu')
            ->requirePresence('stav_subjektu', 'create')
            ->notEmpty('stav_subjektu');

        return $validator;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'ares_kokes';
    }
}
