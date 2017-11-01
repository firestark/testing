<?php

namespace testing\debug;

use Symfony\Component\VarDumper\Cloner\VarCloner as cloner;
use Symfony\Component\VarDumper\Dumper\CliDumper as cliDumper;


class dumper
{
    public static function dump ( $value )
    {
        $dumper = in_array ( PHP_SAPI, [ 'cli', 'phpdbg' ] ) ? new cliDumper : new htmlDumper;
        $dumper->dump ( ( new cloner )->cloneVar ( $value ) );
    }
}