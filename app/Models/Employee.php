<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'photo',
    ];
/**
     * Get the URL of the employee's photo.
     *
     * @return string|null
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            // Assuming 'employee_photos' is your public disk
            return asset('storage/app/employee_photos/' . $this->photo);
        }
        return null;
    }
}
