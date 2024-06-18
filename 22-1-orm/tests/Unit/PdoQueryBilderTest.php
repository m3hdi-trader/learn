<?php

namespace Tests\Unit;

use App\Database\PdoDatabaseConnection;
use App\Database\PdoQueryBilder as DatabasePdoQueryBilder;
use App\Helpers\Config;
use PHPUnit\Framework\TestCase;

class PdoQueryBilderTest extends TestCase
{
    private $queryBilder;

    public function setup(): void
    {
        $pdoConnection = new PdoDatabaseConnection($this->getConfig());
        $this->queryBilder = new DatabasePdoQueryBilder($pdoConnection->connect());
        $this->queryBilder->beginTransaction();
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

    public function testItCanUpdateMultipleWhere()
    {
        $this->InsertInToDb();
        $this->InsertInToDb(['user' => 'ali']);

        $result = $this->queryBilder->table('bugs')
            ->where('user', 'mohammad')
            ->where('link', 'http://link.com')
            ->update(['email' => 'mohfunctional@gmail.com']);
        $this->assertEquals(1, $result);
    }

    public function testItCanDeleteRecord()
    {
        $result = $this->InsertInToDb();
        $result = $this->InsertInToDb();
        $result = $this->InsertInToDb();
        $result = $this->InsertInToDb();
        $result = $this->queryBilder->table('bugs')->where('user', 'mohammad')->delete();
        $this->assertEquals(4, $result);
    }

    public function testItCanFetchData()
    {
        $this->mulitipleInSertInToDb(10);
        $this->mulitipleInSertInToDb(10, ['user' => 'Reza']);
        $result = $this->queryBilder->table('bugs')->where('user', 'Reza')->get();
        // var_dump($result);
        $this->assertIsArray($result);
        $this->assertCount(10, $result);
    }

    public function testItCanFetchSpecificColums()
    {
        $this->mulitipleInSertInToDb(10);
        $this->mulitipleInSertInToDb(10, ['name' => 'New']);
        $result = $this->queryBilder->table('bugs')->where('name', 'New')->get(['name', 'user']);
        $this->assertIsArray($result);
        $this->assertObjectHasProperty('name', $result[0]);
        $this->assertObjectHasProperty('user', $result[0]);
        $result = json_decode(json_encode($result[0]), true);
        $this->assertEquals(['name', 'user'], array_keys($result));
    }

    private function getConfig()
    {
        return $config = Config::get("database", "pdo_testing");
    }

    private function InsertInToDb($options = [])
    {

        $data = array_merge([
            'name' => 'Firt Bug Report',
            'link' => "http://link.com",
            'user' => 'mohammad',
            'email' => 'mohammad@gmail.com'
        ], $options);
        return $this->queryBilder->table('bugs')->create($data);
    }

    private function mulitipleInSertInToDb($count, $options = [])
    {
        for ($i = 0; $i < $count; $i++) {
            $this->InsertInToDb($options);
        }
    }

    public function tearDown(): void
    {
        // $this->queryBilder->truncateAllTable();
        $this->queryBilder->rollback();

        parent::tearDown();
    }
}
