<?php

namespace App\Http\Controllers;

use Exception;
use App\Classes\ResponseClass;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PersonResource;
use App\Repositories\PersonRepository;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Interfaces\PersonRepositoryInterface;

class PersonController extends Controller
{
    private $person;
    public function __construct(PersonRepositoryInterface $person)
    {
        $this->person = $person;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons = $this->person->index();

        return ResponseClass::sendResponse(
            !empty($persons) ? true : false,
            $persons,
            config('constants.PERSON.MS_FETCHED'),
            config('constants.PERSON.SC_FETCHED'),
            200,
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        $req = $request->all();
        try {
            DB::beginTransaction();

            $person = $this->person->storePerson([
                'hash' => $req['hash'],
                'userType' => $req['type'] ?? null,
                'referer' => $req['reference'] ?? null,
                'nick' => $req['nick'] ?? null,
                'fullName' => $req['name'],
                'phone' => $req['phone'],
                'alternatePhone' => $req['phone2'] ?? null,
                'email' => $req['email'],
                'gender' => $req['gender'] ?? null,
                'age' => $req['age'] ?? null,
                'occupation' => $req['occupation'] ?? null,
                'designation' => $req['designation'] ?? null,
                'address' => $req['address'] ?? null,
                'city' => $req['city'] ?? null,
                'state' => $req['state'] ?? null,
                'zip' => $req['zip'] ?? null,
                'country' => $req['country'],
                'currentLocation' => $req['location'] ?? null,
                'image' => $req['image'] ?? null,
                'socialLinks' => $req['social'] ?? null,
                'shortDescription' => $req['summery'] ?? null,
                'longDescription' => $req['description'] ?? null,
                'lastUsed' => $req['lastAccessed'] ?? null,
                'expiringOn' => $req['expiring'] ?? null,
                'status' => $req['status'] ?? null
            ]);

            DB::commit();
            return ResponseClass::sendResponse(
                $person ? true : false,
                $person,
                config('constants.PERSON.MS_CREATED'),
                config('constants.PERSON.SC_CREATED'),
                200
            );
        } catch (Exception $e) {
            return ResponseClass::rollback($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($pid)
    {
        $person = $this->person->getPersonById($pid);
        return ResponseClass::sendResponse(
            $person ? true : false,
            new PersonResource($person),
            config('constants.PERSON.MS_FETCHED'),
            config('constants.PERSON.SC_FETCHED'),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, $pid)
    {
        $req = $request->all();
        try {
            DB::beginTransaction();
            $person = [
                'hash' => $req['hash'],
                'userType' => $req['type'] ?? null,
                'referer' => $req['reference'] ?? null,
                'nick' => $req['nick'] ?? null,
                'fullName' => $req['name'],
                'phone' => $req['phone'],
                'alternatePhone' => $req['phone2'] ?? null,
                'email' => $req['email'],
                'gender' => $req['gender'] ?? null,
                'age' => $req['age'] ?? null,
                'occupation' => $req['occupation'] ?? null,
                'designation' => $req['designation'] ?? null,
                'address' => $req['address'] ?? null,
                'city' => $req['city'] ?? null,
                'state' => $req['state'] ?? null,
                'zip' => $req['zip'] ?? null,
                'country' => $req['country'],
                'currentLocation' => $req['location'] ?? null,
                'image' => $req['image'] ?? null,
                'socialLinks' => $req['social'] ?? null,
                'shortDescription' => $req['summery'] ?? null,
                'longDescription' => $req['description'] ?? null,
                'lastUsed' => $req['lastAccessed'] ?? null,
                'expiringOn' => $req['expiring'] ?? null,
                'status' => $req['status'] ?? null
            ];
            $person = $this->person->updatePerson($pid, $person);

            return ResponseClass::sendResponse(
                $person ? true : false,
                null,
                $person ? config('constants.PERSON.MS_UPDATED') : config('constants.PERSON.FMS_UPDATED'),
                $person ? config('constants.PERSON.SC_UPDATED') : config('constants.PERSON.FSC_UPDATED'),
                200
            );
        } catch (Exception $e) {
            return ResponseClass::rollback($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pid)
    {
        $deleted = $this->person->deletePerson($pid);

        return ResponseClass::sendResponse(
            $deleted ? true : false,
            null,
            $deleted ? config('constants.PERSON.MS_DELETED') : config('constants.PERSON.FMS_DELETED'),
            $deleted ? config('constants.PERSON.SC_DELETED') : config('constants.PERSON.FSC_DELETED'),
            200
        );
    }
}
