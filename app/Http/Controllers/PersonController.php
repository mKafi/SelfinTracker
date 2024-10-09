<?php

namespace App\Http\Controllers;

use App\Interfaces\PersonRepositoryInterface;
use App\Repositories\PersonRepository;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Classes\ResponseClass;
use Exception;
use Illuminate\Support\Facades\DB;

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
            $persons,
            200,
            config('constants.PERSON.MS_FETCHED'),
            config('constants.PERSON.SC_FETCHED')
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
                $person,
                200,
                config('constants.PERSON.MS_CREATED'),
                config('constants.PERSON.SC_CREATED')
            );
        } catch (Exception $e) {
            return ResponseClass::rollback($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
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
    public function update(UpdatePersonRequest $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
