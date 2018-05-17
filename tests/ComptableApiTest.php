<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComptableApiTest extends TestCase
{
    use MakeComptableTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateComptable()
    {
        $comptable = $this->fakeComptableData();
        $this->json('POST', '/api/v1/comptables', $comptable);

        $this->assertApiResponse($comptable);
    }

    /**
     * @test
     */
    public function testReadComptable()
    {
        $comptable = $this->makeComptable();
        $this->json('GET', '/api/v1/comptables/'.$comptable->id);

        $this->assertApiResponse($comptable->toArray());
    }

    /**
     * @test
     */
    public function testUpdateComptable()
    {
        $comptable = $this->makeComptable();
        $editedComptable = $this->fakeComptableData();

        $this->json('PUT', '/api/v1/comptables/'.$comptable->id, $editedComptable);

        $this->assertApiResponse($editedComptable);
    }

    /**
     * @test
     */
    public function testDeleteComptable()
    {
        $comptable = $this->makeComptable();
        $this->json('DELETE', '/api/v1/comptables/'.$comptable->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/comptables/'.$comptable->id);

        $this->assertResponseStatus(404);
    }
}
