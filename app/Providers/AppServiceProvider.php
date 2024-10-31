<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\ConfigSession01;
use App\Models\ConfigSession02;
use App\Models\ConfigSession03;
use App\Models\ConfigSession04;
use App\Models\ConfigSession05;
use App\Models\ConfigSession06;
use App\Models\ConfigSession07;
use App\Models\ConfigSession08;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
Paginator::useBootstrapFive();


        View::composer('*', function ($view) {
            $config = Config::first();

            $view->with('config', $config);
        });

        View::composer(['admin.session.index', 'client.pages.home.home'], function ($view) {
            $session_02 = ConfigSession01::first();
            $session_03 = ConfigSession02::first();
            $session_04 = ConfigSession03::first();
            $session_05 = ConfigSession04::first();
            $session_06 = ConfigSession05::first();
            $session_07 = ConfigSession06::first();
            $session_08 = ConfigSession07::query()->with('toas.images')->get();
            $session_09 = ConfigSession08::first();


            $view->with([
                'session_02' => $session_02,
                'session_03' => $session_03,
                'session_04' => $session_04,
                'session_05' => $session_05,
                'session_06' => $session_06,
                'session_07' => $session_07,
                'session_08' => $session_08,
                'session_09' => $session_09
            ]);
        });
    }

    protected function loadEmailSettingsToEnv()
    {
        // Lấy cấu hình email từ database
        // $emailSettings = EmailSetting::first();

        // if ($emailSettings) {
        //     // Đổ dữ liệu từ bảng email_settings vào file .env
        //     $this->updateEnv([
        //         'MAIL_USERNAME' => $emailSettings->mail_username,
        //         'MAIL_PASSWORD' => $emailSettings->mail_password,
        //     ]);
        // }
    }

    /**
     * Cập nhật file .env với dữ liệu mới
     */
    protected function updateEnv($data) {}
}
