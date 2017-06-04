<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikDotaceTitulParagrafV01 Model
 *
 * @method \App\Model\Entity\CiselnikDotaceTitulParagrafV01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulParagrafV01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulParagrafV01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulParagrafV01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulParagrafV01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulParagrafV01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikDotaceTitulParagrafV01 findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CiselnikDotaceTitulParagrafV01Table extends Table
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

        $this->setTable('ciselnik_dotace_titul_paragraf_v01');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('about', 'create')
            ->notEmpty('about')
            ->add('about', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('rozpoctovaSkladbaParagraf', 'create')
            ->notEmpty('rozpoctovaSkladbaParagraf');

        $validator
            ->dateTime('zaznamPlatnostDatum')
            ->requirePresence('zaznamPlatnostDatum', 'create')
            ->notEmpty('zaznamPlatnostDatum');

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
        $rules->add($rules->isUnique(['about']));

        return $rules;
    }
}
