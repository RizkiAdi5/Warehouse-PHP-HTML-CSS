<?php
class DBConnection
{
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO(
            "mysql:host=localhost;dbname=warehouse",
            "root",
            ""
        );
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    // select all items
    public function getAllItems()
    {
        $sql = "SELECT * FROM items";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result;
    }

    // join tables to get all transactions
    public function getAllTransactions()
    {
        $sql = "SELECT transactions.*, items.item_name, suppliers.supplier_name, users.user_name 
                FROM transactions 
                LEFT JOIN items ON transactions.item_id = items.item_id 
                LEFT JOIN suppliers ON transactions.supplier_id = suppliers.supplier_id 
                LEFT JOIN users ON transactions.user_id = users.user_id";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result;
    }

    // select all suppliers
    public function getAllSuppliers()
    {
        $sql = "SELECT * FROM suppliers";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result;
    }

    // select all users
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result;
    }

    // select all categories
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result;
    }

    // add transaction
    public function addTransaction($item_id, $supplier_id, $user_id, $quantity, $transaction_date)
    {
        $sql = "INSERT INTO transactions (item_id, supplier_id, user_id, quantity, transaction_date) 
                VALUES (:item_id, :supplier_id, :user_id, :quantity, :transaction_date)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':item_id', $item_id);
        $stmt->bindParam(':supplier_id', $supplier_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':transaction_date', $transaction_date);
        return $stmt->execute();
    }

    // add category
    public function addCategory($category_name)
    {
        $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':category_name', $category_name);
        return $stmt->execute();
    }

    // add item
    public function addItem($item_name, $description, $price, $stock_quantity, $category_id, $location_id)
    {
        $sql = "INSERT INTO items (item_name, description, price, stock_quantity, category_id, location_id) 
                VALUES (:item_name, :description, :price, :stock_quantity, :category_id, :location_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':item_name', $item_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock_quantity', $stock_quantity);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':location_id', $location_id);
        return $stmt->execute();
    }

    // add supplier
    public function addSupplier($supplier_name, $supplier_contact, $supplier_address)
    {
        $sql = "INSERT INTO suppliers (supplier_name, supplier_contact, supplier_address) 
                VALUES (:supplier_name, :supplier_contact, :supplier_address)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':supplier_name', $supplier_name);
        $stmt->bindParam(':supplier_contact', $supplier_contact);
        $stmt->bindParam(':supplier_address', $supplier_address);
        return $stmt->execute();
    }

    // get supplier 
    public function getSupplierById($supplier_id)
    {
        try {
            $sql = "SELECT * FROM suppliers WHERE supplier_id = :supplier_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':supplier_id', $supplier_id);
            $stmt->execute();
            $supplier = $stmt->fetch(PDO::FETCH_ASSOC);
            return $supplier;
        } catch (PDOException $e) {
            // Handle exceptions
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    // add user
    public function addUser($user_name, $email, $password, $role)
    {
        $sql = "INSERT INTO users (user_name, email, password, role) 
                VALUES (:user_name, :email, :password, :role)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        return $stmt->execute();
    }

    // delete user
    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM users WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // update user
    public function updateUser($user_id, $user_name, $email, $password, $role)
    {
        $sql = "UPDATE users 
                SET user_name = :user_name, email = :email, password = :password, role = :role
                WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        return $stmt->execute();
    }

    // get user by ID
    public function getUserById($user_id)
    {
        $sql = "SELECT * FROM users WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // update item
    public function updateItem($item_id, $item_name, $description, $price, $stock_quantity, $category_id)
    {
        $sql = "UPDATE items
                SET item_name = :item_name, description = :description, price = :price, stock_quantity = :stock_quantity, category_id = :category_id 
                WHERE item_id = :item_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':item_id', $item_id);
        $stmt->bindParam(':item_name', $item_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock_quantity', $stock_quantity);
        $stmt->bindParam(':category_id', $category_id);
        return $stmt->execute();
    }

    // get item by ID
    public function getItemById($item_id)
    {
        try {
            $sql = "SELECT * FROM items WHERE item_id = :item_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':item_id', $item_id);
            $stmt->execute();
            $item = $stmt->fetch(PDO::FETCH_ASSOC);
            return $item;
        } catch (PDOException $e) {
            // Handle exceptions
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // delete item
    public function deleteItem($item_id)
    {
        // Delete related records from the transactions table
        $sql_delete_transactions = "DELETE FROM transactions WHERE item_id = :item_id";
        $stmt_delete_transactions = $this->conn->prepare($sql_delete_transactions);
        $stmt_delete_transactions->bindParam(':item_id', $item_id, PDO::PARAM_INT);
        $stmt_delete_transactions->execute();
    
        // Now delete the item from the items table
        $sql_delete_item = "DELETE FROM items WHERE item_id = :item_id";
        $stmt_delete_item = $this->conn->prepare($sql_delete_item);
        $stmt_delete_item->bindParam(':item_id', $item_id, PDO::PARAM_INT);
        $stmt_delete_item->execute();
    }
    

    // update supplier
    public function updateSupplier($supplier_id, $supplier_name, $supplier_contact, $supplier_address)
    {
        $sql = "UPDATE suppliers 
                SET supplier_name = :supplier_name, supplier_contact = :supplier_contact, supplier_address = :supplier_address 
                WHERE supplier_id = :supplier_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':supplier_id', $supplier_id);
        $stmt->bindParam(':supplier_name', $supplier_name);
        $stmt->bindParam(':supplier_contact', $supplier_contact);
        $stmt->bindParam(':supplier_address', $supplier_address);
        return $stmt->execute();
    }

    // delete supplier
    public function deleteSupplier($supplier_id)
    {
        $sql = "DELETE FROM suppliers WHERE supplier_id = :supplier_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':supplier_id', $supplier_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // delete transaction
    public function deleteTransaction($transaction_id)
    {
        $sql = "DELETE FROM transactions WHERE transaction_id = :transaction_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':transaction_id', $transaction_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // update transactionpublic 
    public function updateTransaction($transaction_id, $item_id, $supplier_id, $user_id, $quantity, $transaction_date)
    {
        $sql = "UPDATE transactions 
                SET item_id = :item_id, supplier_id = :supplier_id, user_id = :user_id, quantity = :quantity, transaction_date = :transaction_date 
                WHERE transaction_id = :transaction_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
        $stmt->bindParam(':supplier_id', $supplier_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':transaction_date', $transaction_date);
        $stmt->bindParam(':transaction_id', $transaction_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    


    // get transaction by ID
    // get transaction by ID
    public function getTransactionById($transaction_id)
    {
        try {
            $sql = "SELECT * FROM transactions WHERE transaction_id = :transaction_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':transaction_id', $transaction_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    // get all transactions with details using inner join
    public function getAllTransactionsWithDetails()
    {
        try {
            $sql = "SELECT 
                        transactions.transaction_id, 
                        items.item_name, 
                        suppliers.supplier_name, 
                        users.user_name, 
                        transactions.quantity, 
                        transactions.transaction_date
                    FROM 
                        transactions
                    INNER JOIN 
                        items ON transactions.item_id = items.item_id
                    INNER JOIN 
                        suppliers ON transactions.supplier_id = suppliers.supplier_id
                    INNER JOIN 
                        users ON transactions.user_id = users.user_id";

            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // login method
    public function getUserByEmailAndPassword($email, $password)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
