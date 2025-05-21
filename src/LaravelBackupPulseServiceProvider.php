<?php

namespace Slakbal\LaravelPulseBackup;

use Livewire\Livewire;
use Slakbal\LaravelPulseBackup\Livewire\Backups;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelBackupPulseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('backup-pulse')
            ->hasViews();
    }

    public function bootingPackage(): void
    {
        Livewire::component('backups', Backups::class);
    }
}
