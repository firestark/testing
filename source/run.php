<?php

namespace test;


class run
{
	use \accessible;
	
	private $executed = false;
	private $scenarios = [ ];
	private $ran = [ ];
	private $failed = [ ];

	public function __construct ( array $scenarios = [ ] )
	{
		foreach ( $scenarios as $scenario )
			$this->add ( $scenario );
	}

	public function add ( scenario $scenario )
	{
		$this->scenarios [ ] = $scenario;
	}

	public function execute ( app $app )
	{
		if ( $this->executed )
			throw new \runtimeException ( 'This test run has already been executed, you may only execute it once.' );

		foreach ( $this->scenarios as $scenario )
			$this->try ( $app, $scenario );

		$this->executed = true;
	}

	private function try ( app $app, scenario $scenario )
	{
		$test = new test ( $scenario );
		$test->run ( $app );
		$this->report ( $test );
	}

	private function report ( test $test )
	{
		$this->ran [ ] = $test;

		if ( $test->hasFailures ( ) )
			$this->failed [ ] = $test;
	}
}