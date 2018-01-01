<?php

class HarryPotter
{
    private $set_of_book;

    const PRICE_BOOK = 8;
    const DISCOUNT = [
            1 => 0,
            2 => 0.05,
            3 => 0.1,
            4 => 0.2,
            5 => 0.25
    ];
    public function caculate($books)
    {
        $totaldiscount = "";
        $discountprice = 0;
        $this->set_of_book = array_count_values($books);
        $price=$this->defaulPrice();
        $counttypes = $this->countType();
        for (; $counttypes> 1; $counttypes = $this->countType()) {
            // $totaldiscount .= (string)$counttypes;
            $discountprice += $counttypes * self::PRICE_BOOK * self::DISCOUNT[$counttypes];
            $this->updateValueTypes($counttypes);
        }
        
        return (double)$price - $discountprice;
    }
    private function updateValueTypes($counttypes)
    {
        for ($i = 1; $i <= count($this->set_of_book);  $i++) {
            if ($this->set_of_book[$i] >= 1) {
                $this->set_of_book[$i]--;
                $counttypes--;
            }
        }
    }
    private function countType()
    {
        $counttypes = 0;
        for ($i = 1; $i <= count($this->set_of_book); $i++) {
            if ($this->set_of_book[$i] > 0) {
                $counttypes++;
            }
        }
        return $counttypes;
    }
    private function defaulPrice()
    {
        $price = 0;
        for ($i=1;$i<=count($this->set_of_book);$i++) {
            $price += $this->set_of_book[$i]*self::PRICE_BOOK;
        }
        return $price;
    }
    

    // public function pieceBiggestDiscount($buybook)
    // {
    //     $piecediscount = 0;
    //     $totaldiscount = '';

    //     $this->valuetypes = array_count_values($buybook);
    //     $piece = $this->totalPieceDefault();
        
    //     $counttypes = $this->countTypes();
        
    //     for (; $counttypes> 1; $counttypes = $this->countTypes()) {
    //         $totaldiscount .= (string)$counttypes;
    //         $piecediscount += $counttypes * self::PIECE_BOOK * self::DISCOUNT[$counttypes]; //= 10
    //         $this->updateValueTypes($counttypes);
    //     }

    //     if (count($this->valuetypes) == 5) {
    //         $threediscount = $this->countDiscount($totaldiscount, 3);
    //         $fivediscount = $this->countDiscount($totaldiscount, 5);
    //         $bountdiscount = min($threediscount,$fivediscount);
    //         $piecediscount += $bountdiscount*0.4;
    //     }

    //     return (double)$piece - $piecediscount;
    // }

    // public function totalPieceDefault()
    // {
    //     $piece = 0;
    //     for ($i = 1; $i <= count($this->valuetypes); $i++) {
    //         $piece += self::PIECE_BOOK * $this->valuetypes[$i];
    //     }
    //     return $piece;
    // }

    // public function countDiscount($totaldiscount, $searchdiscount)
    // {
    //     $totalsearch = 0;
    //     for ($i = 0; $i < strlen($totaldiscount); $i++) {
    //         if ($totaldiscount[$i] == $searchdiscount) {
    //             $totalsearch++;
    //         }
    //     }
    //     return $totalsearch;
    // }

    // public function countTypes()
    // {
    //     $counttypes = 0;
    //     for ($i = 1; $i <= count($this->valuetypes); $i++) {
    //         if ($this->valuetypes[$i] > 0) {
    //             $counttypes++;
    //         }
    //     }
    //     return $counttypes;
    // }

    // public function updateValueTypes($discounttypes)
    // {
    //     for ($i = 1; $i <= count($this->valuetypes);  $i++) {
    //         if ($this->valuetypes[$i] >= 1) {
    //             $this->valuetypes[$i]--;
    //             $discounttypes--;
    //         }
    //     }
    // }
}
