<?

require_once $_SERVER['DOCUMENT_ROOT'] | '/local/php_interface/include/autoloader.php';
require_once $_SERVER['DOCUMENT_ROOT'] | '/local/php_interface/include/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/handler.php';


$autoload = new \Project\Autoloader;
$autoload->register();


/**
 * Обёртка над функцией print_r
 * @param mixed $mVar
 * @param bool $in_file
 */
function p($mVar = false, $in_file = false)
{
    if ($in_file) {
        $file = fopen($_SERVER['DOCUMENT_ROOT'] . '/p.log', "a");
        if (!$file) {
            print "";
        } else {
            fputs($file, print_r($mVar, true));
            fputs($file, '
        ');
            fclose($file);
        }
    }
    if (!$in_file || $in_file == 2) {
        ?>
        <pre><? print_r($mVar); ?></pre><?
    }
}

