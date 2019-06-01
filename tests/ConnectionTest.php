<?php
/**
 * Created by PhpStorm.
 * User: santino83
 * Date: 01/06/19
 * Time: 17.55
 */

namespace Santino83\DB;


use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{

    public function testConnection()
    {

        $config = new Configuration();
        $config->setAutoCommit(true);

        $connectionParams = [
            'url' => 'sqlite:///:memory:'
        ];

        $conn = DriverManager::getConnection($connectionParams, $config);

        $this->assertNotNull($conn);

        try{
            $conn->connect();
            $this->assertTrue(true);
        }catch (\Exception $ex){
            $this->fail($ex->getMessage());
        }

    }


}