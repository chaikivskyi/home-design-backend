<?php

namespace App\Providers;

use Dedoc\Scramble\Scramble;
use Dedoc\Scramble\Support\Generator\OpenApi;
use Dedoc\Scramble\Support\Generator\SecurityScheme;
use Dedoc\Scramble\Support\Generator\SecuritySchemes\HttpSecurityScheme;
use Illuminate\Support\ServiceProvider;

class ScrambleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        /** @var HttpSecurityScheme $securitySchema */
        $securitySchema = SecurityScheme::http('bearer');
        Scramble::configure()
            ->withDocumentTransformers(function (OpenApi $openApi) use ($securitySchema) {
                $openApi->secure($securitySchema);
            });

        Scramble::throwOnError();
    }
}
