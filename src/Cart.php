<?php

class Cart
{
    private array items = [];
    private float subTotal;

    public function addProductToCart(int $productId, int $quantity, array $products) : string 
    {
        var $dynamicResult = validateExistingProduct($productId, $products)
        if ($dynamicResult == false)
            return "Produto Inexistente"

        $product = getProduct($dynamicResult, $products);
        bool $result = validateProductStockQuantity($product, $quantity);

        if (!$result)
            return "Não foi possível adicionar o produto {$product.getName()} no carrinho, quantidade inválida. \n Quantidade pedida: {$quantity} \n Estoque do produto: {$product.getQuantity()}"

        $product.getQuantity() -= $quantity;
        $this->items[] = ["productId" => $productId, "product" => $product, "quantity" => $quantity]

        $this->subTotal += $product.getPrice() * $quantity;
        return "Produto {$product.getName()} adicionado no carrinho!"
    }

    public function removeProductFromCart(int $productId) : string
    {
        $index = array_search($productId, array_column($this->items, "productId"), true);

        if ($index !== false)
        {
            unset($this->items[$index]);
            return "Produto removido com sucesso!"
        }

        return "Id inexistente"
    }

    public function validateExistingProduct(int $productId, array $products) : int|false
    {
        return array_search($productId, array_column($products, "id"), true);
    }

    public function getProduct(int $index, array $products) : Product
    {
        return $products[$index];
    }

    public function validateProductStockQuantity(Product $product, int $quantity) : bool
    {
        if ($quantity <= 0 | $quantity > $product.getQuantity())
            return false;

        return true;
    }
}
?>