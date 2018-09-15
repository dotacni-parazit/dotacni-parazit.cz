<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AresAngosPO Model
 *
 * @method \App\Model\Entity\AresAngosPO get($primaryKey, $options = [])
 * @method \App\Model\Entity\AresAngosPO newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AresAngosPO[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AresAngosPO|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AresAngosPO patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AresAngosPO[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AresAngosPO findOrCreate($search, callable $callback = null, $options = [])
 */
class AresAngosPOTable extends Table
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

        $this->setTable('angos_po');
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
            ->decimal('ico')
            ->requirePresence('ico', 'create')
            ->notEmpty('ico');

        $validator
            ->date('dod')
            ->requirePresence('dod', 'create')
            ->notEmpty('dod');

        $validator
            ->date('ddo')
            ->allowEmpty('ddo');

        $validator
            ->scalar('nazev_ang')
            ->maxLength('nazev_ang', 20)
            ->requirePresence('nazev_ang', 'create')
            ->notEmpty('nazev_ang');

        $validator
            ->decimal('kategorie_ang')
            ->requirePresence('kategorie_ang', 'create')
            ->notEmpty('kategorie_ang');

        $validator
            ->scalar('funkce')
            ->maxLength('funkce', 109)
            ->allowEmpty('funkce');

        $validator
            ->date('clenstvi_zacatek')
            ->allowEmpty('clenstvi_zacatek');

        $validator
            ->date('clenstvi_konec')
            ->allowEmpty('clenstvi_konec');

        $validator
            ->date('funkce_zacatek')
            ->allowEmpty('funkce_zacatek');

        $validator
            ->date('funkce_konec')
            ->allowEmpty('funkce_konec');

        $validator
            ->decimal('ico_ang')
            ->allowEmpty('ico_ang');

        $validator
            ->scalar('izo_ang')
            ->maxLength('izo_ang', 122)
            ->allowEmpty('izo_ang');

        $validator
            ->scalar('nazev')
            ->maxLength('nazev', 255)
            ->allowEmpty('nazev');

        $validator
            ->scalar('pravni_forma')
            ->maxLength('pravni_forma', 88)
            ->allowEmpty('pravni_forma');

        $validator
            ->scalar('stat')
            ->maxLength('stat', 51)
            ->allowEmpty('stat');

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
