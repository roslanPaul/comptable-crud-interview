<?php

use App\Models\Comptable;
use App\Repositories\ComptableRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComptableRepositoryTest extends TestCase
{
    use MakeComptableTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComptableRepository
     */
    protected $comptableRepo;

    public function setUp()
    {
        parent::setUp();
        $this->comptableRepo = App::make(ComptableRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateComptable()
    {
        $comptable = $this->fakeComptableData();
        $createdComptable = $this->comptableRepo->create($comptable);
        $createdComptable = $createdComptable->toArray();
        $this->assertArrayHasKey('id', $createdComptable);
        $this->assertNotNull($createdComptable['id'], 'Created Comptable must have id specified');
        $this->assertNotNull(Comptable::find($createdComptable['id']), 'Comptable with given id must be in DB');
        $this->assertModelData($comptable, $createdComptable);
    }

    /**
     * @test read
     */
    public function testReadComptable()
    {
        $comptable = $this->makeComptable();
        $dbComptable = $this->comptableRepo->find($comptable->id);
        $dbComptable = $dbComptable->toArray();
        $this->assertModelData($comptable->toArray(), $dbComptable);
    }

    /**
     * @test update
     */
    public function testUpdateComptable()
    {
        $comptable = $this->makeComptable();
        $fakeComptable = $this->fakeComptableData();
        $updatedComptable = $this->comptableRepo->update($fakeComptable, $comptable->id);
        $this->assertModelData($fakeComptable, $updatedComptable->toArray());
        $dbComptable = $this->comptableRepo->find($comptable->id);
        $this->assertModelData($fakeComptable, $dbComptable->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteComptable()
    {
        $comptable = $this->makeComptable();
        $resp = $this->comptableRepo->delete($comptable->id);
        $this->assertTrue($resp);
        $this->assertNull(Comptable::find($comptable->id), 'Comptable should not exist in DB');
    }
}
