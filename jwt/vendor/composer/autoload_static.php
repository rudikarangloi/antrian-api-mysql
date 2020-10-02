<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite9c49e742ed9da1ac67b22ae555c901a
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite9c49e742ed9da1ac67b22ae555c901a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite9c49e742ed9da1ac67b22ae555c901a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}