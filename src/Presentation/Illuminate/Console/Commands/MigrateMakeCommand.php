<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Console\Commands;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand as Command;

class MigrateMakeCommand extends Command
{
    protected function getMigrationPath(): string
    {
        return app_path('Infrastructure/Database/Migrations/Illuminate');
    }
}
