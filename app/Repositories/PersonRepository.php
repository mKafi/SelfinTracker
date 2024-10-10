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
        return Person::findOrFail($pid);
    }
    public function storePerson(array $data)
    {
        return Person::create($data);
    }
    public function updatePerson($id, array $data)
    {
        return Person::where(['id' => $id])->update($data);
    }
    public function deletePerson($id)
    {
        return Person::destroy($id);
    }
}
