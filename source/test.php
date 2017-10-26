<?php

namespace test;

use closure;


class test
{
	use \accessible;
	
	private $scenario = null;
	private $failed = [ ];
	private $ran = [ ];

	public function __construct ( scenario $scenario )
	{
		$this->scenario = $scenario;
	}

	public function run ( app $app )
	{
		foreach ( $this->scenario->precedents as $precedent )
			$this->try ( $app, $this->scenario->test, $precedent );
	}

	public function hasFailures ( ) : bool
	{
		return ( count ( $this->failed ) !== 0 );
	}

	private function try ( app $app, closure $test, closure $precedent )
	{
		$parameters = $app->call ( $precedent );
		$result = $app->call ( $test, $parameters );
		
		$this->report ( $parameters, $result );
	}

	private function report ( array $parameters, bool $passed )
	{
		$this->ran [ ] = $parameters;
		
		if ( $passed )
			return;
		
		$this->failed [ ] = $parameters;
	}
}