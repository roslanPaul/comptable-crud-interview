<?php

use Faker\Factory as Faker;
use App\Models\Pointage;
use App\Repositories\PointageRepository;

trait MakePointageTrait
{
    /**
     * Create fake instance of Pointage and save it in database
     *
     * @param array $pointageFields
     * @return Pointage
     */
    public function makePointage($pointageFields = [])
    {
        /** @var PointageRepository $pointageRepo */
        $pointageRepo = App::make(PointageRepository::class);
        $theme = $this->fakePointageData($pointageFields);
        return $pointageRepo->create($theme);
    }

    /**
     * Get fake instance of Pointage
     *
     * @param array $pointageFields
     * @return Pointage
     */
    public function fakePointage($pointageFields = [])
    {
        return new Pointage($this->fakePointageData($pointageFields));
    }

    /**
     * Get fake data of Pointage
     *
     * @param array $postFields
     * @return array
     */
    public function fakePointageData($pointageFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'matricule' => $fake->word,
            'heure' => $fake->word,
            'modifier' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pointageFields);
    }
}
