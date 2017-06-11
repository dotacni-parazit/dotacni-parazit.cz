<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rozhodnuti Model
 *
 * @method \App\Model\Entity\Rozhodnuti get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rozhodnuti newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rozhodnuti[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rozhodnuti|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rozhodnuti patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rozhodnuti[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rozhodnuti findOrCreate($search, callable $callback = null, $options = [])
 */
class RozhodnutiTable extends Table
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

        $this->setTable('Rozhodnuti');
        $this->setDisplayField('idRozhodnuti');
        $this->setPrimaryKey('idRozhodnuti');

        $this->belongsTo('CiselnikDotacePoskytovatelv01')
            ->setForeignKey('iriPoskytovatelDotace')
            ->setBindingKey('id')
            ->setProperty('PoskytovatelDotace');

        $this->belongsTo('CiselnikFinancniProstredekCleneniv01')
            ->setForeignKey('iriCleneniFinancnichProstredku')
            ->setBindingKey('id')
            ->setProperty('CleneniFinancnichProstredku');

        $this->belongsTo('CiselnikFinancniZdrojv01')
            ->setForeignKey('iriFinancniZdroj')
            ->setBindingKey('id')
            ->setProperty('FinancniZdroj');
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
            ->allowEmpty('idRozhodnuti', 'create');

        $validator
            ->requirePresence('idDotace', 'create')
            ->notEmpty('idDotace');

        $validator
            ->decimal('castkaPozadovana')
            ->allowEmpty('castkaPozadovana');

        $validator
            ->decimal('castkaRozhodnuta')
            ->requirePresence('castkaRozhodnuta', 'create')
            ->notEmpty('castkaRozhodnuta');

        $validator
            ->requirePresence('iriPoskytovatelDotace', 'create')
            ->notEmpty('iriPoskytovatelDotace');

        $validator
            ->requirePresence('iriCleneniFinancnichProstredku', 'create')
            ->notEmpty('iriCleneniFinancnichProstredku');

        $validator
            ->requirePresence('iriFinancniZdroj', 'create')
            ->notEmpty('iriFinancniZdroj');

        $validator
            ->decimal('rokRozhodnuti')
            ->requirePresence('rokRozhodnuti', 'create')
            ->notEmpty('rokRozhodnuti');

        $validator
            ->boolean('investiceIndikator')
            ->requirePresence('investiceIndikator', 'create')
            ->notEmpty('investiceIndikator');

        $validator
            ->boolean('navratnostIndikator')
            ->requirePresence('navratnostIndikator', 'create')
            ->notEmpty('navratnostIndikator');

        $validator
            ->dateTime('dPlatnost')
            ->requirePresence('dPlatnost', 'create')
            ->notEmpty('dPlatnost');

        $validator
            ->dateTime('dtAktualizace')
            ->requirePresence('dtAktualizace', 'create')
            ->notEmpty('dtAktualizace');

        return $validator;
    }
}
