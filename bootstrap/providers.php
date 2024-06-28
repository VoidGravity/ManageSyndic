<?php

use Spatie\LaravelPdf\PdfServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    App\Providers\JetstreamServiceProvider::class,
    PdfServiceProvider::class,
    'PDF' => Spatie\Pdf\Pdf::class,

];
