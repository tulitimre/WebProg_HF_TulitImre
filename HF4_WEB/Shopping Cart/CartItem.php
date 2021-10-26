<?php

namespace CartItemNamespace {
    include "loader.php";

    use ProductNamespace\Product;

    class CartItem
    {
        private Product $product;
        private int $quantity;

        // TODO Generate constructor with all properties of the class

        public function __construct(Product $product, int $quantity)
        {
            $this->product = $product;
            $this->quantity = $quantity;
        }

        /**
         * @return Product
         */
        public function getProduct(): Product
        {
            return $this->product;
        }

        /**
         * @param Product $product
         */
        public function setProduct(Product $product): void
        {
            $this->product = $product;
        }

        /**
         * @return int
         */
        public function getQuantity(): int
        {
            return $this->quantity;
        }

        /**
         * @param int $quantity
         */
        public function setQuantity(int $quantity): void
        {
            if ($quantity >= 0) {
                $this->quantity = $quantity;
            } else {
                echo "The quantity must to be greater or equal then zero!";
            }
        }

        // TODO Generate getters and setters of properties

        public function increaseQuantity()
        {
            //TODO $quantity must be increased by one.
            // Bonus: $quantity must not become more than whatever is Product::$availableQuantity
            if ($this->product->getAvailableQuantity() >= ($this->quantity + 1))
                $this->quantity++;
            else echo "No more available quantity!";
        }

        public function decreaseQuantity()
        {
            //TODO $quantity must be increased by one.
            // Bonus: Quantity must not become less than 1
            if (($this->quantity - 1) >= 1)
                $this->quantity--;
            else echo "Quantity must not become less than one!";
        }
    }
}