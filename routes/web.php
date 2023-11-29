<?php


Auth::routes();
#Rutas de recuperacion de contraseña del usuario

Route::post('password','ResetPasswordController@postrecover');
Route::post('reset','ResetPasswordController@postReset');

Route::get('reset','ResetPasswordController@getReset');


Route::name('/')->get('/', 'TestController@welcome');

#Ruta para obtener los productos en la busqueda predictiva
Route::get('/products/json','SearchController@data');

#Ruta eliminar mensaje de buzon

Route::delete('/message/new/{mensaje}', 'MessageController@destroy');

#Ruta para enviar un mensage de consulta al admin
Route::post('/message/new','MessageController@store');
#Ruta registro nuevo usuario


Route::get('/usernew', 'usernewController@usernew')->name('usernew');
#Ruta consulta buzon mensajes

Route::get('admin/index', 'IndexController@index')->name('index');
Route::get('admin/index/excel', 'IndexController@exportbuzon');

#Ruta consulta compras
Route::get('admin/ventas/excel', 'VentasController@exportcompras');

Route::get('admin/ventas', 'VentasController@ventas')->name('venta');

#Ruta consulta compras
Route::get('/paypal/pay', 'PaymentController@payWithPayPal');
Route::get('/paypal/status', 'PaymentController@payPalStatus');
// route for check status of the payment
Route::get('/home', 'PaymentController@index');


# Actualizar Productos
Route::get('/users/{id}/edit', 'UserController@edit');
Route::post('/users{id}/edit', 'UserController@update');

Route::get('admin/usuarios/create', 'UserController@index');
Route::post('user', 'UserController@store');


Route::get('admin/usuarios', 'UserController@users');
Route::delete('user{id}', 'UserController@destroy');
Route::get('admin/usuarios/excel', 'UserController@exportexcel');
Route::get('/excel', 'UserController@exportexce');

Route::get('/home', 'HomeController@index')->name('home');
#Ruta para todos los productos
Route::get('/products','ProductController@index');
# Ruta para un producto
Route::get('/products/{id}','ProductController@show');
Route::get('admin/products/excel', 'ProductController@exportproduct');

#Ruta para mostrar todas las categorias de productos
Route::get('/nosotros','CategoryController@index');
#Ruta para mostrar una categoria
Route::get('/categories/{category}','CategoryController@show');
#Ruta para hacer una busqueda
Route::get('/searchmensajes','SearchController@showbuzon');

Route::get('/search','SearchController@show');
Route::get('/searchuser','SearchController@showuser');

#Ruta para agregar un elemento al carrito
Route::post('/cart','CartDetailController@store');
#Ruta para eliminar un elemento al carrito
Route::delete('/cart','CartDetailController@destroy');
# Ruta para convertir el carrito en un pedido
Route::post('/order','CartController@update');
#Ruta para eliminar un pedido
Route::delete('/order','CartController@destroy');
Route::delete('/order{ventas}','CartController@destroy2');

#Ruta para cambiar el status de un pedido
Route::post('/order/status','CartController@updateStatus');

#envia correos a el usuario meidante funcion store con metodo post al controlador correo
Route::name('store/')->post('store/', 'CorreoController@store');


// Definiendo un grupo de rutas para usuarios administradores
Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){

  Route::get('/products', 'ProductController@index');           // Listado de productos, devuelve un listado
  # Crear Productos
  Route::get('/products/create', 'ProductController@create');  // Creacion de nuevos productos, devueeve un form
  Route::post('/products', 'ProductController@store');         // Registra los datos
  # Actualizar Productos
  Route::get('/products/{id}/edit', 'ProductController@edit');
  Route::post('/products{id}/edit', 'ProductController@update');
  #Eliminar Productos
  Route::delete('/products/{id}', 'ProductController@destroy');


  #Imagenes
  Route::get('/products/{id}/images', 'ImageController@index');
  Route::post('/products/{id}/images', 'ImageController@store');
  Route::delete('/products/{id}/images', 'ImageController@destroy');
  # Permite destacar una imagen
  Route::get('/products/{id}/images/select/{image}', 'ImageController@select');

  /* ADMINSITRACION DE CATEGORIAS */

  # Listar categorias

  Route::get('/categories', 'CategoryController@index');           // Listado de productos, devuelve un listado
  # Crear y registrar
  Route::get('/categories/create', 'CategoryController@create');  // Creacion de nuevos productos, devueeve un form
  Route::post('/categories', 'CategoryController@store');         // Registra los datos

  # Actualizar y editar
  Route::get('/categories/{category}/edit', 'CategoryController@edit');
  Route::post('/categories/{category}/edit', 'CategoryController@update');
  #Eliminar
  Route::delete('/categories/{category}', 'CategoryController@destroy');



});
