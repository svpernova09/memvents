<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('add or update events in database');
$I->runShellCommand('php artisan memvents:update --debug');
$I->seeInShellOutput('All Done!');