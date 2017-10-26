<?php

namespace test;

use closure;


class scenario
{
	use \accessible;

	private $description = '';
	private $test = null;
	private $precedents = [ ];
	private $tags = [ ];

	public function __construct ( string $description, closure $test )
	{
		$this->description = $description;
		$this->test = $test;
	}

	public function test ( closure $precedent )
	{
		$this->precedents [ ] = $precedent;
	}

	public function tag ( ...$tags )
	{
		foreach ( $tags as $tag )
			if ( ! in_array ( $tag, $this->tags ) )
				$this->tags [ ] = $tag;
	}
}