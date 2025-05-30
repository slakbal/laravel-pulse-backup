<?php

namespace Slakbal\LaravelPulseBackup\Livewire;

use Illuminate\Support\Facades\View;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;
use Livewire\Attributes\Lazy;

#[Lazy]
class Backups extends Card
{
    public function render()
    {
        $backups = Pulse::values('backups')->map(function ($backups, $key) {
            return json_decode($backups->value, associative: true, flags: JSON_THROW_ON_ERROR);
        })->toArray();

        return View::make('pulse-backup::livewire.backups', [
            'backups' => $backups,
        ]);
    }
}
