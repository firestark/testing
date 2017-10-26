<?php

namespace test\console;

use console\command;
use test\run;
use test\test;


class reporter
{
	public function report ( run $run, command $command )
	{
		$ran = count ( $run->ran );
		$command->info ( "ran {$ran} scenario('s)." );
		$command->line ( '' ); $command->line ( '' );

		if ( count ( $run->failed ) !== 0 )
			$this->failures ( $run->failed, $command );
		else
			$command->info ( 'Successfully ran all tests.' );
	}

	private function failures ( array $failed, command $command )
	{
		foreach ( $failed as $test )
			$this->debug ( $test, $command );
	}

	private function debug ( test $test, command $command )
	{
		$count = count ( $test->failed );
		$command->error ( $test->scenario->description );
		$command->line ( '' );
		$command->info ( "The scenario failed with the following {$count} argument sets:" );

		foreach ( $test->failed as $arguments )
			$this->write ( $command, $arguments );
	}

	private function write ( command $command, array $arguments )
	{
		$command->line ( '------------------------------------------------------------------------' );
		$command->line ( '' );
		dump ( $arguments );
		$command->line ( '' );
		$command->line ( '------------------------------------------------------------------------' );
	}
}