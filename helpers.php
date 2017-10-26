<?php

use Illuminate\Support\Debug\Dumper as dumper;

if ( ! function_exists ( 'dump' ) )
{
	/**
	 * Dump the passed variables.
	 *
	 * @param  dynamic  mixed
	 * @return void
	 */
	function dump ( ...$args )
	{
		foreach ( $args as $x )
            ( new dumper )->dump ( $x );
	}
}

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
    		dump ( $x );

        die ( 1 );
    }
}