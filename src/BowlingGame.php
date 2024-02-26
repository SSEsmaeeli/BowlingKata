<?php

namespace Sajjad\BowlingKata;

class BowlingGame
{
    private array $rolls = [];

    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }

    public function score(): int
    {
        $score = 0;
        $rollIndex = 0;

        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->isStrike($rollIndex)) {
                $score += 10 + $this->strikeBonus($rollIndex);
                $rollIndex++;
            } elseif ($this->isSpare($rollIndex)) {
                $score += 10 + $this->spareBonus($rollIndex);
                $rollIndex += 2;
            } else {
                $score += $this->sumOfPinsInFrame($rollIndex);
                $rollIndex += 2;
            }
        }

        return $score;
    }

    private function isStrike($rollIndex): bool
    {
        return $this->rolls[$rollIndex] == 10;
    }

    private function isSpare($rollIndex): bool
    {
        return $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1] == 10;
    }

    private function strikeBonus($rollIndex)
    {
        return $this->rolls[$rollIndex + 1] + $this->rolls[$rollIndex + 2];
    }

    private function spareBonus($rollIndex)
    {
        return $this->rolls[$rollIndex + 2];
    }

    private function sumOfPinsInFrame($rollIndex)
    {
        return $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1];
    }
}
