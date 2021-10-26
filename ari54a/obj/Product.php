<?php


class Product
{
    private $name;
    private $total_price;
    private $price;
    private $quantity;
    private $picture;

    public function __construct($name, $price, $quantity, $picture)
    {
        $this->name = $name;
        $this->price = $price;
        $this->total_price = $price * $quantity;
        $this->quantity = $quantity;
        $this->picture = $picture;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function addQuantity($quantity)
    {
        $this->quantity += $quantity;
        $this->total_price += $quantity * $this->price;
    }
}
