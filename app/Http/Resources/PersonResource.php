<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uid' => $this->id,
            'hash' => $this->hash,
            'type' => $this->userType,
            'reference' => $this->referer,
            'nick' => $this->nick,
            'name' => $this->fullName,
            'phone' => $this->phone,
            'phone2' => $this->alternatePhone,
            'email' => $this->email,
            'gender' => $this->gender,
            'age' => $this->age,
            'occupation' => $this->occupation,
            'designation' => $this->designation,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'country' => $this->country,
            'location' => $this->currentLocation,
            'image' => $this->image,
            'social' => $this->socialLinks,
            'summery' => $this->shortDescription,
            'description' => $this->longDescription,
            'lastAccessed' => $this->lastUsed,
            'expiring' => $this->expiringOn,
            'status' => $this->hash
        ];
    }
}
