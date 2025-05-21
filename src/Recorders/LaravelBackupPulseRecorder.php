<?php

namespace Slakbal\LaravelPulseBackup\Recorders;

use Laravel\Pulse\Events\SharedBeat;
use Laravel\Pulse\Facades\Pulse;
use Slakbal\LaravelPulseBackup\SpatieLaravelBackup;

class LaravelBackupPulseRecorder
{
    public array $listen = [
        SharedBeat::class,
    ];

    public function record(SharedBeat $event): void
    {
        if ($event->time->second % 300 !== 0) {
            return;
        }

        Pulse::set('backups', 'backup-statuses', json_encode(SpatieLaravelBackup::getBackupDestinationStatusData()));

        Pulse::set('backups', 'files', json_encode(SpatieLaravelBackup::getAllBackupDestinationData()));
    }
}
