<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GrantyPrahaCastky Model
 *
 * @method \App\Model\Entity\GrantyPrahaCastky get($primaryKey, $options = [])
 * @method \App\Model\Entity\GrantyPrahaCastky newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaCastky[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaCastky|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrantyPrahaCastky patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaCastky[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaCastky findOrCreate($search, callable $callback = null, $options = [])
 */
class GrantyPrahaCastkyTable extends Table
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

        $this->setTable('granty_praha_castky');
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
            ->numeric('castka_naklady')
            ->requirePresence('castka_naklady', 'create')
            ->notEmpty('castka_naklady');

        $validator
            ->numeric('castka_pozadovana')
            ->requirePresence('castka_pozadovana', 'create')
            ->notEmpty('castka_pozadovana');

        $validator
            ->numeric('castka_pridelena')
            ->requirePresence('castka_pridelena', 'create')
            ->notEmpty('castka_pridelena');

        $validator
            ->numeric('castka_vycerpana')
            ->requirePresence('castka_vycerpana', 'create')
            ->notEmpty('castka_vycerpana');

        $validator
            ->scalar('id_projekt')
            ->maxLength('id_projekt', 36)
            ->requirePresence('id_projekt', 'create')
            ->notEmpty('id_projekt');

        $validator
            ->scalar('id_zadatel')
            ->maxLength('id_zadatel', 36)
            ->requirePresence('id_zadatel', 'create')
            ->notEmpty('id_zadatel');

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
