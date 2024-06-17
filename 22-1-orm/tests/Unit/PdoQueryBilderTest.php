<?php

namespace Tests\Unit;

use App\Database\PdoDatabaseConnection;
use App\Database\PdoQueryBilder as DatabasePdoQueryBilder;
use App\Helpers\Config;
use PdoQueryBilder;
use PHPUnit\Framework\TestCase;

class PdoQueryBilderTest extends TestCase
{
    public function testItCanCreatData()
    {
        $pdoConnection = new PdoDatabaseConnection($this->getConfig());
        $queryBilder = new DatabasePdoQueryBilder($pdoConnection->connect());
        $data = [
            'name' => 'Firt Bug Report',
            'link' => "http://link.com",
            'user' => 'mohammad',
            'email' => 'mohammad@gmail.com'
        ];
        $result = $queryBilder->table('bugs')->create($data);
        $this->assertIsInt($result);
        $this->assertGreaterThan(0, $result);
    }
    private function getConfig()
    {
        return $config = Config::get("database", "pdo_testing");
    }
}
