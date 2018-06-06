<?php
/**
 * Created by PhpStorm.
 * User: Maxim Masalov
 * Date: 02.04.2018
 * Time: 14:53
 */

namespace Project;


class Autoloader
{

    /**
     * Registers this instance as an autoloader.
     *
     * @param bool $prepend Whether to prepend the autoloader or not
     */
    public function register($prepend = false)
    {
        spl_autoload_register([$this, 'loadClass'], true, $prepend);
    }


    /**
     * Loads the given class or interface.
     *
     * @param  string $class The name of the class
     * @return bool|null True if loaded, null otherwise
     */
    public function loadClass($class)
    {
        if ($file = $this->findFile($class)) {
            include $file;
            return true;
        }
        return false;
    }


    /**
     * Finds the path to the file where the class is defined.
     *
     * @param string $class The name of the class
     *
     * @return string|false The path if found, false otherwise
     */
    public function findFile($class)
    {
        $namespace = explode('\\', $class);
        if ($namespace[0] == 'Project' && !empty($namespace[1]) && !empty($namespace[2])) {
            $path = $_SERVER['DOCUMENT_ROOT'] . '/local/lib/' . $namespace[1] . '/' . $namespace[2] . '.php';
            if (is_file($path)) {
                return $path;
            }
        }

        return false;
    }


}