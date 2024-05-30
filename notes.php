<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Noted</h1>

    <table>
        <th colspan="6">Noted for input the data</th>




        <tr>
            <td>Item</td>
            <td>Make sure that when entering data into the Goods table, each item has a value for each required column (item_name, description, price, quantity_stock, category_id, and location_id).
            </td>
            <td>The category ID and location ID must be valid and match the data in the Category and Location tables.</td>

        </tr>
        <tr>
            <td>Category</td>
            <td colspan="2">Make sure that when entering data into the Categories table, each category has a value for the name_category column.</td>

        </tr>
        <tr>
            <td>Location</td>
            <td colspan="2">Make sure that when inserting data into the Location table, each location has a value for the location_name column.</td>

        </tr>
        <tr>
            <td>Suppliers</td>
            <td colspan="2"> Make sure that when inserting data into the Supplier table, each supplier has a value for each required column (supplier_name, supplier_contact, and supplier_address). </td>
        </tr>
        <tr>
            <td>Transaction</td>
            <td>Make sure when entering data into the Transaction table, each transaction has a value for each required column (item_id, supplier_id, user_id, item_amount, and transaction_date).

            </td>
            <td>The item ID, supplier ID, and user ID entered must be valid and match the data in the Item, Supplier, and User tables.</td>

        </tr>
        <tr>
            <td>User</td>
            <td>Make sure when entering data into the Users table, each user has a value for each required column (username, email, password, and role).</td>
            <td>Check that the user role is 'admin' or 'regular user'.</td>

        </tr>

    </table>
</body>

</html>