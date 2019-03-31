<?php

class connection {

    private $db;

    function __construct($hostname, $username, $password, $database) {
        $this->db = mysqli_connect($hostname, $username, $password, $database);

        if (mysqli_connect_errno()) {
            printf("Database connection error: %s\n", mysqli_connect_error());
            exit();
        } else {
            mysqli_set_charset($this->db, "utf8");
        }
    }

    function isUnique($entry, $table, $field) {
        $query = "SELECT * FROM " . $table . " WHERE " . $field . " = '" . $entry . "' LIMIT 1";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                return false;
            } else {
                return true;
            }
        } else {
            printf("DB QUERRY ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

    function registerUser($firstname, $lastname, $username, $email, $password) {
        $query = "INSERT INTO users (firstname, lastname, username, email, password) VALUES ('" . $firstname . "', '" . $lastname . "', '" . $username . "', '" . $email . "', '" . $password . "')";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            return true;
        } else {
            printf("DB INSERT ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

    function loginUser($username, $password) {
        $query = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "' LIMIT 1";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            printf("DB QUERRY ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

    function getUserId($username) {
        $query = "SELECT id FROM users WHERE username = '" . $username . "' LIMIT 1";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            if (mysqli_num_rows($res) != 0) {
                return $res->fetch_object()->id;
            } else {
                return false;
            }
        } else {
            printf("DB SELECT ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

    function getProducts() {
        $query = "SELECT * FROM products";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                $products = array();
                while ($product = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    array_push($products, $product);
                }
                return $products;
            } else {
                return false;
            }
        } else {
            printf("DB SELECT ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

    function getMaxPorductId() {
        $query = "SELECT MAX(id) AS id FROM products";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            if (mysqli_num_rows($res) != 0) {
                return $res->fetch_object()->id;
            } else {
                return false;
            }
        } else {
            printf("DB SELECT ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

    function insertOrder($user_id, $product_id, $quantity) {
        $query = "INSERT INTO orders (user, product, quantity) VALUES ('" . $user_id . "', '" . $product_id . "', '" . $quantity . "')";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            return true;
        } else {
            printf("DB INSERT ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

    function getOrders($user_id) {
        $query = "SELECT * FROM orders JOIN products ON products.id = orders.product WHERE orders.user = '" . $user_id . "'";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                $orders = array();
                while ($order = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    array_push($orders, $order);
                }
                return $orders;
            } else {
                return false;
            }
        } else {
            printf("DB SELECT ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

    function getOrderSum($user_id) {
        $query = "SELECT SUM(price * quantity) AS 'sum' FROM orders JOIN products ON products.id = orders.product WHERE orders.user = '" . $user_id . "'";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            return doubleval(mysqli_fetch_array($res, MYSQLI_ASSOC)["sum"]);
        } else {
            printf("DB SELECT ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

    function createDatabaseUser($username, $password, $hostname = "localhost") {
        $query = "CREATE USER '" . $username . "'@'" . $hostname . "' IDENTIFIED BY '" . $password . "'";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            return true;
        } else {
            printf("DB CREATE USER ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

    function grantDatabasePrivileges($username, $database, $hostname = "localhost") {
        $query = "GRANT ALL PRIVILEGES ON " . $database . ".* TO '" . $username . "'@'" . $hostname . "'";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            return true;
        } else {
            printf("DB GRANT PRIVILEGES ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

    function flushPrivileges() {
        $query = "FLUSH PRIVILEGES";
        $res = mysqli_query($this->db, $query);

        if ($res) {
            return true;
        } else {
            printf("DB FLUSH PRIVILEGES ERROR: %s\n", mysqli_error($this->db));
            exit();
        }
    }

}
