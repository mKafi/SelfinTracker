<?php

namespace App\Repositories;

use App\Interfaces\PersonRepositoryInterface;
use App\Models\Person;

class PersonRepository implements PersonRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function index()
    {
        return Person::get();
    }
    public function getPersonById($pid)
    {
    }
    public function storePerson(array $data)
    {
        return Person::create($data);
    }
    public function updatePerson(array $data, $id)
    {
    }
    public function deletePerson($id)
    {
    }
}
