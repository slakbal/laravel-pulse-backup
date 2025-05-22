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
        if ($event->time !== $event->time->startOfDay()->addHours(2)) {
            //info('Pulse Backup: returning on '.$event->time);
            return;
        }

        //info('Pulse Backup: running on '.$event->time);

        Pulse::set('backups', 'backup-statuses', json_encode(SpatieLaravelBackup::getBackupDestinationStatusData()));

        Pulse::set('backups', 'files', json_encode(SpatieLaravelBackup::getAllBackupDestinationData()));
    }
}
