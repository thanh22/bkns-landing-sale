<?php

/*
  |--------------------------------------------------------------------------
  | Application constants
  |--------------------------------------------------------------------------
  |
 */
// check if DEFINE_CONSTANT is defined.
// usually this file is not loaded twice or more,
// but this file is loaded during every unit test is called.

if (!defined('DEFINE_CONSTANT')) {
    define('DEFINE_CONSTANT', 1);

    // Common
    define('ENABLE', 1);
    define('DISABLE', 0);
    define('PAGE_LIMIT', 15);
    define('NUMBER_OF_OPTION', 20);
    define('ONE', 1);
    define('NAME_OPTION', 1);
    define('VALUE_OPTION', 2);
    define('OLD_VALUE_OPTION', 3);
    define('USE_OPTION', 3);
    
    define('LEFT', 0);
    define('CENTER', 1);
    define('RIGHT', 2);

    define('WAITING', 1);
    define('REGISTERED', 2);
}
