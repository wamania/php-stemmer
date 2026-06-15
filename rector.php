<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/test',
    ])
    // uncomment to reach your current PHP version
    ->withPhpSets(
        php85: true
    )
    ->withPreparedSets(
        codeQuality: true,
        deadCode: true,
        typeDeclarations: true,
    )
    ->withComposerBased(
        phpunit: true,
    )
    ;
