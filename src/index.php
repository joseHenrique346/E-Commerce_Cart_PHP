<?php
require_once 'Product.php';
require_once 'Cart.php';

$product = new Product(0, '', 0.0, 0);
$products = $product->generateSimulatedProducts();

$cart = new Cart();
echo "<hr>";
// CASO 1: Adicionar produto válido
echo $cart->addProductToCart(1, 2, $products);
echo $cart->addProductToCart(2, 1, $products);
echo "<hr>";

// CASO 2: Adicionar além do estoque
echo $cart->addProductToCart(3, 10, $products);
echo "<hr>";

// CASO 3: Remover produto do carrinho
echo $cart->removeProductFromCart(2);
echo "<hr>";

// CASO 4: Aplicação do cupom de desconto
$totalComDesconto = $cart->getSubTotal();
echo "Subtotal com desconto aplicado: R$ " . $totalComDesconto . "<br>";

// Listar itens do carrinho
echo "Itens no carrinho:<br>";
foreach ($cart->getItems() as $item) {
    $product = $item['product'];
    $quantity = $item['quantity'];
    $subtotal = $product->getPrice() * $quantity;
    echo "- {$product->getName()} | Qtd: {$quantity} | Preço unit: R$ " . $product->getPrice() . " | Subtotal: R$ " . $subtotal . "<br>";
}

// Total final
echo "Total do carrinho: R$ " . $cart->getSubTotal();
