José Henrique de castro fernandes - 1994033
# Simulador de Carrinho de Compras
 
Este projeto é uma forma simples de entender como funciona um carrinho de e-commerce, praticando Clean code e boas práticas como organização do código e clareza.  

---

## Como rodar o projeto

1. Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html)  
2. Copie a pasta do projeto para `C:\xampp\htdocs\`  
3. Abra o **Apache** no painel do XAMPP  
4. No navegador, acesse:
5. http://localhost/src/index.php

Você verá o simulador funcionando com produtos sendo adicionados, removidos e o total sendo calculado.

---

## Funcionalidades

- Adicionar produtos ao carrinho  
- Remover produtos do carrinho  
- Listar os itens no carrinho com quantidade, preço e subtotal  
- Calcular o total do carrinho  
- Aplicar um cupom de desconto fixo (10%)  

---

## Regras do carrinho

- Não é possível adicionar produtos que não existem  
- A quantidade adicionada não pode ultrapassar o estoque disponível  
- Ao remover produtos, o estoque é restaurado automaticamente  
- O desconto é aplicado no total final usando o cupom **DESCONTO10**  

---

## Estrutura do projeto

src/
├─ Product.php # Classe Produto
├─ Cart.php # Classe Carrinho
└─ index.php # Exemplo de uso do carrinho
docs/
└─ projeto-1-carrinho-prd.md # Documento de Requisitos do Projeto (PRD)

## Criado para aplicar boas práticas de organização de código, DRY e KISS  
