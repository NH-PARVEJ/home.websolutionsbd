<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\view;
use App\Models\Target;
use App\Models\Project;
use Carbon\Carbon;
use DB;

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
    $project   = Project::whereMonth('complete_date', Carbon::now())->get();
    view()->share('project_current_month', $project);


    $target = DB::table('targets')->orderBy('id', 'asc')->first();
    view()->share('latest_target', $target);

    }
}


