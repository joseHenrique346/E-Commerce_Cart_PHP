<?php

class Cart
{
    private array $items = [];
    private float $subTotal = 0.0;
    private const DISCOUNT_COUPON = 0.10;

    public function addProductToCart(int $productId, int $quantity, array $products) : string 
    {
        $product = $this->getProduct($productId, $products);

        if (!$product) 
        {
            return "Produto Inexistente <br>";
        }

        if (!$this->validateProductStockQuantity($product, $quantity)) 
        {
            return "Não foi possível adicionar o produto {$product->getName()} no carrinho, quantidade inválida.<br>Quantidade pedida: {$quantity}<br>Estoque do produto: {$product->getStock()} <br><br>";
        }

        $product->setStock($product->getStock() - $quantity);

        $this->items[] = ["productId" => $productId, "product" => $product, "quantity" => $quantity];

        $this->subTotal += $product->getPrice() * $quantity;

        return "Produto {$product->getName()} adicionado no carrinho! <br>";
    }

    public function removeProductFromCart(int $productId) : string
    {
        $index = array_search($productId, array_column($this->items, "productId"), true);

        if ($index !== false) {
            $product = $this->items[$index]["product"];
            $product->setStock($product->getStock() + $this->items[$index]["quantity"]);

            unset($this->items[$index]);
            return "Produto removido com sucesso! <br><br>";
        }

        return "Id inexistente <br>";
    }

    private function getProduct(int $productId, array $products) : ?Product
    {
        foreach ($products as $product) {
            if ($product->getId() === $productId) {
                return $product;
            }
        }
        return null;
    }

    private function validateProductStockQuantity(Product $product, int $quantity) : bool
    {
        return $quantity > 0 && $quantity <= $product->getStock();
    }

    public function getSubTotal() : float
    {
        $this->subTotal * (1 - self::DISCOUNT_COUPON);
        return $this->subTotal;
    }

    public function getItems() : array
    {
        return $this->items;
    }
}
?>