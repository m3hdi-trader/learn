<?php

namespace Tests\Unit;

use App\Database\PdoDatabaseConnection;
use App\Database\PdoQueryBilder as DatabasePdoQueryBilder;
use App\Helpers\Config;
use PdoQueryBilder;
use PHPUnit\Framework\TestCase;

class PdoQueryBilderTest extends TestCase
{
    private $queryBilder;
    public function setup(): void
    {
        $pdoConnection = new PdoDatabaseConnection($this->getConfig());
        $this->queryBilder = new DatabasePdoQueryBilder($pdoConnection->connect());
        parent::setup();
    }

    public function testItCanCreatData()
    {
        $result = $this->InsertInToDb();
        $this->assertIsInt($result);
        $this->assertGreaterThan(0, $result);
    }
    public function testItCanUpdateData()
    {
        $this->InsertInToDb();
        $result = $this->queryBilder->table('bugs')
            ->where('user', 'mohammad')
            ->update(['email' => 'mohfunctional@gmail.com', 'name' => 'First After Update']);
        $this->assertEquals(1, $result);
    }


    private function getConfig()
    {
        return $config = Config::get("database", "pdo_testing");
    }

    private function InsertInToDb()
    {

        $data = [
            'name' => 'Firt Bug Report',
            'link' => "http://link.com",
            'user' => 'mohammad',
            'email' => 'mohammad@gmail.com'
        ];
        return $this->queryBilder->table('bugs')->create($data);
    }
}