<?php

namespace App\Console\Commands;

use App\Models\application_data;
use App\Models\student_basetable;
use Illuminate\Console\Command;

class GenerateApplicationId extends Command
{
    protected $signature = 'generate:application-id';

    protected $description = 'Generate and assign application IDs';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $year = now()->year;
        $lastApplication = application_data::orderByDesc('created_at')->first();

        if ($lastApplication) {
            $lastYear = substr($lastApplication->application_id, 0, 4);
            if ($lastYear == $year) {
                $lastNumber = (int)substr($lastApplication->application_id, 4);
                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 1;
            }
        } else {
            $newNumber = 1;
        }

        $newApplicationId = sprintf("%04d%04d", $year, $newNumber);

        // Assuming 'applications' is your model for the applications table
        $application = new application_data();
        $application->application_id = $newApplicationId;
        $application->save();

        $this->info("Application ID {$newApplicationId} assigned.");
    }
}
