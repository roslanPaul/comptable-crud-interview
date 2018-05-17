<?php

use Faker\Factory as Faker;
use App\Models\Comptable;
use App\Repositories\ComptableRepository;

trait MakeComptableTrait
{
    /**
     * Create fake instance of Comptable and save it in database
     *
     * @param array $comptableFields
     * @return Comptable
     */
    public function makeComptable($comptableFields = [])
    {
        /** @var ComptableRepository $comptableRepo */
        $comptableRepo = App::make(ComptableRepository::class);
        $theme = $this->fakeComptableData($comptableFields);
        return $comptableRepo->create($theme);
    }

    /**
     * Get fake instance of Comptable
     *
     * @param array $comptableFields
     * @return Comptable
     */
    public function fakeComptable($comptableFields = [])
    {
        return new Comptable($this->fakeComptableData($comptableFields));
    }

    /**
     * Get fake data of Comptable
     *
     * @param array $postFields
     * @return array
     */
    public function fakeComptableData($comptableFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'matricule' => $fake->word,
            'password' => $fake->word,
            'secret' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $comptableFields);
    }
}
