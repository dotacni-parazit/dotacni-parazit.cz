<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AresAngosFO Model
 *
 * @method \App\Model\Entity\AresAngosFO get($primaryKey, $options = [])
 * @method \App\Model\Entity\AresAngosFO newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AresAngosFO[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AresAngosFO|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AresAngosFO patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AresAngosFO[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AresAngosFO findOrCreate($search, callable $callback = null, $options = [])
 */
class AresAngosFOTable extends Table
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

        $this->setTable('angos_fo');
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
            ->maxLength('funkce', 119)
            ->allowEmpty('funkce');

        $validator
            ->scalar('clenstvi_zacatek')
            ->maxLength('clenstvi_zacatek', 10)
            ->allowEmpty('clenstvi_zacatek');

        $validator
            ->scalar('clenstvi_konec')
            ->maxLength('clenstvi_konec', 10)
            ->allowEmpty('clenstvi_konec');

        $validator
            ->date('funkce_zacatek')
            ->allowEmpty('funkce_zacatek');

        $validator
            ->scalar('funkce_konec')
            ->maxLength('funkce_konec', 10)
            ->allowEmpty('funkce_konec');

        $validator
            ->scalar('titul_pred')
            ->maxLength('titul_pred', 28)
            ->allowEmpty('titul_pred');

        $validator
            ->scalar('titul_za')
            ->maxLength('titul_za', 40)
            ->allowEmpty('titul_za');

        $validator
            ->scalar('jmeno')
            ->maxLength('jmeno', 66)
            ->allowEmpty('jmeno');

        $validator
            ->scalar('prijmeni')
            ->maxLength('prijmeni', 244)
            ->allowEmpty('prijmeni');

        $validator
            ->date('datum_narozeni')
            ->allowEmpty('datum_narozeni');

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
