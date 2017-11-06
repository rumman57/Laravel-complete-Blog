<?php

namespace App\Providers;
use App\Models\SiteOption;
use App\Models\Contact;

use Illuminate\Support\ServiceProvider;

class SiteOptionProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->siteOptions();
        $this->mailboxnotification();
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    private function siteOptions(){
        view()->composer('master',function($view){
            $view->with('options',SiteOption::find(1));
        });
    }
    private function mailboxnotification(){
        view()->composer('myadmin.adminmaster',function($view){
            $view->with('notificatios',Contact::where('check','=',0)->get());
        });
    }
}
