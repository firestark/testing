<?php

use testing\debug\dumper;


if ( ! function_exists ( 'dd' ) )
{
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function dd ( ...$args )
    {
        foreach ( $args as $x )
            ( new Dumper )->dump ( $x );

        die ( 1 );
    }
}