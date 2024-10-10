<?php

namespace App\Interfaces;

interface PersonRepositoryInterface
{
    public function index();
    public function getPersonById($pid);
    public function storePerson(array $data);
    public function updatePerson($id, array $data);
    public function deletePerson($id);
}
