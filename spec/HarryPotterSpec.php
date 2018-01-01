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
    public function it_1_book_1_type()
    {
        $this->caculate([1])->shouldBe(8.0);
    }
    public function it_2_book_1_type()
    {
        $this->caculate([1,1])->shouldBe(16.0);
    }
    public function it_3_book_1_type()
    {
        $this->caculate([1,1,1])->shouldBe(24.0);
    }
    public function it_2_book_2_type()
    {
        $this->caculate([1,2])->shouldBe(15.2);
    }
    public function it_3_book_2_type()
    {
        $this->caculate([1,1,2])->shouldBe(23.2);
    }
    public function it_5_book_2_type()
    {
        $this->caculate([1,1,1,2,2])->shouldBe(38.4);
    }

    // public function it_1_book_1_class()
    // {
    //     $this->pieceBiggestDiscount([1])->shouldReturn(8.0);
    // }

    // public function it_2_book_1_class()
    // {
    //     $this->pieceBiggestDiscount([1,1])->shouldReturn(16.0);
    // }

    // public function it_2_book_11111()
    // {
    //     $this->pieceBiggestDiscount([1,1,1,1,1])->shouldReturn(40.0);
    // }

    // public function it_2_book_2_class()
    // {
    //     $this->pieceBiggestDiscount([1,2])->shouldReturn(15.2);
    // }

    // public function it_3_book_111()
    // {
    //     $this->pieceBiggestDiscount([1,1,1])->shouldReturn(24.0);
    // }

    // public function it_3_book_121()
    // {
    //     $this->pieceBiggestDiscount([1,2,1])->shouldReturn(23.2);
    // }

    // public function it_3_book_123()
    // {
    //     $this->pieceBiggestDiscount([1,2,3])->shouldReturn(21.6);
    // }

    // public function it_4_book_1111()
    // {
    //     $this->pieceBiggestDiscount([1,1,1,1])->shouldReturn(32.0);
    // }

    // public function it_4_book_1211()
    // {
    //     $this->pieceBiggestDiscount([1,2,1,1])->shouldReturn(31.2);
    // }

    // public function it_4_book_1231()
    // {
    //     $this->pieceBiggestDiscount([1,2,3,1])->shouldReturn(29.6);
    // }

    // public function it_4_book_1234()
    // {
    //     $this->pieceBiggestDiscount([1,2,3,4])->shouldReturn(25.6);
    // }

    // public function it_5_book_12345()
    // {
    //     $this->pieceBiggestDiscount([1,2,3,4,5])->shouldReturn(30.0);
    // }

    // public function it_5_book_12341()
    // {
    //     $this->pieceBiggestDiscount([1,2,3,4,1])->shouldReturn(33.6);
    // }

    // public function it_6_book_123451()
    // {
    //     $this->pieceBiggestDiscount([1,2,3,4,5,1])->shouldReturn(38.0);
    // }

    // public function it_7_book_1234512()
    // {
    //     $this->pieceBiggestDiscount([1,2,3,4,5,1,2])->shouldReturn(45.2);
    // }

    // public function it_7_book_1234123()
    // {
    //     $this->pieceBiggestDiscount([1,2,3,4,1,2,3])->shouldReturn(47.2);
    // }

    // public function it_8_book_12341234()
    // {
    //     $this->pieceBiggestDiscount([1,2,3,4,1,2,3,4])->shouldReturn(51.2);
    // }

    // public function it_8_book_12341235()
    // {
    //     $this->pieceBiggestDiscount([1,1,2,2,3,3,4,5])->shouldReturn(51.2);
    // }

    // public function it_23_book_11111222233333444455555()
    // {
    //     $buybook   = [1, 1, 1, 1, 1,
    //                 2, 2, 2, 2,
    //                 3, 3, 3, 3, 3,
    //                 4, 4, 4, 4,
    //                 5, 5, 5, 5, 5];
    //     $this->pieceBiggestDiscount($buybook)->shouldReturn(141.2);
    // }

    // public function it_16_book_1111223333445555()
    // {
    //     $buybook  = [1, 1, 1,1,
    //                 2, 2,
    //                 3, 3, 3, 3,
    //                 4, 4,
    //                 5, 5, 5, 5];
    //     $this->pieceBiggestDiscount($buybook)->shouldReturn(102.4);
    // }
}
