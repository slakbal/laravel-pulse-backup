# Laravel Pulse Backup

A Laravel Pulse card to monitor the health of the spatie backups.

## Installation

Add to composer.json:

```diff
    "repositories": [
        "laravel-pulse-backup": {
            "type": "vcs",
            "url": "https://github.com/slakbal/laravel-pulse-backup"
        },
    ],
    "require": {
        ...
        "slakbal/laravel-pulse-backup": "dev-main"
    },
```

Install the package via composer:

```bash

composer update 

//or

composer require slakbal/laravel-pulse-backup
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="backup-pulse-views"
```

## Register the recorder

To run the checks you must add the LaravelPulseBackupRecorder to the pulse.php file.</p>

```diff
return [
    // ...
    
    'recorders' => [
+        Slakbal\LaravelPulseBackup\Recorders\LaravelPulseBackupRecorder::class => [],
    ]
]
```

You also need to be running the <a href="https://laravel.com/docs/10.x/pulse#dashboard-cards">pulse:check</a> command. It will only do the checks once a day at startOfDay + 2 hours.

## Add to your dashboard

To add the card to the Pulse dashboard, you must first <a href="https://laravel.com/docs/10.x/pulse#dashboard-customization">publish the vendor view</a>

<p style="font-family: 'CustomFont';">Then, you can modify the dashboard.blade.php file: </p>

```diff
<x-pulse>

+    <livewire:backups cols='6' />

</x-pulse>
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
