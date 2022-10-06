<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
            'name' => 'required|max:255',
            'price' => 'required|numeric|gt:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:255',
            'stock' => 'required|numeric|gt:0',
            'trademark' => 'required|max:255',
            'category' => 'required|max:255',
            'subcategory' => 'required|max:255',
            'featured' => 'required|numeric|between:0,1',
        ]);
    }

    public static function sumPricesByQuantities($products, $productsInSession)
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice() * $productsInSession[$product->getId()] - $product->getDiscountedprice() * $productsInSession[$product->getId()]);
        }
        //
        return $total;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    // public function getState()
    // {
    //     return $this->attributes['paid'];
    // }

    // public function setState($paid)
    // {
    //     $this->attributes['paid'] = $paid;
    // }

    public function getName()
    {
        return strtoupper($this->attributes['name']);
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getDiscountedprice()
    {
        return $this->attributes['discounted_price'];
    }

    public function setDiscountedprice($discountedprice)
    {
        $this->attributes['discounted_price'] = $discountedprice;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function getCategory()
    {
        return $this->attributes['category'];
    }

    public function setCategory($category)
    {
        $this->attributes['category'] = $category;
    }

    public function getSubcategory()
    {
        return $this->attributes['subcategory'];
    }

    public function setSubcategory($subcategory)
    {
        $this->attributes['subcategory'] = $subcategory;
    }

    public function getFeatured()
    {
        return $this->attributes['featured'];
    }

    public function setFeatured($featured)
    {
        $this->attributes['featured'] = $featured;
    }

    public function getTrademark()
    {
        return $this->attributes['trademark'];
    }

    public function setTrademark($trademark)
    {
        $this->attributes['trademark'] = $trademark;
    }

    public function getStock()
    {
        return $this->attributes['stock'];
    }

    public function setStock($stock)
    {
        $this->attributes['stock'] = $stock;
    }

    public function getSales()
    {
        return $this->attributes['sales'];
    }

    public function setSales($sales)
    {
        $this->attributes['sales'] = $sales;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }
}
