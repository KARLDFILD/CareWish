<div class="container">
    <div class="header">
        <?php
        session_start();
        if (isset($_SESSION['email'])) {
            echo '<style> .header-nav_join {display: none;} </style>';
            echo '<style> .header-nav_logout {display: flex;justify-content: space-between;
                align-items: center;} </style>';
        }
        ?>

        <div class="header-logo">
            <a class="header-logo_name" href="./index.php">CareWish</a>
        </div>

        <ul class="header-nav_list">
            <li class="header-nav_item"><a href="./news.php">News</a></li>
            <li class="header-nav_item header-nav_dropdown">
                <a href="#" class="header-nav_dropdown_link">Store</a>
                <ul class="header-nav_dropdown_content">
                    <li><a href="./yeycosmetics.php">Косметика для глаз</a></li>
                    <li><a href="./lipscosmetics.php">Косметика для губ</a></li>
                    <li><a href="./facecosmetics.php">Косметика для лица</a></li>
                    <li><a href="./bodycosmetics.php">Косметика для тела</a></li>
                </ul>
            </li>

            <?php
            if (isset($_SESSION['email'])) {
                echo '<li class="header-nav_item"><a href="./cart.php">My Basket</a></li>';
            }
            ?>

            <li class="header-nav_item"><a href="./contacts.php">Contacts</a></li>
        </ul>
        <?php
            session_start();    
            if (isset($_SESSION['email'])) {
                echo '<style> .header-nav_join {display: none;} </style>';
                echo '<style> .header-nav_logout {display: flex;justify-content: space-between;align-items: center;} </style>';
                if ($_SESSION['role'] === 'admin') {
                    echo '<li class="header-nav_admin"><a href="./admin_panel.php">Admin Panel</a></li>';
                }
            }
        ?>

        <ul class="header-nav_join">
            <li class="header-nav_login"><button onclick="openPopupLogin()" class="header-login_btn">Login</button></li>
            <li class="header-nav_login"><button onclick="openPopupReg()" class="header-login_btn">Sign Up</button></li>
        </ul>

        <!--------------- LOGOUT ----------->

        <div class="header-nav_logout">
            <div class="header-logout_btn">
                <a class="header-logout_btn" href="logout.php">Logout</a>
            </div>

            <div class="header-logout_avatar">
                <img src="./img/account_circle_FILL0_wght400_GRAD0_opsz48.svg" alt="">
            </div>
        </div>

    </div>
</div>

<!-------------- LOGIN -------------->

<div class="popupLogin" id="popupLogin">
    <form method="post" action="login.php">
        <h2>Login</h2>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" required>

        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass" required>

        <div class="btn">
            <button type="submit">Login</button>
            <button onclick="openPopupReg()" type="submit">Sign Up</button>
        </div>
    </form>
</div>

<!--------------- SIGN UP -------------->

<div class="popupReg">
    <form method="post" action="signUp.php">
        <h2>Sign Up</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <label for="pass">Password:</label>
        <input type="password" id="password" name="pass" required>
        <button type="submit">Sign Up</button>
    </form>
</div>