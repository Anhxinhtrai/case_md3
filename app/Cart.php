<?php


namespace App;


class Cart
{
    public $items = [];
//    public $totalPrice = 0;
//    public $totalQuantity = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
//            $this->totalPrice = $oldCart->totalPrice;
//            $this->totalQuantity = $oldCart->totalQuantity;
        }
    }

    public function add($product)
    {
        $storeItem = [
            'product' => $product,
            'quantity' => 0,
            'money' => 0
        ];

        if (array_key_exists($product->id, $this->items)) {
            $storeItem = $this->items[$product->id];
        }
        $storeItem['quantity']++;
        $storeItem['money'] += $product->price;
//
//        $this->totalQuantity++;
//        $this->totalPrice += $product->price;

        $this->items[$product->id] = $storeItem;
    }

//    public function updateQuantity($product, $newQuantity)
//    {
//
//        $currentItemUpdate = $this->items[$product->id];
//        $changeQuantity = $newQuantity - $currentItemUpdate['quantity'];
//
//        $newQuantityProduct = $currentItemUpdate['quantity']+$changeQuantity;
//        $currentItemUpdate['price'] =$newQuantityProduct * $product->price;
//
//        $this->totalQuantity += $changeQuantity;
//        $this->totalPrice += $changeQuantity * $product->price;
//    }
//
//    public function delete($id)
//    {
//        $currenItem = $this->items;
//        if (array_key_exists($id,$this->items)){
//            unset($currenItem[$id]);
//        }
//        $this->items = $currenItem;
//    }
//}
}
