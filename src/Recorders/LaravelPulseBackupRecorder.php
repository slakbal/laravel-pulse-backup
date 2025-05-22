<?php

namespace Slakbal\LaravelPulseBackup\Recorders;

use Laravel\Pulse\Events\SharedBeat;
use Laravel\Pulse\Facades\Pulse;
use Slakbal\LaravelPulseBackup\SpatieLaravelBackup;

class LaravelPulseBackupRecorder
{
    public array $listen = [
        SharedBeat::class,
    ];

    public function record(SharedBeat $event): void
    {
//        if ($event->time->second % 300 !== 0) {
//            return;
//        }
//
//        if ($event->time->hour % 2 !== 0) { // Runs at hour 0, 2, 4, etc.
//            return;
//        }

        if ($event->time->hour % 2 !== 0) { // Runs at hour 0, 2, 4, etc.
            return;
        }

        info('Running Pulse Backup: '.$event->time->hour);

        //        if ($event->time !== $event->time->startOfDay()->addHours(2)) {
//            return;
//        }

        Pulse::set('backups', 'backup-statuses', json_encode(SpatieLaravelBackup::getBackupDestinationStatusData()));

        Pulse::set('backups', 'files', json_encode(SpatieLaravelBackup::getAllBackupDestinationData()));
    }
}
