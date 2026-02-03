<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\TemporaryEmployeeBackup;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TemporaryEmployeeEventListener {

    //Before Insert

    public function handleCreating( $employee ) {
        $dayOfWeek = Carbon::now()->format( 'l' );

        if ( in_array( $dayOfWeek, [ 'Saturday' ] ) ) {
            throw new \Exception( "Data cannot be inserted on weekends ($dayOfWeek)." );
        }
    }

    //After Insert

    public function handleCreated( $employee ) {
        TemporaryEmployeeBackup::create( $employee->toArray() );

    }

    //Before Delete

    public function handleDeleting( $employee ) {
        $hour = Carbon::now( 'Asia/Kolkata' )->format( 'H' );
        echo $hour;
        if ( $hour >= 19 && $hour < 20 ) {

            throw new \Exception( 'Records cannot be deleted during restricted hours (6 PM to 7 PM).' );
        }

        echo "Employee {$employee->name} is about to be deleted.\n";

    }

    public function handleDeleted( $employee ) {
        TemporaryEmployeeBackup::create( $employee->toArray() );

        echo "Employee {$employee->name} has been  deleted successfully.\n";
        echo "Employee {$employee->name} has been  inserted into TemporaryEmployeeBackUp Table successfully.\n";

    }

    public function handleUpdating( $employee ) {
        $originalData = $employee->getOriginal();

        if ( isset( $employee->salary ) && $employee->salary !== $originalData[ 'salary' ] ) {
            $salaryIncrement = $employee->salary - $originalData[ 'salary' ];

            if ( $salaryIncrement < 1000 ) {
                throw new \Exception( 'Increment must be at least 1000 and above!' );
            }

        }

    }

    public function handleUpdated( $employee ) {
        TemporaryEmployeeBackup::create( $employee );

    }

    /**
    * Create the event listener.
    */

    public function __construct() {
        //
    }

    /**
    * Handle the event.
    */

    public function handle( object $event ): void {
        //
    }
}
