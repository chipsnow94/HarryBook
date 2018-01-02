<?php

class HarryPotter
{
    private $book_array;

    const PRICE_BOOK = 8;
    const DISCOUNT_RATE = [
            1 => 0,
            2 => 0.05,
            3 => 0.1,
            4 => 0.2,
            5 => 0.25
    ];
    public function price_Calculate($books)
    {
        $totaldiscount = [];
        $discountprice = 0;

        $this->book_array = array_count_values($books);
        $price = $this->default_Price();
        $counttypes = $this->count_Book_Type();
        // while ($counttypes>1) {
        //     # code...
        // }
        for (; $counttypes> 1; $counttypes = $this->count_Book_Type()) {
            $totaldiscount[]= $counttypes;
            $discountprice += $counttypes * self::PRICE_BOOK * self::DISCOUNT_RATE[$counttypes];
            $this->update_Value_Types($counttypes);

            if (count($this->book_array) == 5) {
                $three_discount_times = $this->count_Discount_Times($totaldiscount, 3);
                $five_discount_times = $this->count_Discount_Times($totaldiscount, 5);
                $diffent_price = min($three_discount_times, $five_discount_times)*0.4;
                $discountprice += $diffent_price;
            }
        }
        return (float)$price - $discountprice;
    }
    private function update_Value_Types($counttypes)
    {
        for ($i = 1; $i <= count($this->book_array);  $i++) {
            if ($this->book_array[$i] >= 1) {
                $this->book_array[$i]--;
                $counttypes--;
            }
        }
    }
    private function count_Book_Type()
    {
        $counttypes = 0;
        for ($i = 1; $i <= count($this->book_array); $i++) {
            if ($this->book_array[$i] > 0) {
                $counttypes++;
            }
        }
        return $counttypes;
    }
    private function default_Price()
    {
        $price = 0;
        for ($i=1;$i<=count($this->book_array);$i++) {
            $price += $this->book_array[$i]*self::PRICE_BOOK;
        }
        return $price;
    }
    public function count_Discount_Times($totaldiscount, $searchdiscount)
    {
        $totalsearch = 0;
        for ($i = 0; $i < count($totaldiscount); $i++) {
            if ($totaldiscount[$i] == $searchdiscount) {
                $totalsearch++;
            }
        }
        return $totalsearch;
    }
}
