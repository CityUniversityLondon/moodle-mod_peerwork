<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__,
    ])
    ->withSkip([
        __DIR__ . '/amd/build',
        __DIR__ . '/yui/build',
        __DIR__ . '/vendor',
    ])
    ->withPhpSets(php80: true)
    ->withDeadCodeLevel(0)
    ->withCodeQualityLevel(0)
    ->withTypeCoverageDocblockLevel(0);
