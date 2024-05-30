<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="homepage.css">
</head>

<body>
  <?php
  require_once 'connector.php';
  ?>

  <div class="container">
    <div class="menu">
      <div class="title">
        <img src="aset/warehouse.png" width="70px" height="70px">
        <h4>PT Amatoa Jaya Gemilang</h4>
      </div>
      <ul>

        <li class="menuicon">
          <a href="#" onclick="loadContent('users.php', 'content')">
            <img src="aset/user.png" alt="User Icon">
            Users
          </a>
        </li>
        <li class="menuicon">
          <a href="#" onclick="loadContent('categories.php', 'content')">
            <img src="aset/application.png" alt="Category Icon">
            Categories
          </a>
        </li>
        <li class="menuicon">
          <a href="#" onclick="loadContent('items.php', 'content')">
            <img src="aset/order.png">
            Items
          </a>
        </li>
        <li class="menuicon">
          <a href="#" onclick="loadContent('suppliers.php', 'content')">

            <img src="aset/supplier.png">
            Suppliers</a>
        </li>

        <li class="menuicon">
          <a href="#" onclick="loadContent('transactions.php', 'content')">
            <img src="aset/transaction.png">
            Transactions
          </a>
        </li>

        <li class="menuicon">
          <a href="#" onclick="loadContent('transaction_recap.php', 'content')">
            <img src="aset/recap.png">
            Transaction Recap
          </a>
        </li>

        <li class="menuicon">
          <a href="#" onclick="loadContent('notes.php', 'content')">
            <img src="aset/note.png">
            Notes
          </a>
        </li>

        <li class="menuicon">
          <a href="login.php" class="login-button">
            <img src="aset/account.png" alt="login">
            Login</a>

        </li>
        <li class="menuicon">
          <a href="#" onclick="logout()">
            <img src="aset/power.png" alt="Logout Icon">
            Logout
          </a>
        </li>
      </ul>

    </div>

    <div class="content" id="content">
      <div class="header">
        <div class="titleHeader">

          <h1>Welcome Back, John Doe </h1>
          <img src="aset/waving-hand.png">



        </div>



        <div class="WrapBox">
          <div aria-label="Orange and tan hamster running in a metal wheel" role="img" class="wheel-and-hamster">
            <div class="wheel"></div>
            <div class="hamster">
              <div class="hamster__body">
                <div class="hamster__head">
                  <div class="hamster__ear"></div>
                  <div class="hamster__eye"></div>
                  <div class="hamster__nose"></div>
                </div>
                <div class="hamster__limb hamster__limb--fr"></div>
                <div class="hamster__limb hamster__limb--fl"></div>
                <div class="hamster__limb hamster__limb--br"></div>
                <div class="hamster__limb hamster__limb--bl"></div>
                <div class="hamster__tail"></div>
              </div>
            </div>
            <div class="spoke"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function loadContent(url, targetId) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById(targetId).innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", url, true);
      xhttp.send();
    }

    function logout() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          window.location.href = "bye.php";
        }
      };
      xhttp.open("GET", "logout.php", true);
      xhttp.send();
    }
  </script>
</body>

</html>