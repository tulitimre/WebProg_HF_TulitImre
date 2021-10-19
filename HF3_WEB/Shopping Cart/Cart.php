<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    /**
     * @return CartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param CartItem[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    // TODO Generate getters and setters of properties


    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        foreach ($this->items as $value) {
            if ($value->getProduct() === $product) {
                $value->setQuantity($value->getQuantity() + $quantity);
                return $value;
            }
        }
        $theCartItem = new CartItem($product, $quantity);
        array_push($this->items, $theCartItem);
        return $theCartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        $contains = false;
        foreach ($this->items as $value) {
            if ($value->getProduct() === $product) {
                $contains = true;
                break;
            }
        }
        if ($contains) {
            foreach ($this->items as $value) {
                if ($value->getProduct() === $product) {
                    if (($key = array_search($value, $this->items)) !== false) {
                        unset($this->items[$key]);
                    }
                }
            }
        } else {
            echo "This product isn't in the cart!";
        }
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $quantityNum = 0;
        foreach ($this->items as $value) {
            $quantityNum += $value->getQuantity();
        }
        return $quantityNum;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $sum = 0;
        foreach ($this->items as $value) {
            $sum += ($value->getProduct()->getPrice() * $value->getQuantity());
        }
        return $sum;
    }
}