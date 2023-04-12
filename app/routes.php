<?php
$routes = [
  '/' => [
    'controller' => 'HomeController',
    'action' => 'index'
  ],
  'register' => [
    'controller' => 'AccountController',
    'action' => 'register'
  ],
  'login' => [
    'controller' => 'AccountController',
    'action' => 'login'
  ],
  'logout' => [
    'controller' => 'AccountController',
    'action' => 'logout'
  ],
  'user-info' => [
    'controller' => 'AccountController',
    'action' => 'showUserInfo'
  ],
  'edit-user-info' => [
    'controller' => 'AccountController',
    'action' => 'editUserInfo'
  ],
  'update-user-info' => [
    'controller' => 'AccountController',
    'action' => 'updateUserInfo'
  ],
  'add-product' => [
    'controller' => 'ProductController',
    'action' => 'addProduct'
  ],
  'shop' => [
    'controller' => 'ProductController',
    'action' => 'showProduct'
  ],
  'edit-prd' => [
    'controller' => 'ProductController',
    'action' => 'editProduct'
  ],
  'add' => [
    'controller' => 'ProductController',
    'action' => 'createProduct'
  ],
  'delete-prd' => [
    'controller' => 'ProductController',
    'action' => 'deleteProduct'
  ],
  'update-prd' => [
    'controller' => 'ProductController',
    'action' => 'updateProduct'
  ],
  'add-cart' => [
    'controller' => 'ProductController',
    'action' => 'addCart'
  ],
  'view-cart' => [
    'controller' => 'ProductController',
    'action' => 'viewCart'
  ],
  'delete-cart-item' => [
    'controller' => 'ProductController',
    'action' => 'deleteCart'
  ],
  'empty-cart' => [
    'controller' => 'ProductController',
    'action' => 'deleteAllCart'
  ],
  'update-cart' => [
    'controller' => 'ProductController',
    'action' => 'updateCart'
  ],
  'delete-ajax' => [
    'controller' => 'ProductController',
    'action' => 'deleteAjax'
  ],
  'view-product' => [
    'controller' => 'ProductController',
    'action' => 'viewProduct'
  ],
  'detail-prd' => [
    'controller' => 'ProductController',
    'action' => 'detailProduct'
  ],
  'sort-category' => [
    'controller' => 'ProductController',
    'action' => 'sortCategory'
  ],
  'search-prd' => [
    'controller' => 'ProductController',
    'action' => 'searchProduct'
  ],
  'review' => [
    'controller' => 'ProductController',
    'action' => 'reviewProduct'
  ],
  'admin' => [
    'controller' => 'AdminController',
    'action' => 'index'
  ],
  'manage-prd' => [
    'controller' => 'AdminController',
    'action' => 'manageProduct'
  ],
  'manage-user' => [
    'controller' => 'AdminController',
    'action' => 'showUserList'
  ],
  'delete-user' => [
    'controller' => 'AdminController',
    'action' => 'deleteUser'
  ],
  'edit-user' => [
    'controller' => 'AdminController',
    'action' => 'editUser'
  ],
  'update-user' => [
    'controller' => 'AdminController',
    'action' => 'updateUser'
  ],
  'manage-order' => [
    'controller' => 'AdminController',
    'action' => 'showOrderList'
  ],
  'order-detail' => [
    'controller' => 'AdminController',
    'action' => 'showOrderDetail'
  ],
  'add-user' => [
    'controller' => 'AdminController',
    'action' => 'addUser'
  ],
  'order' => [
    'controller' => 'OrderController',
    'action' => 'createOrder'
  ],
  'checkout' => [
    'controller' => 'OrderController',
    'action' => 'checkOut'
  ],
  'your-order' => [
    'controller' => 'OrderController',
    'action' => 'showYourOrder'
  ],
];
