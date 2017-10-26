<?php

namespace test;

use closure;


class facade
{
	private $suites = null;
	private $scenarios = null;
	private $selected = null;

	public function __construct ( suites $suites, scenarios $scenarios )
	{
		$this->suites = $suites;
		$this->scenarios = $scenarios;
	}

	public function suite ( string $name, string $directory )
	{
		$this->suites->add ( new suite ( $name ) );
		requiring ( $directory . '/scenario\'s' );
		requiring ( $directory . '/precedents' );
	}

	public function scenario ( string $description, closure $test )
	{
		$this->scenarios->add ( $scenario = new scenario ( $description, $test ) );
		$this->selected = $scenario;
		return $this;
	}

	public function grouped ( ...$groups )
	{
		foreach ( $groups as $group )
			$this->grouping ( $this->selected, $group );
		return $this;
	}

	public function tagged ( ...$tags )
	{
		foreach ( $tags as $tag )
			$this->selected->tag ( $tag );
		return $this;
	}

	public function precedent ( string $scenario, closure $precedent )
	{
		$scenario = $this->scenarios->get ( $scenario );
		$scenario->test ( $precedent );
	}

	private function grouping ( scenario $scenario, string $suite )
	{
		$suite = $this->suites->get ( $suite );
		$suite->add ( $scenario );
	}
}