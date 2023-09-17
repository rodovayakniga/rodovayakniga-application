<?php

namespace App\Providers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\ServiceProvider;

/**
 *
 */
class RequestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $requestClasses = $this->getRequestClassesFromDirectory(app_path('Http/Requests'));

        foreach ($requestClasses as $requestClass) {
            $this->app->singleton($requestClass, function () use ($requestClass) {
                return new $requestClass();
            });
        }
    }

    /**
     *
     * Get list request classes for directory
     *
     * @param $directory
     * @return array
     */
    private function getRequestClassesFromDirectory($directory): array
    {
        $requestClasses = [];
        $files = scandir($directory);

        foreach ($files as $file) {
            if (is_file($directory . '/' . $file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $className = pathinfo($file, PATHINFO_FILENAME);
                $fullClassName = 'App\\Http\\Requests\\' . $className;

                if (is_subclass_of($fullClassName, FormRequest::class)) {
                    $requestClasses[] = $fullClassName;
                }
            }
        }
        return $requestClasses;
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
