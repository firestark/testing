<?php

namespace test;


class suite
{
	use \accessible;
	
	private $name = '';
	private $scenarios = [ ];

	public function __construct ( string $name )
	{
		$this->name = $name;
	}

	public function add ( scenario $scenario )
	{
		$this->scenarios [ $scenario->description ] = $scenario;
	}
}