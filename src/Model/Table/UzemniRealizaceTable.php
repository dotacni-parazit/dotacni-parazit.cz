<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UzemniRealizace Model
 *
 * @method \App\Model\Entity\UzemniRealizace get($primaryKey, $options = [])
 * @method \App\Model\Entity\UzemniRealizace newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UzemniRealizace[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UzemniRealizace|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UzemniRealizace patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UzemniRealizace[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UzemniRealizace findOrCreate($search, callable $callback = null, $options = [])
 */
class UzemniRealizaceTable extends Table
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

        $this->setTable('UzemniRealizace');
        $this->setDisplayField('idUzemi');
        $this->setPrimaryKey('idUzemi');
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
            ->allowEmpty('idUzemi', 'create');

        $validator
            ->requirePresence('idDotace', 'create')
            ->notEmpty('idDotace');

        $validator
            ->boolean('mezinarodniPusobnostIndikator')
            ->allowEmpty('mezinarodniPusobnostIndikator');

        $validator
            ->boolean('iriRealizovanNaUzemiStatu')
            ->allowEmpty('iriRealizovanNaUzemiStatu');

        $validator
            ->boolean('uzemniRealizacePopis')
            ->allowEmpty('uzemniRealizacePopis');

        $validator
            ->boolean('obvodPrahaPredavaciKod')
            ->allowEmpty('obvodPrahaPredavaciKod');

        $validator
            ->boolean('spravniObvodPrahaPredavaciKod')
            ->allowEmpty('spravniObvodPrahaPredavaciKod');

        $validator
            ->boolean('stavebniObjektKod')
            ->allowEmpty('stavebniObjektKod');

        $validator
            ->boolean('uliceKod')
            ->allowEmpty('uliceKod');

        $validator
            ->boolean('iriCastObce')
            ->allowEmpty('iriCastObce');

        $validator
            ->boolean('iriKraj')
            ->allowEmpty('iriKraj');

        $validator
            ->boolean('iriMestskyObvodMestskaCast')
            ->allowEmpty('iriMestskyObvodMestskaCast');

        $validator
            ->boolean('iriObec')
            ->allowEmpty('iriObec');

        $validator
            ->boolean('iriOkres')
            ->allowEmpty('iriOkres');

        $validator
            ->boolean('iriVusc')
            ->allowEmpty('iriVusc');

        $validator
            ->boolean('adresniMistoKod')
            ->allowEmpty('adresniMistoKod');

        $validator
            ->requirePresence('okresNutsKod', 'create')
            ->notEmpty('okresNutsKod');

        $validator
            ->dateTime('dtAktualizace')
            ->requirePresence('dtAktualizace', 'create')
            ->notEmpty('dtAktualizace');

        $validator
            ->dateTime('dPlatnost')
            ->requirePresence('dPlatnost', 'create')
            ->notEmpty('dPlatnost');

        return $validator;
    }
}
