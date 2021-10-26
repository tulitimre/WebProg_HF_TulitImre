<?php

namespace ProductNamespace {
    //require_once "Cart.php";
    include "loader.php";

    use CartNamespace\Cart;
    use CartItemNamespace\CartItem;

    class Product
    {
        private int $id;
        private string $title;
        private float $price;
        private int $availableQuantity;

        public function __construct(int $id, string $title, float $price, int $availableQuantity)
        {
            $this->id = $id;
            $this->title = $title;
            $this->price = $price;
            $this->availableQuantity = $availableQuantity;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function getTitle(): string
        {
            return $this->title;
        }

        public function setTitle(string $title): void
        {
            $this->title = $title;
        }

        public function getPrice(): float
        {
            return $this->price;
        }

        public function setPrice(float $price): void
        {
            if ($price > 0)
                $this->price = $price;
            else echo "The price cannot be negative!";
        }

        public function getAvailableQuantity(): int
        {
            return $this->availableQuantity;
        }

        public function setAvailableQuantity(int $availableQuantity): void
        {
            if ($availableQuantity >= 0) {
                $this->availableQuantity = $availableQuantity;
            } else {
                echo "The available quantity can not be lower than zero!";
            }
        }

        /**
         * Add Product $product into cart. If product already exists inside cart
         * it must update quantity.
         * This must create CartItem and return CartItem from method
         * Bonus: $quantity must not become more than whatever
         * is $availableQuantity of the Product
         *
         * @param Cart $cart
         * @param int $quantity
         * @return CartItem
         */
        public function addToCart(Cart $cart, int $quantity): CartItem
        {
            foreach ($cart->getItems() as $item) {
                if ($item === $this) {
                    $item->increaseQuantity();
                }
            }
            return $cart->addProduct($this, $quantity);
        }

        /**
         * Remove product from cart
         *
         * @param Cart $cart
         */
        public function removeFromCart(Cart $cart)
        {
            $cart->removeProduct($this);
        }
    }
}