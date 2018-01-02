<?php

namespace spec;

use HarryPotter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HarryPotterSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(HarryPotter::class);
    }
    public function it_have_1_book_1_type()
    {
        $this->price_Calculate([1])->shouldReturn(8.0);
    }
    public function it_have_2_book_1_type()
    {
        $this->price_Calculate([1,1])->shouldReturn(16.0);
    }
    public function it_have_3_book_1_type()
    {
        $this->price_Calculate([1,1,1])->shouldReturn(24.0);
    }
    public function it__has_2_book_1_type()
    {
        $this->price_Calculate([1,2])->shouldReturn(15.2);
    }
    public function it_has_3_book_1_type()
    {
        $this->price_Calculate([1,2,3])->shouldReturn(21.6);
    }
    public function it_has_4_book_1_type()
    {
        $this->price_Calculate([1,2,3,4])->shouldReturn(25.6);
    }
    public function it_3_book_2_type()
    {
        $this->price_Calculate([1,1,2])->shouldReturn(23.2);
    }
    public function it_4_book_2_type()
    {
        $this->price_Calculate([1,1,2,2])->shouldReturn(30.4);
    }
    public function it_5_book_2_type()
    {
        $this->price_Calculate([1,2,1,2,2])->shouldReturn(38.4);
    }
    public function it_8_book_12341235()
    {
        $this->price_Calculate([1,1,2,2,3,3,4,5])->shouldReturn(51.2);
    }
    // public function it_invalid_number_input_exception()
    // {
    //     $this->shouldThrow(new \InvalidArgumentException('Book must be larger than 0'))->duringPrice_Calculate(['a',1]);
    // }
}
