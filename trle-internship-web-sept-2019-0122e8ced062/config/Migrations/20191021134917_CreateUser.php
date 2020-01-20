<?php

use Cake\Auth\DefaultPasswordHasher;
use Migrations\AbstractMigration;

class CreateUser extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->insert('users', [
            'first_name' => 'Saliha',
            'last_name' => 'Topcic',
            'email' => 'saliha.topcic.intern@wetek.com',
            'password' => (new DefaultPasswordHasher())->hash('admin'),
            'gender' => 'female',
            'is_active' => 1,
        ]);
    }
}
