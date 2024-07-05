<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Employee::truncate();

        // Generate dummy data using factory
        Employee::factory(10)->create()->each(function ($employee) {
            // Optionally, upload a sample photo for each employee
            $this->uploadSamplePhoto($employee);
        });
    }

    // * Upload a sample photo for the employee.
    // *
    // * @param Employee $employee
    // * @return void
    // */
    private function uploadSamplePhoto(Employee $employee): void
    {
        // Example: Upload a default photo to 'employee_photos' disk
        $photoPath = 'sample_pic.jpg'; // Replace with your sample photo path
        $photoFilename = 'employee_' . $employee->id . '.jpg';

        // Store the photo in the 'employee_photos' disk
        Storage::disk('employee_photos')->put($photoFilename, file_get_contents($photoPath));

        // Update the employee record with the photo filename
        $employee->update(['photo' => $photoFilename]);
    }
}
