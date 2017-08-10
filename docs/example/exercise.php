<?php

class exercise
{
	use accessible;
	
	private $name = '';

	public function __construct ( string $name )
	{
		$this->name = capitalize ( $name );
	}
}