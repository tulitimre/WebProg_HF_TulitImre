<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Please enter your id:<br>
    <input type="text" name="id"><br>
    <input type="submit" name="submit" value="Submit"><br>
</form>
<?php

if (isset($_GET['id'])) {
    if (is_int(filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT))) {
        $user = useCurl("https://fakestoreapi.com/users/" . $_GET['id']);
        if ($user != null) {
            $products = useCurl("https://fakestoreapi.com/products");
            $userCarts = useCurl("https://fakestoreapi.com/carts/user/" . $_GET['id']);
            aboutMyCarts($products, $userCarts);
        } else {
            echo "User with id " . $_GET['id'] . " doesn't exists!";
        }
    } else {
        echo "The id must be an integer!";
    }
}

function useCurl($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    return json_decode($response_json, true);
}

function aboutMyCarts($products, $userCarts)
{
    if (count($userCarts) != 0) {
        echo "User id: " . $_GET['id'] . "<br>";
        echo "Number of carts: " . count($userCarts) . "<br><br>";
        $totalSum = 0;
        $cartSum = 0;
        foreach ($userCarts as $cart) {
            echo "Cart id: " . $cart['id'] . ":<br>";
            foreach ($cart['products'] as $productInCart) {
                foreach ($products as $productInStore) {
                    if ($productInCart['productId'] === $productInStore['id']) {
                        echo "Id: " . $productInCart['productId'] . " Price: " . $productInStore['price'] . "$ Quantity: " . $productInCart['quantity'] . "<br>";
                        $cartSum += $productInStore['price'] * $productInCart['quantity'];
                    }
                }
            }
            echo "Total value of cart with id " . $cart['id'] . ": " . $cartSum . "$<br><br>";
            if (count($userCarts) > 1) {
                $totalSum += $cartSum;
            }
        }
        if ($totalSum !== 0) {
            echo "Total value of the " . count($userCarts) . " cart: " . $totalSum . "$";
        }
    } else {
        echo "User with id " . $_GET['id'] . " has no cart!";
    }
}

?>
