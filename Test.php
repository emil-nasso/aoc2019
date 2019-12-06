<?php

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    private function input($name)
    {
        return collect(explode("\n", file_get_contents(__DIR__ . "/{$name}.txt")));
    }

    public function test_day1()
    {
        $this->assertEquals(3336439, day1($this->input('day1')));
    }

    public function test_day1_2()
    {
        $this->assertEquals(2, day1_2(collect([14])));
        $this->assertEquals(50346, day1_2(collect([100756])));
        $this->assertEquals(5001791, day1_2($this->input('day1_2')));
    }

    public function test_day2()
    {
        $this->assertEquals([[2, 0, 0, 0, 99], null], day2([1, 0, 0, 0, 99], 0));
        $this->assertEquals([[2, 3, 0, 6, 99], null], day2([2, 3, 0, 3, 99], 0));
        $this->assertEquals([[2, 4, 4, 5, 99, 9801], null], day2([2, 4, 4, 5, 99, 0], 0));
        $this->assertEquals([[30, 1, 1, 4, 2, 5, 6, 0, 99], null], day2([1, 1, 1, 4, 99, 5, 6, 0, 99], 0));

        $input = $this->input('day2')->all();
        $input[1] = 12;
        $input[2] = 2;
        $result = day2($input, 0);
        $this->assertEquals(5098658, $result[0][0]);
    }

    public function test_day2_1()
    {
        $duple = null;
        collect(range(0, 175))->each(function ($x) use (&$duple) {
            collect(range(0, 175))->each(function ($y) use ($x, &$duple) {
                if ($duple) {
                    return;
                }
                $input = $this->input('day2')->all();
                $input[1] = $x;
                $input[2] = $y;
                $result = day2($input, 0);
                if ($result[0][0] == 19690720) {

                    $duple = [$x, $y];
                }
            });
        });

        $this->assertEquals(5064, 100 * $duple[0] + $duple[1]);
    }

    public function test_day3()
    {
        $this->assertEquals(
            [[-2, 0], [-1, 0]],
            instructionDiff("L2")
        );
        $this->assertEquals(
            [[1, 0], [2, 0]],
            instructionDiff("R2")
        );
        $this->assertEquals(
            [
                [0, 1], [0, 2]
            ],
            instructionDiff("U2")
        );
        $this->assertEquals(
            [
                [0, -2], [0, -1]
            ],
            instructionDiff("D2")
        );
    }
}
