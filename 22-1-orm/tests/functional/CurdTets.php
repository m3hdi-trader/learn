<?php

namespace Tests\functional;

use App\Database\PdoDatabaseConnection;
use App\Database\PdoQueryBilder as DatabasePdoQueryBilder;
use App\Helpers\Config;
use App\Helpers\HttpClient;
use PHPUnit\Framework\TestCase;

class CurdTets extends TestCase

{
    private $httpClient;
    private $queryBilder;


    public function setUp(): void
    {
        $pdoConnection = new PdoDatabaseConnection($this->getConfig());
        $this->queryBilder = new DatabasePdoQueryBilder($pdoConnection->connect());
        $this->httpClient = new HttpClient;
        parent::setUp();
    }

    public function tearDown(): void

    {
        $this->httpClient = null;
        parent::tearDown();
    }

    private function getConfig()
    {
        return $config = Config::get("database", "pdo_testing");
    }
}
