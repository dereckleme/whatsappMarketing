<h1>Zend Framework 2 já configurado com doctrine.</h1>
Atençao lembre-se de configurar sua base dados localizada na pasta

Config/autoload/doctrine.local.php

return array(
                'doctrine' => array(
                                'connection' => array(
                                                'orm_default' => array(
                                                                'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
                                                                'params' => array(
                                                                                'host'     => 'localhost',
                                                                                'port'     => '3306',
                                                                                'user'     => 'root',
                                                                                'password' => '',
                                                                                'dbname'   => 'BaseDeDados',
                                                                    'charset' => 'utf8',
                                                                    'driverOptions' => array(
                                                                                    1002=>'SET NAMES utf8'
                                                                    )
                                                                )))));
