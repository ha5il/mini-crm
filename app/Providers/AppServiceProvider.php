<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Observers
         */
        \App\Models\Company::observe(\App\Observers\CompanyObserver::class);

        /**
         * Macros
         */
        Builder::macro('search', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        Str::contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);

                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                foreach (explode(' ', $searchTerm) as $term) {
                                    $query->where($relationAttribute, 'LIKE', "%{$term}%");
                                }
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            foreach (explode(' ', $searchTerm) as $term) {
                                $query->orWhere($attribute, 'LIKE', "%{$term}%");
                            }
                        }
                    );
                }
            });

            return $this;
        });
    }
}
