<?php

class HarryPotter
{
    private $book_arr;
    private $total_Price =0;
    private $discount_Price = 0;
    const PRICE_BOOK = 8;
    const MIN_NUM=0;
    const DISCOUNT_RATE = [
            0 => 0.0,
            1 => 0.0,
            2 => 0.05,
            3 => 0.1,
            4 => 0.2,
            5 => 0.25
    ];
    public function price_Calculate($book)
    {
        $total_Books = [];
        $this->book_arr = array_count_values($book);
        $price = $this->default_Price();
        $num_book_types = $this->count_Book_Types();
     
        for (; $num_book_types> 1; $num_book_types = $this->count_Book_Types()) {
            $total_Books[]= $num_book_types;
            $this->discount_Price($num_book_types);
            $this->update_Book_Types($num_book_types);
            if (count($this->book_arr) == 5) {
                $this->Is_Special_Price($total_Books);
            }
        }
        $this->total_Price =(double)$price - $this->discount_Price;
        return $this->total_Price;
    }
    private function discount_Price($num_book_types)
    {
        $this->discount_Price += $num_book_types * self::PRICE_BOOK * self::DISCOUNT_RATE[$num_book_types];
        return $this->discount_Price;
    }
    private function Is_Special_Price($total_Books)
    {
        $three_discount_times = $this->count_Discount_Times($total_Books, 3);
        $five_discount_times = $this->count_Discount_Times($total_Books, 5);
        $diffent_price = min($three_discount_times, $five_discount_times)*0.4;
        $this->discount_Price += $diffent_price;
        return $this->discount_Price;
    }
    private function update_Book_Types($num_book_types)
    {
        for ($i = 1; $i <= count($this->book_arr);  $i++) {
            if ($this->book_arr[$i] >= 1) {
                $this->book_arr[$i]--;
                $num_book_types-=1;
            }
        }
    }
    private function count_Book_Types()
    {
        $num_book_types = 0;
        for ($i = 1; $i <= count($this->book_arr); $i++) {
            if ($this->book_arr[$i] > 0) {
                $num_book_types+=1;
            }
        }
        return $num_book_types;
    }
    private function default_Price()
    {
        $price = 0;
        for ($i=1;$i<=count($this->book_arr);$i++) {
            $price += $this->book_arr[$i]*self::PRICE_BOOK;
        }
        return $price;
    }
    private function count_Discount_Times($total_Books, $searching_Item)
    {
        $appear_Times = 0;
        for ($i = 0; $i < count($total_Books); $i++) {
            if ($total_Books[$i] == $searching_Item) {
                $appear_Times++;
            }
        }
        return $appear_Times;
    }
    private function Is_Not_Number($num_book_types)
    {
        if ($num_book_types < self::MIN_NUM) {
            throw new InvalidArgumentException('Book must be larger than 0');
        }
    }
}
