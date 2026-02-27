<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\SafeDeclareStrictTypesRector;

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
    ->withTypeCoverageDocblockLevel(0)
     ->withRules([
        SafeDeclareStrictTypesRector::class,
    ]);
