<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dotinfo Model
 *
 * @method \App\Model\Entity\Dotinfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dotinfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dotinfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dotinfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dotinfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dotinfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dotinfo findOrCreate($search, callable $callback = null, $options = [])
 */
class DotinfoTable extends Table
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

        $this->setTable('Dotinfo');
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
            ->allowEmpty('idDotace');

        $validator
            ->allowEmpty('projektIdentifikator');

        $validator
            ->allowEmpty('dotaceNazev');

        $validator
            ->allowEmpty('ucastnikObchodniJmeno');

        $validator
            ->allowEmpty('ucastnikIco');

        $validator
            ->allowEmpty('ucelDotace');

        $validator
            ->allowEmpty('poskytovatelNazev');

        $validator
            ->allowEmpty('poskytovatelIco');

        $validator
            ->allowEmpty('castkaPozadovana');

        $validator
            ->allowEmpty('castkaSchvalena');

        $validator
            ->allowEmpty('datumPoskytnuti');

        $validator
            ->allowEmpty('dotinfoId');

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
