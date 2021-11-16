<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit162ccc26e31e48fabf24baa90593a89c
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WilliamCosta\\DotEnv\\' => 20,
            'WilliamCosta\\DatabaseManager\\' => 29,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WilliamCosta\\DotEnv\\' => 
        array (
            0 => __DIR__ . '/..' . '/william-costa/dot-env/src',
        ),
        'WilliamCosta\\DatabaseManager\\' => 
        array (
            0 => __DIR__ . '/..' . '/william-costa/database-manager/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit162ccc26e31e48fabf24baa90593a89c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit162ccc26e31e48fabf24baa90593a89c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit162ccc26e31e48fabf24baa90593a89c::$classMap;

        }, null, ClassLoader::class);
    }
}
