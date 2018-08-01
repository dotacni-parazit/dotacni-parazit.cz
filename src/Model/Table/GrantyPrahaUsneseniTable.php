<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GrantyPrahaUsneseni Model
 *
 * @method \App\Model\Entity\GrantyPrahaUsneseni get($primaryKey, $options = [])
 * @method \App\Model\Entity\GrantyPrahaUsneseni newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaUsneseni[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaUsneseni|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrantyPrahaUsneseni patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaUsneseni[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaUsneseni findOrCreate($search, callable $callback = null, $options = [])
 */
class GrantyPrahaUsneseniTable extends Table
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

        $this->setTable('granty_praha_usneseni');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('cislo_usneseni')
            ->maxLength('cislo_usneseni', 14)
            ->allowEmpty('cislo_usneseni');

        $validator
            ->scalar('datum_schvaleni')
            ->maxLength('datum_schvaleni', 20)
            ->allowEmpty('datum_schvaleni');

        $validator
            ->scalar('schvalil')
            ->maxLength('schvalil', 18)
            ->allowEmpty('schvalil');

        $validator
            ->scalar('cislo_smlouvy')
            ->maxLength('cislo_smlouvy', 25)
            ->allowEmpty('cislo_smlouvy');

        $validator
            ->scalar('castka_pridelena')
            ->maxLength('castka_pridelena', 16)
            ->allowEmpty('castka_pridelena');

        $validator
            ->scalar('id_projekt')
            ->maxLength('id_projekt', 36)
            ->allowEmpty('id_projekt');

        $validator
            ->scalar('id_zadatel')
            ->maxLength('id_zadatel', 36)
            ->allowEmpty('id_zadatel');

        return $validator;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'cedr_custom';
    }
}
