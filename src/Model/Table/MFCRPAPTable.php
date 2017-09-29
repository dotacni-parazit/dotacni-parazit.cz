<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MFCRPAP Model
 *
 * @method \App\Model\Entity\MFCRPAP get($primaryKey, $options = [])
 * @method \App\Model\Entity\MFCRPAP newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MFCRPAP[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MFCRPAP|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MFCRPAP patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MFCRPAP[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MFCRPAP findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MFCRPAPTable extends Table
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

        $this->setTable('pap_ico');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PrijemcePomoci')
            ->setBindingKey('idPrijemce')
            ->setForeignKey('idPrijemce')
            ->setProperty('PrijemcePomoci')
            ->setStrategy('select');

        $this->belongsTo('PrvniDotace', [
            'className' => 'Dotace',
            'foreignKey' => 'distance_start_dotace',
            'bindingKey' => 'idDotace',
            'strategy' => 'select',
            'propertyName' => 'PrvniDotace'
        ]);

        $this->belongsTo('PosledniDotace', [
            'className' => 'Dotace',
            'foreignKey' => 'distance_end_dotace',
            'bindingKey' => 'idDotace',
            'strategy' => 'select',
            'propertyName' => 'PosledniDotace'
        ]);
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
            ->requirePresence('ico', 'create')
            ->notEmpty('ico');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->date('start')
            ->requirePresence('start', 'create')
            ->notEmpty('start');

        $validator
            ->date('end')
            ->allowEmpty('end');

        $validator
            ->integer('distance_start_days')
            ->allowEmpty('distance_start_days');

        $validator
            ->integer('distance_end_days')
            ->allowEmpty('distance_end_days');

        return $validator;
    }
}
