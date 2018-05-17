<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PointageApiTest extends TestCase
{
    use MakePointageTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePointage()
    {
        $pointage = $this->fakePointageData();
        $this->json('POST', '/api/v1/pointages', $pointage);

        $this->assertApiResponse($pointage);
    }

    /**
     * @test
     */
    public function testReadPointage()
    {
        $pointage = $this->makePointage();
        $this->json('GET', '/api/v1/pointages/'.$pointage->id);

        $this->assertApiResponse($pointage->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePointage()
    {
        $pointage = $this->makePointage();
        $editedPointage = $this->fakePointageData();

        $this->json('PUT', '/api/v1/pointages/'.$pointage->id, $editedPointage);

        $this->assertApiResponse($editedPointage);
    }

    /**
     * @test
     */
    public function testDeletePointage()
    {
        $pointage = $this->makePointage();
        $this->json('DELETE', '/api/v1/pointages/'.$pointage->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pointages/'.$pointage->id);

        $this->assertResponseStatus(404);
    }
}
