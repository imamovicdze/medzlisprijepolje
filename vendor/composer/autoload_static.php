<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd07e55260d1bea8cb21dee969fa450f8
{
    public static $files = array (
        '6e60481d8c04e99474e2ba7b3658ab5a' => __DIR__ . '/..' . '/php-activerecord/php-activerecord/ActiveRecord.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\EventDispatcher\\' => 34,
            'Symfony\\Component\\Debug\\' => 24,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'MedzlisPrijepolje\\' => 18,
            'MedzlisPrijepoljeTest\\' => 22,
        ),
        'C' => 
        array (
            'Cicada\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
        'Symfony\\Component\\Debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/debug',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'MedzlisPrijepolje\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'MedzlisPrijepoljeTest\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
        ),
        'Cicada\\' => 
        array (
            0 => __DIR__ . '/..' . '/cicada/cicada/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Symfony\\Component\\HttpKernel\\' => 
            array (
                0 => __DIR__ . '/..' . '/symfony/http-kernel',
            ),
            'Symfony\\Component\\HttpFoundation\\' => 
            array (
                0 => __DIR__ . '/..' . '/symfony/http-foundation',
            ),
        ),
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
        'E' => 
        array (
            'Evenement' => 
            array (
                0 => __DIR__ . '/..' . '/evenement/evenement/src',
            ),
        ),
    );

    public static $classMap = array (
        'SessionHandlerInterface' => __DIR__ . '/..' . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd07e55260d1bea8cb21dee969fa450f8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd07e55260d1bea8cb21dee969fa450f8::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd07e55260d1bea8cb21dee969fa450f8::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd07e55260d1bea8cb21dee969fa450f8::$classMap;

        }, null, ClassLoader::class);
    }
}
