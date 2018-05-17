<?php

use App\Models\Pointage;
use App\Repositories\PointageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PointageRepositoryTest extends TestCase
{
    use MakePointageTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PointageRepository
     */
    protected $pointageRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pointageRepo = App::make(PointageRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePointage()
    {
        $pointage = $this->fakePointageData();
        $createdPointage = $this->pointageRepo->create($pointage);
        $createdPointage = $createdPointage->toArray();
        $this->assertArrayHasKey('id', $createdPointage);
        $this->assertNotNull($createdPointage['id'], 'Created Pointage must have id specified');
        $this->assertNotNull(Pointage::find($createdPointage['id']), 'Pointage with given id must be in DB');
        $this->assertModelData($pointage, $createdPointage);
    }

    /**
     * @test read
     */
    public function testReadPointage()
    {
        $pointage = $this->makePointage();
        $dbPointage = $this->pointageRepo->find($pointage->id);
        $dbPointage = $dbPointage->toArray();
        $this->assertModelData($pointage->toArray(), $dbPointage);
    }

    /**
     * @test update
     */
    public function testUpdatePointage()
    {
        $pointage = $this->makePointage();
        $fakePointage = $this->fakePointageData();
        $updatedPointage = $this->pointageRepo->update($fakePointage, $pointage->id);
        $this->assertModelData($fakePointage, $updatedPointage->toArray());
        $dbPointage = $this->pointageRepo->find($pointage->id);
        $this->assertModelData($fakePointage, $dbPointage->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePointage()
    {
        $pointage = $this->makePointage();
        $resp = $this->pointageRepo->delete($pointage->id);
        $this->assertTrue($resp);
        $this->assertNull(Pointage::find($pointage->id), 'Pointage should not exist in DB');
    }
}
