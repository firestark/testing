<?php

namespace test\console\commands;

use test\app;
use test\console\reporter;
use test\suites;


class suiteRunner extends \console\command
{
    protected $signature = 'suite {name}';
    protected $description = 'Run a test suite.';
    private $suites = null;
    private $reporter = null;

    public function __construct ( app $app, suites $suites, reporter $reporter = null )
    {
    	parent::__construct ( );
    	$this->app = $app;
    	$this->suites = $suites;
    	$this->reporter = ( $reporter ) ?: new reporter;
    }

    public function handle ( )
    {
    	$suite = $this->suites->get ( $this->argument ( 'name' ) );
		$run = new \test\run ( $suite->scenarios );
		$run->execute ( $this->app );	
		$this->reporter->report ( $run, $this );
    }
}