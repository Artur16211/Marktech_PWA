<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trademarks extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['image'] - string - contains the product image
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     *  * $this->items - Item[] - contains the associated items
     */
    public static function validate($request)
    {
        $request->validate([
            'trademarks' => 'required|max:255',
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTrademarks()
    {
        return $this->attributes['trademarks'];
    }

    public function setTrademarks($trademarks)
    {
        $this->attributes['trademarks'] = $trademarks;
    }
}
