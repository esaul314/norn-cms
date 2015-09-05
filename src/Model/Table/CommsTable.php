<?php
namespace App\Model\Table;

use App\Model\Entity\Comms;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comms Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CommsStatuses
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class CommsTable extends Table
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

        $this->table('comms');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CommsStatuses', [
            'foreignKey' => 'comms_status_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('dest', 'create')
            ->notEmpty('dest');

        $validator
			->add('subject', [
				'maxLength' => ['rule' => ['maxLength', 64]]
			])
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
			->add('body', 'length', ['rule' => ['maxLength', 500]])
            ->requirePresence('body', 'create')
            ->notEmpty('body');

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
        $rules->add($rules->existsIn(['comms_status_id'], 'CommsStatuses'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
