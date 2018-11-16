<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Registration Model
 *
 * @method \App\Model\Entity\Registration get($primaryKey, $options = [])
 * @method \App\Model\Entity\Registration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Registration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Registration|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Registration|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Registration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Registration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Registration findOrCreate($search, callable $callback = null, $options = [])
 */
class RegistrationTable extends Table
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

        $this->setTable('registration');
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
            ->scalar('BusinessName')
            ->maxLength('BusinessName', 255)
            ->requirePresence('BusinessName', 'create')
            ->notEmpty('BusinessName');

        $validator
            ->scalar('NatureofBusiness')
            ->maxLength('NatureofBusiness', 255)
            ->requirePresence('NatureofBusiness', 'create')
            ->notEmpty('NatureofBusiness');

        $validator
            ->scalar('BusinessAddress')
            ->maxLength('BusinessAddress', 255)
            ->requirePresence('BusinessAddress', 'create')
            ->notEmpty('BusinessAddress');

        $validator
            ->integer('ContactNumber')
            ->requirePresence('ContactNumber', 'create')
            ->notEmpty('ContactNumber');

        $validator
            ->scalar('EmailAddress')
            ->maxLength('EmailAddress', 255)
            ->requirePresence('EmailAddress', 'create')
            ->notEmpty('EmailAddress');

        $validator
            ->scalar('Website')
            ->maxLength('Website', 255)
            ->requirePresence('Website', 'create')
            ->notEmpty('Website');

        $validator
            ->integer('FacebookPage')
            ->requirePresence('FacebookPage', 'create')
            ->notEmpty('FacebookPage');

        $validator
            ->scalar('BusinessOwnersName')
            ->maxLength('BusinessOwnersName', 255)
            ->requirePresence('BusinessOwnersName', 'create')
            ->notEmpty('BusinessOwnersName');

        $validator
            ->scalar('FullName')
            ->maxLength('FullName', 255)
            ->requirePresence('FullName', 'create')
            ->notEmpty('FullName');

        return $validator;
    }
}
