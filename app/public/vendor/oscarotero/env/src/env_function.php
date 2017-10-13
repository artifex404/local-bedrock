<?php

/**
 * Gets the value of an environment variable.
 *
 * @param string $name The value name
 *
 * @return mixed
 */
function env($name)
{
    return Env::get($name);
}
