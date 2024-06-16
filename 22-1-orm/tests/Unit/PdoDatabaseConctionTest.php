<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Depends;


use App\Contracts\DatabaseConnectionInterface;
use App\Database\PdoDatabaseConnection;
use App\Exceptions\ConfigNotValidException;
use App\Exceptions\DatabaseConnectionException;
use App\Helpers\Config;
use PDO;
use PHPUnit\Framework\TestCase;

class PdoDatabaseConctionTest extends TestCase
{
    public function testPdoDatabaseConctionImplementsDatabaseConnectionInterface()
    {
        $config = $this->getConfig();
        $pdoConnection = new PdoDatabaseConnection($config);
        $this->assertInstanceOf(DatabaseConnectionInterface::class, $pdoConnection);
    }

    public function testConnectMethodShouldReturnValidInstance()
    {
        $config = $this->getConfig();
        $pdoConnection = new PdoDatabaseConnection($config);
        $pdoHandler = $pdoConnection->connect();
        $this->assertInstanceOf(PdoDatabaseConnection::class, $pdoHandler);
        return $pdoHandler;
    }

    #[Depends('testConnectMethodShouldReturnValidInstance')]

    public function testConnectMethodShouldBeConnectToDatabase($pdoHandler)
    {

        $this->assertInstanceOf(PDO::class, $pdoHandler->getConnection());
    }

    public function testItthrowsExceptionIfConfigIsInvalid()
    {
        $this->expectException(DatabaseConnectionException::class);
        $config = $this->getConfig();
        $config['database'] = 'dummy';
        $pdoConnection = new PdoDatabaseConnection($config);
        $pdoConnection->connect();
    }

    public function testRecivedConfigHaveRequiredKey()
    {
        $this->expectException(ConfigNotValidException::class);
        $config = $this->getConfig();
        unset($config['username']);
        $pdoConnection = new PdoDatabaseConnection($config);
        $pdoConnection->connect();
    }

    private function getConfig()
    {
        return $config = Config::get("database", "pdo_testing");
    }
}
