<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit73b6ccb16259cec9ff7c1275902d5480
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit73b6ccb16259cec9ff7c1275902d5480::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit73b6ccb16259cec9ff7c1275902d5480::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}