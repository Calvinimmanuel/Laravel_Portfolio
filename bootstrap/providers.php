<?php

return [
    App\Providers\AppServiceProvider::class,
    // Core Laravel service providers are auto-discovered
    // but explicitly ensure they're loaded in serverless environment
];
