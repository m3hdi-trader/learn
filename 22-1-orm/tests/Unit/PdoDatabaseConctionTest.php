<?php

namespace Tests\Unit;

use App\Contracts\DatabaseConnectionInterface;
use App\Database\PdoDatabaseConnection;
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

    public function testConnectMethodShouldBeConnectToDatabase()
    {
        $config = $this->getConfig();
        $pdoConnection = new PdoDatabaseConnection($config);
        $pdoConnection->connect();
        $this->assertInstanceOf(PDO::class, $pdoConnection->getConnection());
    }

    private function getConfig()
    {
        return $config = Config::get("database", "pdo_testing");
    }
}
