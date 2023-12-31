<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInited2d7d0ad2b02568be7be2cd06a21f9f
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        'e39a8b23c42d4e1452234d762b03835a' => __DIR__ . '/..' . '/ramsey/uuid/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'R' => 
        array (
            'Ramsey\\Uuid\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Ramsey\\Uuid\\' => 
        array (
            0 => __DIR__ . '/..' . '/ramsey/uuid/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInited2d7d0ad2b02568be7be2cd06a21f9f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInited2d7d0ad2b02568be7be2cd06a21f9f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInited2d7d0ad2b02568be7be2cd06a21f9f::$classMap;

        }, null, ClassLoader::class);
    }
}
