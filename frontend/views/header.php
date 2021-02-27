<?php
include_once __DIR__ . "/../../common/src/Service/UserService.php";

$currentUser = (new UserService)->getCurrentUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/shop/frontend/css/styles.css">
    <link rel="stylesheet" href="/shop/frontend/css/shop-style.css">
</head>

<body>
<header>
    <div id="head">
        <div class="top">
            <div class="width1024">
                <ul class="desktop-element">
                    <li><?= !empty($currentUser['login']) ?
                            '<span style="color: #fff"> Hello, ' . (new UserService)->getCurrentUser()['login'] . '!</span>' :
                            '<a href="/shop/frontend/index.php?model=register&action=form">Register</a>' ?></li>
                    <li><?= !empty($currentUser['login']) ?
                            '<a href="/shop/frontend/index.php?model=auth&action=logout">Sign out</a>' :
                            '<a href="/shop/frontend/index.php?model=site&action=login">Sign in</a>' ?>
                    </li>
                    <?= !empty($currentUser['login']) ?
                        '<li><a href="/shop/frontend/index.php?model=basket&action=view">Basket</a></li>' : ''
                    ?>
                    <li><a href="">Help</a></li>
                </ul>
            </div>
            <div id="mobile-logo" class="mobile-element">BOOKS</div>
            <select id="top-link" onchange="document.location=this.value" class="mobile-element form-control">
                <option disabled selected></option>
                <option value="/shop/frontend/index.php?model=register&action=form">Register</option>
                <option value="/shop/frontend/index.php?model=site&action=login">Sign in</option>
                <option value="#order">Order Status</option>
                <option value="#help">Help</option>
            </select>
        </div>
        <div class="header-panel">
            <div class="width1024 flex">
                <div id="logo">
                    <a href="/shop/frontend/index.php?model=product&action=all"><img src="/shop/frontend/imgs/logo.png"
                                                                                     alt=""></a>
                </div>
                <div class="search-field">
                    <form action="#">
                        <input type="text" name="search_text"/>
                        <button>Search</button>
                    </form>
                </div>
                <div id="basket-container">
                    <div>Your card <span>(2 items)</span></div>
                    <div><b>$125.0</b><a href="#">Checkout</a></div>
                </div>
                <div id="favor">
                    <div>Wish list</div>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <ul class="width1024 desktop-element">
            <li><a href="">Computers</a></li>
            <li><a href="">Cooking</a></li>
            <li><a href="">Education</a></li>
            <li><a href="">Fiction</a></li>
            <li class="active"><a href="">Health</a></li>
            <li><a href="">Mathematics</a></li>
            <li><a href="">Medical</a></li>
            <li><a href="">Reference</a></li>
            <li><a href="">Science</a></li>
        </ul>

        <select onchange="document.location=this.value" class="mobile-element">
            <option disabled selected></option>
            <option value="#Computers">Computers</option>
            <option value="#Cooking">Cooking</option>
            <option value="#Education">Education</option>
            <option value="#Fiction">Fiction</option>
            <option value="#Health">Health</option>
            <option value="#Mathematics">Mathematics</option>
            <option value="#Medical">Medical</option>
            <option value="#Reference">Reference</option>
            <option value="#Science">Science</option>
        </select>
    </nav>
</header>
<div class="body">
