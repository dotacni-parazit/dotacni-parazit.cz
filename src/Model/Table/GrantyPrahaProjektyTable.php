<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GrantyPrahaProjekty Model
 *
 * @method \App\Model\Entity\GrantyPrahaProjekty get($primaryKey, $options = [])
 * @method \App\Model\Entity\GrantyPrahaProjekty newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaProjekty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaProjekty|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrantyPrahaProjekty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaProjekty[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GrantyPrahaProjekty findOrCreate($search, callable $callback = null, $options = [])
 */
class GrantyPrahaProjektyTable extends Table
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

        $this->setTable('granty_praha_projekty');
        $this->setDisplayField('nazev_projektu');
        $this->setPrimaryKey('id');

        $this->belongsTo('GrantyPrahaZadatel')
            ->setBindingKey('id_zadatel')
            ->setForeignKey('id_zadatel')
            ->setProperty('Zadatel');

        $this->hasMany('GrantyPrahaUsneseni')
            ->setBindingKey('id_projekt')
            ->setForeignKey('id_projekt')
            ->setProperty('Usneseni');
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
            ->scalar('cislo_projektu')
            ->maxLength('cislo_projektu', 14)
            ->allowEmpty('cislo_projektu');

        $validator
            ->scalar('nazev_projektu')
            ->maxLength('nazev_projektu', 255)
            ->allowEmpty('nazev_projektu');

        $validator
            ->scalar('popis')
            ->allowEmpty('popis');

        $validator
            ->scalar('stav')
            ->maxLength('stav', 30)
            ->allowEmpty('stav');

        $validator
            ->scalar('nazev_programu')
            ->maxLength('nazev_programu', 254)
            ->allowEmpty('nazev_programu');

        $validator
            ->scalar('nazev_oblasti')
            ->maxLength('nazev_oblasti', 51)
            ->allowEmpty('nazev_oblasti');

        $validator
            ->scalar('ucel_dotace')
            ->maxLength('ucel_dotace', 1050)
            ->allowEmpty('ucel_dotace');

        $validator
            ->scalar('rok_od')
            ->maxLength('rok_od', 6)
            ->allowEmpty('rok_od');

        $validator
            ->scalar('rok_do')
            ->maxLength('rok_do', 6)
            ->allowEmpty('rok_do');

        $validator
            ->numeric('castka_naklady')
            ->allowEmpty('castka_naklady');

        $validator
            ->numeric('castka_pozadovana')
            ->allowEmpty('castka_pozadovana');

        $validator
            ->numeric('castka_pridelena')
            ->allowEmpty('castka_pridelena');

        $validator
            ->numeric('castka_vycerpana')
            ->allowEmpty('castka_vycerpana');

        $validator
            ->scalar('id_projekt')
            ->maxLength('id_projekt', 36)
            ->allowEmpty('id_projekt')
            ->add('id_projekt', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('id_zadatel')
            ->maxLength('id_zadatel', 36)
            ->allowEmpty('id_zadatel');

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
        $rules->add($rules->isUnique(['id_projekt']));

        return $rules;
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
