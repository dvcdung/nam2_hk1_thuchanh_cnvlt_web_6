<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    
    public string $itemName;
    public float $itemCost;
    public int $itemQuantity;
    public float $itemTotal;

    function __construct($itemName, $itemCost, $itemQuantity, $itemTotal) {
        $this->itemName = $itemName;
        $this->itemCost = $itemCost;
        $this->itemQuantity = $itemQuantity;
        $this->itemTotal = $itemTotal;
    }
}
