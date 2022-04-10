
<?php

include_once 'classes/Model.php';

class User extends Model {
    public $table_name = 'users';
    public $fields = [
        'name' => [
            'db_type' => 'varchar(255)',
        ],
        'password' => [
            'db_type' => 'varchar(255)',
        ],
    ];

    // Override save method se we store hash instead of plain text
    public function save($record) {
        $record['password'] = password_hash($record['password'], PASSWORD_BCRYPT);
        parent::save($record);
    }
}