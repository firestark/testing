<?php

namespace test;


class scenarios
{
	private $array = [ ];

	public function add ( scenario $scenario )
	{
		$this->array [ $scenario->description ] = $scenario;
	}

	public function get ( string $description )
	{
		if ( ! $this->has ( $description ) )
			throw new \runtimeException ( "A scenario described by {$description} could not be found." );
		return $this->array [ $description ];
	}

	public function has ( string $description ) : bool
	{
		return ( isset ( $this->array [ $description ] ) );
	}
}