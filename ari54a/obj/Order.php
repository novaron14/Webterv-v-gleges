<?php


class Order
{
    private $id;
    private $date;
    private $products;
    private $total_price;
    private $shipping;

    public function __construct($id, $date, $products)
    {
        $this->id = $id;
        $this->date = $date;
        $this->products = $products;
        foreach ($products as $product) {
            $this->total_price += $product->getTotalPrice();
        }
        $this->shipping[0] = false;
    }

    public function addExtraCharge($val)
    {
        $this->shipping[0] = true;
        $this->shipping[1] = $val;
        $this->total_price += $val;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function setId()
    {
        $files = scandir("data/orders", SCANDIR_SORT_DESCENDING);
        $latest = intval(explode(".", $files[0])[0]);
        $id_new = $latest + 1;
        $this->id = str_pad($id_new, "8", "0", STR_PAD_LEFT);
    }

    public function setDate()
    {
        date_default_timezone_set('Europe/Budapest');
        $t = time();
        $this->date = date("Y-m-d h:m:s a");
    }



    function save($address, $phoneNum, $note, $extraAddress)
    {
        //kimentés a rendelésekhez (data/orders/)
        $file = fopen("data/orders/" . $this->id . ".txt", "w");
        $content = "[ " . $this->id . " ][ " . $this->date . " ]\n";
        $content .= "[ " . join($address, " | ") . " ] [ " . $phoneNum. " ]\n";
        if($extraAddress != "") $content .= "[ delivery address: " . $extraAddress . " ]\n";
        if($note != "") $content .= "[ note: " . $note . " ]\n";
        foreach ($this->products as $product) {
            $content .= " -> " . join("  ~  ", array($product->getName(), $product->getQuantity() . " db", $product->getTotalPrice() . " Ft")) . "\n";
        }
        if($this->shipping[0])  $content .= " -> Szállítási díj  ~  " . $this->shipping[1] . " Ft";
        $content .= "\nTotal: " . $this->total_price . " Ft";
        fwrite($file, $content);
        fclose($file);

        //mentés a felhasználó adataihoz (data/users.csv)
        $_SESSION['user']->addOrder($this->getId(), date("Y.m.d.", strtotime($this->getDate())), $this->getTotalPrice());
    }
}