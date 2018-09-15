<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Budova Model
 *
 * @method \App\Model\Entity\Budova get($primaryKey, $options = [])
 * @method \App\Model\Entity\Budova newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Budova[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Budova|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Budova patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Budova[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Budova findOrCreate($search, callable $callback = null, $options = [])
 */
class BudovaTable extends Table
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

        $this->setTable('budova');
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
            ->integer('pocetDotaci')
            ->allowEmpty('pocetDotaci');

        $validator
            ->scalar('iriStat')
            ->maxLength('iriStat', 512)
            ->allowEmpty('iriStat');

        $validator
            ->scalar('ulice')
            ->maxLength('ulice', 512)
            ->allowEmpty('ulice');

        $validator
            ->integer('cisloDomovni')
            ->allowEmpty('cisloDomovni');

        $validator
            ->integer('psc')
            ->allowEmpty('psc');

        $validator
            ->integer('pocetPrijemcu')
            ->allowEmpty('pocetPrijemcu');

        $validator
            ->allowEmpty('castkaPozadovanaSum');

        $validator
            ->allowEmpty('castkaRozhodnuta');

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
