<?php

namespace GetCode\SW\SWapi;

use GuzzleHttp\Client;


class SWapiClient {
    const SWAPI_BASE_URI = "https://swapi.co/api/";
    const SWAPI_PEOPLE_URI = 'people';

    /** @var Client */
    private $client;

    protected $baseCharacterList = ["Luke Skywalker", "R2-D2", "Darth Vader", "Obi-Wan Kenobi"];

    /**
     * SWapiClient constructor.
     */
    public function __construct() {
        $this->client = new Client([
            'base_uri' => self::SWAPI_BASE_URI,
            'headers'  => [
                'accept' => 'application/json',
            ]
        ]);
    }


    /**
     * @param array $neededCharacterNames
     * @return array
     */
    public function getPeople($neededCharacterNames = []) {
        $neededCharacterNames = empty($neededCharacterNames) ? $this->baseCharacterList : $neededCharacterNames;
        $response             = $this->client->get(self::SWAPI_PEOPLE_URI);
        $responseBody         = json_decode($response->getBody());
        $characters           = $this->filterCharacters($responseBody->results, $neededCharacterNames);
        return $characters;
    }

    /**
     * @param       $charactersData
     * @param array $neededCharacterNames
     * @return array
     */
    protected function filterCharacters($charactersData, array $neededCharacterNames) {
        $characters = [];
        foreach ($charactersData as $charactersDatum) {
            if (in_array($charactersDatum->name, $neededCharacterNames)) array_push($characters, $charactersDatum);
        }
        return $characters;
    }
}