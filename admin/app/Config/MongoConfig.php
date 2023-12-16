<?php

namespace App\Config;

use Codeigniter\Config\BaseConfig;

class MongoConfig extends BaseConfig
{
    public $dbInfo = [];

    public function __construct()
    {
        $this->dbInfo = [
            'default' => (object)[
                'db' => 'politician', //your database
                'hostname' => "localhost", //127.0.0.1 if you use remote server you should change host address
                'userName' => "politician",
                'password' => "root",
                'prefix' => '',
                'port' => "27017", //27017 if you use different port you should change port address
                'srv' => 'mongodb', //mongodb+srv
                'authMechanism' => "SCRAM-SHA-256", //SCRAM-SHA-256 - SCRAM-SHA-1
                'db_debug' => TRUE,
                'write_concerns' => (int)1,
                'journal' => TRUE,
                'read_preference' => 'primary',
                'read_concern' => 'local', //'local', 'majority' or 'linearizable'
                'ca_file' => [] //['ca_file' => '/usr/local/etc/openssl/cert.pem']
            ]
        ];
    }
}