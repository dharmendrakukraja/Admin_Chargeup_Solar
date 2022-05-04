<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'emp_id',
        'department',
        'designation',
        'address',
        'date_of_birth',
        'blood_group',
        'emergency_contact_no',
        'pan',
        'aadhar_no',
        'passport_no',
         'role',
         'report_to',
         'user_id',
        'date_of_join',
        'relation',
        'education',
        'status',
        'father_name',
        'mother_name',
        'technologies',
        'current_project',

        'experience'

    ];
}
