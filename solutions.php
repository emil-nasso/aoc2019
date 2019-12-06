<?php

function day1($input)
{
    return $input
        ->map(fn ($i) => $i / 3)
        ->map(fn ($i) => (int) floor($i))
        ->map(fn ($i) => $i - 2)
        ->sum();
}

function day1_2($input)
{
    return $input
        ->map(fn ($i) => fuel($i))
        ->sum();
}


function fuel($mass)
{
    $fuel = (int) floor($mass / 3) - 2;
    return $fuel <= 0 ? 0 : $fuel + fuel($fuel);
}

function day2($instructions, $position)
{
    return $instructions[$position] == 99 ? [$instructions, null] : day2(...($instructions[$position] == 1 ?
        [[$instructions[$position + 3] => ($instructions[$instructions[$position + 1]] + $instructions[$instructions[$position + 2]])] + $instructions, $position + 4]
        : [[$instructions[$position + 3] => ($instructions[$instructions[$position + 1]] * $instructions[$instructions[$position + 2]])] + $instructions, $position + 4]));
}


function day3()
{ }

function instructionDiff($instruction)
{
    return $instruction[0] == "R" ? collect(range(1, substr($instruction, 1)))->map(fn ($s) => [$s, 0])->all() : ($instruction[0] == "L" ? collect(range(-1 * substr($instruction, 1), -1))->map(fn ($s) => [$s, 0])->all() : ($instruction[0] == "U" ? collect(range(1, substr($instruction, 1)))->map(fn ($s) => [0, $s])->all() : collect(range(-1 * substr($instruction, 1), -1))->map(fn ($s) => [0, $s])->all()));
}

function crossedPoints($instruction, $point)
{
    // return collect()
    // return collect$instruction)->map(fn ($moves) => [$move]);
}
