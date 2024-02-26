<?php

use Sajjad\BowlingKata\BowlingGame;

require __DIR__ . '/../vendor/autoload.php';

$game = new BowlingGame();
$game->roll(5);


echo $game->score();