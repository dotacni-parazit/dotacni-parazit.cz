<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BudovaAdresa Model
 *
 * @method \App\Model\Entity\BudovaAdresa get($primaryKey, $options = [])
 * @method \App\Model\Entity\BudovaAdresa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BudovaAdresa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BudovaAdresa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BudovaAdresa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BudovaAdresa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BudovaAdresa findOrCreate($search, callable $callback = null, $options = [])
 */
class BudovaAdresaTable extends Table
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

        $this->setTable('budovaAdresa');
        $this->setDisplayField('idBudova');
        $this->setPrimaryKey(['idBudova', 'idAdresaSidlo']);
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
            ->integer('idBudova')
            ->allowEmpty('idBudova', 'create');

        $validator
            ->integer('idAdresaSidlo')
            ->allowEmpty('idAdresaSidlo', 'create');

        return $validator;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'hackujstat';
    }
}
