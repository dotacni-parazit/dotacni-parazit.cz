<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CiselnikMestskyObvodMestskaCastv01 Model
 *
 * @method \App\Model\Entity\CiselnikMestskyObvodMestskaCastv01 get($primaryKey, $options = [])
 * @method \App\Model\Entity\CiselnikMestskyObvodMestskaCastv01 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CiselnikMestskyObvodMestskaCastv01[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMestskyObvodMestskaCastv01|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CiselnikMestskyObvodMestskaCastv01 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMestskyObvodMestskaCastv01[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CiselnikMestskyObvodMestskaCastv01 findOrCreate($search, callable $callback = null, $options = [])
 */
class CiselnikMestskyObvodMestskaCastv01Table extends Table
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

        $this->setTable('ciselnikMestskyObvodMestskaCastv01');
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
            ->allowEmpty('id', 'create');

        $validator
            ->decimal('mestskyObvodMestskaCastKod')
            ->requirePresence('mestskyObvodMestskaCastKod', 'create')
            ->notEmpty('mestskyObvodMestskaCastKod');

        $validator
            ->requirePresence('mestskyObvodMestskaCastNazev', 'create')
            ->notEmpty('mestskyObvodMestskaCastNazev');

        $validator
            ->requirePresence('obecNad', 'create')
            ->notEmpty('obecNad');

        $validator
            ->allowEmpty('pad2');

        $validator
            ->allowEmpty('pad3');

        $validator
            ->allowEmpty('pad4');

        $validator
            ->boolean('pad5')
            ->allowEmpty('pad5');

        $validator
            ->allowEmpty('pad6');

        $validator
            ->allowEmpty('pad7');

        $validator
            ->decimal('globalniNavrhZmenaIdentifikator')
            ->requirePresence('globalniNavrhZmenaIdentifikator', 'create')
            ->notEmpty('globalniNavrhZmenaIdentifikator');

        $validator
            ->boolean('nespravnostIndikator')
            ->requirePresence('nespravnostIndikator', 'create')
            ->notEmpty('nespravnostIndikator');

        $validator
            ->decimal('transakceIdentifikator')
            ->allowEmpty('transakceIdentifikator');

        $validator
            ->dateTime('zaznamPlatnostOdDatum')
            ->requirePresence('zaznamPlatnostOdDatum', 'create')
            ->notEmpty('zaznamPlatnostOdDatum');

        $validator
            ->dateTime('zaznamPlatnostDoDatum')
            ->requirePresence('zaznamPlatnostDoDatum', 'create')
            ->notEmpty('zaznamPlatnostDoDatum');

        return $validator;
    }
}
