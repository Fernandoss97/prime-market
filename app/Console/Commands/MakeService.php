<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeService extends Command
{
    protected $signature = 'make:service {name : The service class name}';
    protected $description = 'Create a new Service class';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $path = app_path("Services/{$name}.php");

        if (File::exists($path)) {
            $this->error("Service '{$name}' already exists.");
            return Command::FAILURE;
        }

        File::ensureDirectoryExists(app_path('Services'));

        File::put($path, $this->getStub($name));

        $this->info("Service created: app/Services/{$name}.php");

        return Command::SUCCESS;
    }

    private function getStub($className)
    {
        return <<<PHP
<?php

namespace App\Services;

class {$className}
{
    public function __construct()
    {
        //
    }
}
PHP;
    }
}
