<?php

namespace test;


class suites
{
	private $array = [ ];

	public function add ( suite $suite )
	{
		$this->array [ $suite->name ] = $suite;
	}

	public function get ( string $name )
	{
		if ( ! $this->has ( $name ) )
			throw new \runtimeException ( "A suite called: {$name} can not be found." );
		return $this->array [ $name ];
	}

	public function has ( string $name ) : bool
	{
		return ( isset ( $this->array [ $name ] ) );
	}
}