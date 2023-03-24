<?php
$routes = [
  '/' => [
    'controller' => 'HomeController',
    'action' => 'index'
  ],
  'dang-ky' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'index'
  ],
  'danh-sach' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'showPhieuDangKy'
  ],
  'cap-nhat' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'suaphieu'
  ]
  ,
  'add' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'createPhieuDangKy'
  ],
  'delete' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'delete'
  ],
  'update' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'updatePhieuDangKy'
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
    'controller' => 'PhieuDangKyController',
    'action' => 'addCart'
  ],
  'view-cart' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'viewCart'
  ],
  'delete-cart-item' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'deleteCart'
  ],
  'empty-cart' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'deleteAllCart'
  ],
  'update-cart' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'updateCart'
  ],
  'delete-ajax' => [
    'controller' => 'PhieuDangKyController',
    'action' => 'deleteAjax'
  ]
];
?>
