<?php

class HarryPotter
{
    private $book_array;
    private $discount_Price = 0;
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
        $total_Discount_Price = [];
        $this->book_array = array_count_values($books);
        $price = $this->default_Price();
        $num_book_types = $this->count_Book_Types();
        for (; $num_book_types> 1; $num_book_types = $this->count_Book_Types()) {
            $total_Discount_Price[]= $num_book_types;
            $this->discount_Price += $num_book_types * self::PRICE_BOOK * self::DISCOUNT_RATE[$num_book_types];
            $this->update_Book_Types($num_book_types);
            if (count($this->book_array) == 5) {
                $this->Is_Special_Price($total_Discount_Price);
            }
        }
        return (float)$price - $this->discount_Price;
    }
    private function Is_Special_Price($total_Discount_Price)
    {
        $three_discount_times = $this->count_Discount_Times($total_Discount_Price, 3);
        $five_discount_times = $this->count_Discount_Times($total_Discount_Price, 5);
        $diffent_price = min($three_discount_times, $five_discount_times)*0.4;
        $this->discount_Price += $diffent_price;
        return $this->discount_Price;
    }
    private function update_Book_Types($num_book_types)
    {
        for ($i = 1; $i <= count($this->book_array);  $i++) {
            if ($this->book_array[$i] >= 1) {
                $this->book_array[$i]--;
                $num_book_types-=1;
            }
        }
    }
    private function count_Book_Types()
    {
        $num_book_types = 0;
        for ($i = 1; $i <= count($this->book_array); $i++) {
            if ($this->book_array[$i] > 0) {
                $num_book_types++;
            }
        }
        return $num_book_types;
    }
    private function default_Price()
    {
        $price = 0;
        for ($i=1;$i<=count($this->book_array);$i++) {
            $price += $this->book_array[$i]*self::PRICE_BOOK;
        }
        return $price;
    }
    private function count_Discount_Times($total_Discount_Price, $searchdiscount)
    {
        $totalsearch = 0;
        for ($i = 0; $i < count($total_Discount_Price); $i++) {
            if ($total_Discount_Price[$i] == $searchdiscount) {
                $totalsearch++;
            }
        }
        return $totalsearch;
    }
}
