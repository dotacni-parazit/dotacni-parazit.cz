<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Holding Model
 *
 * @method \App\Model\Entity\Holding get($primaryKey, $options = [])
 * @method \App\Model\Entity\Holding newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Holding[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Holding|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Holding patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Holding[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Holding findOrCreate($search, callable $callback = null, $options = [])
 */
class HoldingTable extends Table
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

        $this->setTable('companies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Owner', [
            'bindingKey' => 'owner_id'
        ]);
    }

    public static function defaultConnectionName()
    {
        return "cedr_custom";
    }
}
