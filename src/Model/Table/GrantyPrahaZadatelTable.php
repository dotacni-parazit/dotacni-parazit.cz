<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GrantyPrahaZadatel Model
 *
 * @method \App\Model\Entity\GrantyPrahaZadatel get($primaryKey, $options = [])
 * @method \App\Model\Entity\GrantyPrahaZadatel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaZadatel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaZadatel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrantyPrahaZadatel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaZadatel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaZadatel findOrCreate($search, callable $callback = null, $options = [])
 */
class GrantyPrahaZadatelTable extends Table
{

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'cedr_custom';
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('granty_praha_zadatele');
        $this->setDisplayField('nazev');
        $this->setPrimaryKey('id');

        $this->hasMany('GrantyPrahaCastky')
            ->setForeignKey('id_zadatel')
            ->setBindingKey('id_zadatel')
            ->setProperty('Castky');

        $this->hasOne('GrantyPrahaProjekty')
            ->setForeignKey('id_projekt')
            ->setBindingKey('id_projekt')
            ->setProperty('Projekt');
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
            ->scalar('nazev')
            ->maxLength('nazev', 168)
            ->allowEmpty('nazev');

        $validator
            ->decimal('ic')
            ->allowEmpty('ic');

        $validator
            ->scalar('pravni_forma')
            ->maxLength('pravni_forma', 40)
            ->allowEmpty('pravni_forma');

        $validator
            ->scalar('ulice')
            ->maxLength('ulice', 47)
            ->allowEmpty('ulice');

        $validator
            ->decimal('cislo_popisne')
            ->allowEmpty('cislo_popisne');

        $validator
            ->scalar('cislo_orientacni')
            ->maxLength('cislo_orientacni', 4)
            ->allowEmpty('cislo_orientacni');

        $validator
            ->scalar('mestska_cast')
            ->maxLength('mestska_cast', 27)
            ->allowEmpty('mestska_cast');

        $validator
            ->scalar('psc')
            ->maxLength('psc', 6)
            ->allowEmpty('psc');

        $validator
            ->scalar('obec')
            ->maxLength('obec', 32)
            ->allowEmpty('obec');

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
}
