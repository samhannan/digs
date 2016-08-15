<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

$console = new Application('My Silex Application', 'n/a');
$console->getDefinition()->addOption(new InputOption('--env', '-e', InputOption::VALUE_REQUIRED, 'The Environment name.', 'dev'));
$console->setDispatcher($app['dispatcher']);
$console
    ->register('populate-towns')
    ->setDefinition(array(
        // new InputOption('some-option', null, InputOption::VALUE_NONE, 'Some help'),
    ))
    ->setDescription('Populate town and county tables with csv data')
    ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
        
        $file = dirname(__FILE__) . '/../../_asset/towns.csv';

        $fh = fopen($file, "r");

		while(!feof($fh)) {
			$row = fgetcsv($fh);

			if($row[0] == 'Town')
				continue;

			$town = trim($row[0]);
			$county_name = trim($row[1]);

			$County = models\County::where('name', $county_name)->first();
			
			if(empty($County)) {
				$County = new models\County;
				$County->name = $county_name;
				$County->save();
			}

			$Town = new models\Town;
			$Town->name = $town;
			$Town->county_id = $County->id;
			$Town->save();

		}

		fclose($fh);
	});

return $console;