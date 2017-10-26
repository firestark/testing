<?php

namespace test\console\commands;

use test\app;
use test\console\reporter;
use test\scenarios;


class scenarioRunner extends \console\command
{
    protected $signature = 'scenario {description}';
    protected $description = 'Run a test scenario.';
    private $scenarios = null;
    private $reporter = null;

    public function __construct ( app $app, scenarios $scenarios, reporter $reporter = null )
    {
    	parent::__construct ( );
    	$this->app = $app;
    	$this->scenarios = $scenarios;
    	$this->reporter = ( $reporter ) ?: new reporter;
    }

    public function handle ( )
    {
    	$scenario = $this->scenarios->get ( $this->argument ( 'description' ) );
		$run = new \test\run ( [ $scenario ] );
		$run->execute ( $this->app );
		$this->reporter->report ( $run, $this );
    }
}