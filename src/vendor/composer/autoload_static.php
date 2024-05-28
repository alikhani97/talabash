<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitccb78104cb2c839ac82d8ab1667842ae
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitccb78104cb2c839ac82d8ab1667842ae::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitccb78104cb2c839ac82d8ab1667842ae::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitccb78104cb2c839ac82d8ab1667842ae::$classMap;

        }, null, ClassLoader::class);
    }
}