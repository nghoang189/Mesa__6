<?php
$routes = [
  '/' => [
    'controller' => 'HomeController',
    'action' => 'index'
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
  'edit-avatar' => [
    'controller' => 'AccountController',
    'action' => 'editAvatar'
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
  'checkout' => [
    'controller' => 'ProductController',
    'action' => 'checkOut'
  ],
  'view-product' => [
    'controller' => 'ProductController',
    'action' => 'viewProduct'
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
  'detail-prd' => [
    'controller' => 'ProductController',
    'action' => 'detailProduct'
  ],
  'order' => [
    'controller' => 'ProductController',
    'action' => 'createOrder'
  ],
  'manage-order' => [
    'controller' => 'AdminController',
    'action' => 'showOrderList'
  ],
  'order-detail' => [
    'controller' => 'AdminController',
    'action' => 'showOrderDetail'
  ],
  'your-order' => [
    'controller' => 'AdminController',
    'action' => 'showYourOrder'
  ],
];
