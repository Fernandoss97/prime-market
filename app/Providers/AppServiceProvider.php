<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configModels();
        $this->configCommands();
        $this->configResources();
    }

    protected function configModels(): void
    {
        Model::unguard();
        Model::shouldBeStrict();
    }

    protected function configCommands(): void
    {
        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );
    }

    public function configResources(): void
    {
        JsonResource::withoutWrapping();
    }
}
