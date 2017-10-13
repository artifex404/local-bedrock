<?php

class Env
{
    const CONVERT_BOOL = 1;
    const CONVERT_NULL = 2;
    const CONVERT_INT = 4;
    const STRIP_QUOTES = 8;
    const USE_ENV_ARRAY = 16;

    public static $options = 15;   //All flags enabled
    public static $default = null; //Default value if not exists

    /**
     * Include the global env() function.
     * Returns whether the function has been registered or not.
     * 
     * @return bool
     */
    public static function init()
    {
        if (function_exists('env')) {
            return false;
        }

        include_once dirname(__FILE__).'/env_function.php';

        return true;
    }

    /**
     * Returns an environment variable.
     * 
     * @param string $name
     */
    public static function get($name)
    {
        if (self::$options & self::USE_ENV_ARRAY) {
            $value = isset($_ENV[$name]) ? $_ENV[$name] : false;
        } else {
            $value = getenv($name);
        }

        if ($value === false) {
            return self::$default;
        }

        return self::convert($value);
    }

    /**
     * Converts the type of values like "true", "false", "null" or "123".
     *
     * @param string   $value
     * @param int|null $options
     *
     * @return mixed
     */
    public static function convert($value, $options = null)
    {
        if ($options === null) {
            $options = self::$options;
        }

        switch (strtolower($value)) {
            case 'true':
                return ($options & self::CONVERT_BOOL) ? true : $value;

            case 'false':
                return ($options & self::CONVERT_BOOL) ? false : $value;

            case 'null':
                return ($options & self::CONVERT_NULL) ? null : $value;
        }

        if (($options & self::CONVERT_INT) && ctype_digit($value)) {
            return (int) $value;
        }

        if (($options & self::STRIP_QUOTES) && !empty($value)) {
            return self::stripQuotes($value);
        }

        return $value;
    }

    /**
     * Strip quotes.
     *
     * @param string $value
     *
     * @return string
     */
    private static function stripQuotes($value)
    {
        if (
            ($value[0] === '"' && substr($value, -1) === '"')
         || ($value[0] === "'" && substr($value, -1) === "'")
        ) {
            return substr($value, 1, -1);
        }

        return $value;
    }
}
