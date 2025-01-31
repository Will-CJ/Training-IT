<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Validation rules for the model.
     *
     * @return array
     */
    public function validationRules()
    {
        return [
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ];
    }
    // required|tipe data = string

    /**
     * Validation messages for the model.
     *
     * @return array
     */
    public function validationMessages()
    {
        return [
            'name.required' => 'Name is required!',
            'address.required' => 'Address is required!',
            'phone.required' => 'Phone Number is required!',
        ];
        // message nya
    }
}
