<?php

class Product
{
    #region Properties
    private $id;
    private $name;
    private $price;
    private $stock;
    #endregion

    #region Constructor
    public function __construct(int $id, string $name, float $price, int $stock)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }
    #endregion

    #region Getters Setters
    public function getId() : int { return $this->id; }
    public function setId(int $id) : void { $this->id = $id; }

    public function getName() : string { return $this->name; }
    public function setName(string $name) : void { $this->name = $name; }

    public function getPrice() : float { return $this->price; }
    public function setPrice(float $price) : void { $this->price = $price; }
    
    public function getStock() : int { return $this->stock; }
    public function setStock(int $stock) : void { $this->stock = $stock; }
    #endregion

    public function generateSimulatedProducts() : array
    {
        $productsData = [
            ["id" => 1, "name" => "Prato", "price" => 29.90, "stock" => 10],
            ["id" => 2, "name" => "Copo", "price" => 16.90, "stock" => 15],
            ["id" => 3, "name" => "Talheres", "price" => 39.90, "stock" => 5]
        ];

        $products = [];

        foreach ($productsData as $p) {
            $products[] = new Product($p['id'], $p['name'], $p['price'], $p['stock']);
        }

        return $products;
    }
} 

?>