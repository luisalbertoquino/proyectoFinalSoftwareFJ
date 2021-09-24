<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BussinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\contactoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DateRangeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\licenciaController;
use App\Http\Controllers\MetricController;
use App\Http\Controllers\OptionPaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\attachedController;
use App\Http\Controllers\balanceController;
use App\Http\Controllers\bitacoraController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\detalleController;
use App\Http\Controllers\futuroController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\permissionsController;
use App\Http\Controllers\summaryController;
use App\Http\Controllers\totalController;
use App\Http\Controllers\toursController;
use App\Http\Controllers\transferController;

use App\contacto;
use App\User;
//use Datetime;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





/////////


Route::get('/login', function () {
    return view('auth/login');
});




// de aqui en adelante necesita un login
Auth::routes();


Route::get('/', [HomeController ::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*Route::get('/home', function () {
    return view('home');
});*/

Route::get('/home', [HomeController ::class, 'index']);
Route::get('/test1', function () {return 'just a test';});


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::get('/about', function () {
    return view('about');
});

$configu= contacto::find(1);
$cont=1;
if($configu==null){
    while ($cont<=10) {
        $cont=$cont+1;
        $configu= contacto::find($cont);
        if($configu!=null){
            $cont=1001;
        }
    }
}
//dd($configu);
//dd($configu->fechaFinal);
if($configu!=null){
    $date1 = new \DateTime();
    $date2 = new \DateTime("$configu->fechaFinal");
    
    if($date1 <= $date2){
        $tiempo=1;
        }else{
        $tiempo=0;
        }
}else{
    $tiempo=1;
}
    //dd(Auth::user());
    //$user = User::find(1);
    //Auth::login();
    //dd(['middleware' => 'permiso:administrador-main']);
    //$result=['middleware' => 'permiso:administrador-main'];
    //dd($tiempo);

    
    //gente con licencia
    if($tiempo!=0){
        //Usuarios
        Route::get('/user',[UserController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user3',[UserController::class, 'index3'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user4',[UserController::class, 'index4'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user/create', [UserController::class, 'create'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user/{user}', [UserController::class, 'show'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::get('/user2', [UserController::class, 'show2'])->middleware('permiso:administrador-main,administrador,usuarios');  
        Route::post('/user', [UserController::class, 'store'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user/{user}/edit', [UserController::class, 'edit'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user/{user}/edit2', [UserController::class, 'edit2'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::patch('/user/{piola}', [UserController::class, 'update'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::patch('/user2/{piola}', [UserController::class, 'update2'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::patch('/user3/{piola}', [UserController::class, 'update3'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::patch('/user/estado/{user}', [UserController::class, 'estado'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,usuarios'); 

        
        //categorias 
        //Route::resource('/product','ProductController');->middleware('can:isAdmin');;   //forma rapida
        Route::get('/category',[CategoryController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos');               
        Route::get('/category/create',[CategoryController::class, 'create'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/category/{categoria}',[CategoryController::class, 'show'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/category2',[CategoryController::class, 'show2'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::post('/category',[CategoryController::class, 'store'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/category/{categoria}/edit',[CategoryController::class, 'edit'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/category/{categoria}',[CategoryController::class, 'update'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/category/estado/{categoria}',[CategoryController::class, 'estado'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::delete('/category/{categoria}',[CategoryController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,productos'); 
        
        //Productos 
        //Route::resource('/product','ProductController');->middleware('can:isAdmin');;   //forma rapida
        Route::get('/product', [ProductController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/product/create', [ProductController::class, 'create'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/product/{productos}', [ProductController::class, 'show'])->middleware('permiso:administrador-main,administrador,productos');
        Route::get('/product2', [ProductController::class, 'show2'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::post('/product', [ProductController::class, 'store'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/product/{productos}/edit', [ProductController::class, 'edit'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/product/{producto}', [ProductController::class, 'update'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/product/estado/{productos}',[ProductController::class, 'estado'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::delete('/product/{producto}',[ProductController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,productos'); 


        //Metricas 
        Route::get('/metric', [MetricController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/metric/create', [MetricController::class, 'create'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/metric/{metrica}', [MetricController::class, 'show'])->middleware('permiso:administrador-main,administrador,productos');
        Route::get('/metric2', [MetricController::class, 'show2'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::post('/metric', [MetricController::class, 'store'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/metric/{metrica}/edit', [MetricController::class, 'edit'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/metric/{metrica}', [MetricController::class, 'update'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/metric/estado/{metrica}', [MetricController::class, 'estado'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::delete('/metric/{metrica}', [MetricController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,productos');

        //Opciones de pago registradas 
        Route::get('/op',[OptionPaymentController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::get('/op/create', [OptionPaymentController::class, 'create'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::get('/op/{opcionDePago}',[OptionPaymentController::class, 'show'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::get('/op2', [OptionPaymentController::class, 'show2'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::post('/op', [OptionPaymentController::class, 'store'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::get('/op/{opcionDePago}/edit',[OptionPaymentController::class, 'edit'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::patch('/op/{opcionDePago}', [OptionPaymentController::class, 'update'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::patch('/op/estado/{opcionDePago}',[OptionPaymentController::class, 'estado'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::delete('/op/{opcionDePago}',[OptionPaymentController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,sistema');



        //Ventas
        Route::get('/sale',[SaleController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale/create',[SaleController::class, 'create'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale/{venta}',[SaleController::class, 'show'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale2/{venta}',[SaleController::class, 'show2'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale3', [SaleController::class, 'show3'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale4/{venta}',[SaleController::class, 'show4'])->middleware('permiso:administrador-main,administrador,ventas');    
        Route::post('/sale',[SaleController::class, 'store'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale/{venta}/edit', [SaleController::class, 'edit'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::patch('/sale/{venta}',[SaleController::class, 'update'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::patch('/sale/estado/{venta}',[SaleController::class, 'estado'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::delete('/sale/{venta}',[SaleController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,ventas');
        
        
        //Compras
        Route::get('/shopping',[ShoppingController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/shopping/create',[ShoppingController::class, 'create'])->middleware('permiso:administrador-main,administrador,compras');
        Route::get('/shopping/create',[ShoppingController::class, 'create'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/shopping/{compra}',[ShoppingController::class, 'show'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/shopping2/{compra}',[ShoppingController::class, 'show2'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/shopping3', [ShoppingController::class, 'show3'])->middleware('permiso:administrador-main,administrador,compras');
        Route::get('/shopping4/{compra}',[ShoppingController::class, 'show4'])->middleware('permiso:administrador-main,administrador,compras');//print
        Route::post('/shopping',[ShoppingController::class, 'store'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/shopping/{compra}/edit',[ShoppingController::class, 'edit'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::patch('/shopping/{compra}',[ShoppingController::class, 'update'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::patch('/shopping/estado/{compra}',[ShoppingController::class, 'estado'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::delete('/shopping/{compra}',[ShoppingController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,compras'); 

        //Clientes
        Route::get('/client',[ClientController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::get('/client/create',[ClientController::class, 'create'])->middleware('permiso:administrador-main,administrador,clientes');
        Route::get('/client/create2',[ClientController::class, 'create2'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::get('/client/{cliente}',[ClientController::class, 'show'])->middleware('permiso:administrador-main,administrador,clientes');
        Route::get('/client2',[ClientController::class, 'show2'])->middleware('permiso:administrador-main,administrador,clientes');  
        Route::post('/client',[ClientController::class, 'store'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::post('/client2',[ClientController::class, 'store2'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::get('/client/{cliente}/edit',[ClientController::class, 'edit'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::patch('/client/{cliente}',[ClientController::class, 'update'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::patch('/client/estado/{cliente}',[ClientController::class, 'estado'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::delete('/client/{cliente}',[ClientController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,clientes'); 

        //documento
        Route::get('/document', [DocumentController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::get('/document/create',[DocumentController::class, 'create'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::get('/document/{documento}',[DocumentController::class, 'show'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::post('/document',[DocumentController::class, 'store'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::get('/document/{documento}/edit',[DocumentController::class, 'edit'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::patch('/document/{documento}',[DocumentController::class, 'update'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::patch('/document/estado/{documento}',[DocumentController::class, 'estado'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::delete('/document/{documento}',[DocumentController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,sistema'); 


        //proveedor
        Route::get('/provider', [ProviderController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/provider/create',[ProviderController::class, 'create'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/provider/create2',[ProviderController::class, 'create2'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/provider/{proveedor}',[ProviderController::class, 'show'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/provider2',[ProviderController::class, 'show2'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::post('/provider',[ProviderController::class, 'store'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::post('/provider2',[ProviderController::class, 'store2'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/provider/{proveedor}/edit',[ProviderController::class, 'edit'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::patch('/provider/{proveedor}',[ProviderController::class, 'update'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::patch('/provider/estado/{proveedor}',[ProviderController::class, 'estado'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::delete('/provider/{proveedor}',[ProviderController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,compras'); 

        //reportes
        Route::get('/ReporteProductoMas', [ReportesController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::get('/ReporteVenta', [ReportesController::class, 'index2'])->middleware('permiso:administrador-main,administrador,informes');
        Route::get('/ReporteProductoMenos', [ReportesController::class, 'index3'])->middleware('permiso:administrador-main,administrador,informes');
        Route::get('/ReporteCompra', [ReportesController::class, 'index4'])->middleware('permiso:administrador-main,administrador,informes');
        Route::get('/ReporteCliente', [ReportesController::class, 'index5'])->middleware('permiso:administrador-main,administrador,informes');
        Route::get('/ReporteProveedor', [ReportesController::class, 'index6'])->middleware('permiso:administrador-main,administrador,informes');

        //prueba datapick                
        Route::get('/Reportes/create', [ReportesController::class, 'create'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::get('/Reportes/{proveedor}',[ReportesController::class, 'show'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::post('/Reportes',[ReportesController::class, 'store'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::get('/Reportes/{proveedor}/edit',[ReportesController::class, 'edit'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::patch('/Reportes/{proveedor}',[ReportesController::class, 'update'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::patch('/Reportes/estado/{proveedor}',[ReportesController::class, 'estado'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::delete('/Reportes/{proveedor}',[ReportesController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,informes'); 

        //config
        Route::get('/Bussiness', [BussinessController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::get('/Bussiness2', [BussinessController::class, 'index2'])->middleware('permiso:administrador-main,administrador,sistema');                 
        Route::get('/Bussiness/create',[BussinessController::class, 'create'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::get('/Bussiness2/create',[BussinessController::class, 'create2'])->middleware('permiso:administrador-main,administrador,sistema');  
        Route::get('/Bussiness/{config}',[BussinessController::class, 'show'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::post('/Bussiness',[BussinessController::class, 'store'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::post('/Bussiness2',[BussinessController::class, 'store2'])->middleware('permiso:administrador-main,administrador,sistema');  
        Route::get('/Bussiness/{config}/edit',[BussinessController::class, 'edit'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::get('/Bussiness2/{config}/edit',[BussinessController::class, 'edit2'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::patch('/Bussiness/{config}',[BussinessController::class, 'update'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::patch('/Bussiness2/{config}',[BussinessController::class, 'update2'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::patch('/Bussiness/estado/{config}',[BussinessController::class, 'estado'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::delete('/Bussiness/{config}',[BussinessController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,sistema'); 


        //roles
        Route::get('/roles',[RolesController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');           
        Route::get('/roles/create',[RolesController::class, 'create'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::get('/roles/{rol}',[RolesController::class, 'show'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::get('/roles2',[RolesController::class, 'show2'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::post('/roles',[RolesController::class, 'store'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::get('/roles/{rol}/edit',[RolesController::class, 'edit'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::patch('/roles/{rol}',[RolesController::class, 'update'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::patch('/roles/estado/{rol}',[RolesController::class, 'estado'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::delete('/roles/{rol}',[RolesController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,usuarios');

        //contacto
        Route::get('/contacto', [contactoController::class, 'index']); 
        Route::get('/contactoFJ',[contactoController::class, 'index2'])->middleware('permiso:administrador-main');          
        Route::get('/contacto/create',[contactoController::class, 'create'])->middleware('permiso:administrador-main');
        Route::get('/contacto/{contacto}',[contactoController::class, 'show'])->middleware('permiso:administrador-main');
        Route::get('/contacto2',[contactoController::class, 'show2'])->middleware('permiso:administrador-main');
        Route::post('/contacto',[contactoController::class, 'store'])->middleware('permiso:administrador-main');
        Route::get('/contacto/{contacto}/edit',[contactoController::class, 'edit'])->middleware('permiso:administrador-main');
        Route::patch('/contacto/{contacto}',[contactoController::class, 'update'])->middleware('permiso:administrador-main');
        Route::patch('/contacto/estado/{contacto}',[contactoController::class, 'estado'])->middleware('permiso:administrador-main');
        Route::delete('/contacto/{contacto}',[contactoController::class, 'destroy'])->middleware('permiso:administrador-main');

        //licencia
        Route::get('/licencia',[licenciaController::class, 'index'])->middleware('permiso:administrador-main');   
        Route::get('/licenciaFJ',[licenciaController::class, 'index2'])->middleware('permiso:administrador-main');         
        Route::get('/licencia/create',[licenciaController::class, 'create'])->middleware('permiso:administrador-main');
        Route::get('/licencia/{licencia}',[licenciaController::class, 'show'])->middleware('permiso:administrador-main');
        Route::get('/licencia2',[licenciaController::class, 'show2'])->middleware('permiso:administrador-main');
        Route::post('/licencia',[licenciaController::class, 'store'])->middleware('permiso:administrador-main');
        Route::get('/licencia/{licencia}/edit',[licenciaController::class, 'edit'])->middleware('permiso:administrador-main');
        Route::patch('/licencia/{licencia}',[licenciaController::class, 'update'])->middleware('permiso:administrador-main');
        Route::patch('/licencia/estado/{licencia}',[licenciaController::class, 'estado'])->middleware('permiso:administrador-main');
        Route::delete('/licencia/{licencia}',[licenciaController::class, 'destroy'])->middleware('permiso:administrador-main');




        Route::get('/clear-cache', function() {
            Artisan::call('cache:clear');
            return "Cache is cleared";
            }); 

            
        Route::get('/daterange', [DateRangeController::class, 'index'])->middleware('permiso:administrador-main');
        Route::post('/daterange/fetch_data',[DateRangeController::class, 'fetch_data'])->middleware('permiso:administrador-main');



        //modulo de contabilidad
        ///////////////////////////////
            ///////// account ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////													  
                                                                                //							
            //listar account                                                   	/
            Route::get('account/account',[accountController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //agregar account
            Route::get('account/create', function ()    {
                return view('Accounting.account.create');
            })->middleware('permiso:administrador-main,administrador,contabilidad');
            //pa ventas si se necesita un registro rapido
            Route::get('account/create2', function ()    {
                return view('Accounting.account.create2');
            })->middleware('permiso:administrador-main,administrador,contabilidad');
            //pa comrpas
            Route::get('account/create3', function ()    {
                return view('Accounting.account.create3');
            })->middleware('permiso:administrador-main,administrador,contabilidad');
            

            Route::post('account/save',[accountController::class, 'save'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('account/save2',[accountController::class, 'save2'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('account/save3',[accountController::class, 'save3'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //editar account
            Route::get('account/edit', function ()    {
                return view('Accounting.account.edit');
            })->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('account/edit/{id}',[accountController::class, 'edit'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::put('account/editar/{id}',[accountController::class, 'update'])->middleware('permiso:administrador-main,administrador,contabilidad');    
            //eliminar account
            Route::delete('account/eliminar/{id}',[accountController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //detalle
            Route::get('account/detalle/{id}',[accountController::class, 'detalle'])->middleware('permiso:administrador-main,administrador,contabilidad');


            ///////////////////////////////
            ///////// Cattegorias ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////									  
                                                                                //							
            //listar categories                                                 /
            Route::get('categories/categories',[categoriesController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //agregar categories
            Route::get('categories/create', function ()    {
                return view('Accounting.categories.create');
            })->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('categories/save',[categoriesController::class, 'save'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //editar categories
            Route::get('categories/edit', function ()    {
                return view('Accounting.categories.edit');
            })->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('categories/edit/{id}',[categoriesController::class, 'edit'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::patch('categories/editar/{id}',[categoriesController::class, 'update'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //eliminar categories
            Route::delete('categories/eliminar/{id}',[categoriesController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,contabilidad');

            Route::get('categories/categories/attr/{id}',[categoriesController::class, 'view_attr'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('categories/categories/attr/{id}',[categoriesController::class, 'save_attr'])->middleware('permiso:administrador-main,administrador,contabilidad');

            Route::get('categories/attr/{id}',[categoriesController::class, 'get_all'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('categories/eliminarattr/{id}',[categoriesController::class, 'destroyattr'])->middleware('permiso:administrador-main,administrador,contabilidad');

            ///////////////////////////////
            ///////// attached ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////										  
                                                                                //							
            //listar attached                             
            Route::get('attached/attached',[attachedController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //agregar attached
            Route::get('attached/create', function ()    {
                return view('Accounting.attached.create');
            })->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('attached/create/{id}',[attachedController::class, 'nuevo'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('attached/save',[attachedController::class, 'save'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //editar attached
            Route::get('attached/edit', function ()    {
                return view('Accounting.attached.edit');
            })->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('attached/edit/{id}',[attachedController::class, 'edit'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::put('attached/editar/{id}',[attachedController::class, 'update'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            //eliminar attached
            Route::delete('attached/eliminar/{id}',[attachedController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,contabilidad');


            ///////////////////////////////
            ///////// summary ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////													  
                                                                                //							
            //listar attached
            Route::get('summary/summary',[summaryController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');                                                 	

            //agregar attached
            Route::get('summary/create',[summaryController::class, 'crear'])->middleware('permiso:administrador-main,administrador,contabilidad');
        //    Route::get('summary/create', function ()    {
            // 	return view('Accounting.summary.create');
            // });
            Route::post('summary/save',[summaryController::class, 'save'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //editar attached
            Route::get('summary/edit', function ()    {
                return view('Accounting.summary.edit');
            })->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('summary/edit/{id}',[summaryController::class, 'edit'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::put('summary/editar/{id}',[summaryController::class, 'update'])->middleware('permiso:administrador-main,administrador,contabilidad');

            //eliminar attached
            Route::delete('summary/eliminar/{id}',[summaryController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::delete('summary/eliminart/{id}',[summaryController::class, 'destroyt'])->middleware('permiso:administrador-main,administrador,contabilidad');

 
            ///////////////////////////////
            /////////Totales ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////												  
                                                                                //							
            //listar attached
            Route::get('montos/montos',[totalController::class, 'totales'])->middleware('permiso:administrador-main,administrador,contabilidad');                                            
            
            //agregar attached

            ///////////////////////////////
            /////////INICIO ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ///										  
                                                                                //							
            Route::get('/home2',[HomeController::class, 'index2']);
            Route::get('/statisjson',[HomeController::class, 'grafica'])->middleware('permiso:administrador-main,administrador,contabilidad');                                             	
        


            ///////////////////////////////
            /////////detalle ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////											  
                                                                                //
            //detalle 
            Route::get('detalle/detalle/{id}',[detalleController::class, 'view'])->middleware('permiso:administrador-main,administrador,contabilidad');                                                         
            Route::get('/download/{id}',[detalleController::class, 'downloadFile'])->middleware('permiso:administrador-main,administrador,contabilidad');

            ///////////////////////////////
            ///////// users ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////                                          ///            
                                                                                //                          
            //listar users
            Route::get('users/users',[userController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');                                                      
            Route::get('users/activar/{id}',[userController::class, 'activar'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('users/desactivar/{id}',[userController::class, 'desactivar'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::delete('users/eliminar/{id}',[userController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            

            ///////////////////////////////
            ///////// Transferencias ////////////
            /////////////////////////////////////////////////////////////////////////
                                                                                ////                                          
                                                                                ///                          
            //listar transferencia                                            //
            Route::get('transfer/create',[transferController::class, 'totales'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('transfer/save',[transferController::class, 'save'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('transfer/consul/{id}',[transferController::class, 'consul'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('transfer/edit/{id}',[transferController::class, 'edit'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('transfer/editar/{id}',[transferController::class, 'update'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            //bitacora

            Route::get('bitacora/bitacora',[bitacoraController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            


            Route::get('pdf',[pdfController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            


            Route::get('tours/tours',[toursController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //agregar categories
            Route::get('tours/create', function ()    {
                return view('Accounting.tours.create');
            })->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('tours/save',[toursController::class, 'save'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            //editar categories
            Route::get('tours/edit', function ()    {
                return view('Accounting.tours.edit');
            })->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/edit/{id}',[toursController::class, 'edit'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::put('tours/editar/{id}',[toursController::class, 'update'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            // //eliminar categories
            Route::delete('tours/eliminar/{id}',[toursController::class, 'destroy'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/eliminarattr/{id}',[toursController::class, 'destroyattr'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            
        
            Route::get('tours/tours/attr/{id}',[toursController::class, 'view_attr'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('tours/tours/attr/{id}',[toursController::class, 'save_attr'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/attr/{id}',[toursController::class, 'get_all'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/ver/{id}',[toursController::class, 'ver'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/fecha/{id}',[toursController::class, 'fecha'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/tours/select',[toursController::class, 'select'])->middleware('permiso:administrador-main,administrador,contabilidad');
            

            

            Route::get('futuro/futuro',[futuroController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('pdffuturo',[futuroController::class, 'indexfuturo'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('futuro/edit/{id}',[futuroController::class, 'edit'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::put('future/editar/{id}',[futuroController::class, 'update'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('future/acept/{id}',[futuroController::class, 'acept'])->middleware('permiso:administrador-main,administrador,contabilidad');
            

            //roles
            Route::get('permisos/ver/{id}',[permissionsController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('users/update/{id}',[permissionsController::class, 'update'])->middleware('permiso:administrador-main,administrador,contabilidad');
            

            //listar balances de  categories
            Route::get('balance/balance',[balanceController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('balance/balance/out',[balanceController::class, 'indexinit'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('balance/balance/add',[balanceController::class, 'indexadd'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
        //    Route::get('categories/create', function ()    {
        //        return view('Accounting.categories.create');
        //    });
            


            Route::get('/wait', function () {
            return view('Accounting.wait');
            });
    
        
    }
      //gente sin licencia  
    else{
        //gente sin licencia nomral 
        //usuarios comunes
        Route::get('/user',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user3',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user4',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user/create', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user/{user}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::get('/user2', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');  
        Route::post('/user', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user/{user}/edit', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::get('/user/{user}/edit2', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::patch('/user/{piola}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::patch('/user2/{piola}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::patch('/user3/{piola}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::patch('/user/estado/{user}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 
        Route::delete('/user/{user}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios'); 

        
        //categorias 
        //Route::resource('/product','ProductController');->middleware('can:isAdmin');;   //forma rapida
        Route::get('/category',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos');               
        Route::get('/category/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/category/{categoria}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/category2',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::post('/category',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/category/{categoria}/edit',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/category/{categoria}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/category/estado/{categoria}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::delete('/category/{categoria}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        
        //Productos 
        //Route::resource('/product','ProductController');->middleware('can:isAdmin');;   //forma rapida
        Route::get('/product', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/product/create', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/product/{productos}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos');
        Route::get('/product2', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::post('/product', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/product/{productos}/edit', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/product/{producto}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/product/estado/{productos}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::delete('/product/{producto}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 


        //Metricas 
        Route::get('/metric', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/metric/create', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/metric/{metrica}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos');
        Route::get('/metric2', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::post('/metric', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::get('/metric/{metrica}/edit', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/metric/{metrica}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::patch('/metric/estado/{metrica}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos'); 
        Route::delete('/metric/{metrica}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,productos');

        //Opciones de pago registradas 
        Route::get('/op',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::get('/op/create', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::get('/op/{opcionDePago}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::get('/op2', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::post('/op', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::get('/op/{opcionDePago}/edit',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::patch('/op/{opcionDePago}', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::patch('/op/estado/{opcionDePago}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::delete('/op/{opcionDePago}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');



        //Ventas
        Route::get('/sale',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale/{venta}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale2/{venta}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale3', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale4/{venta}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');    
        Route::post('/sale',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::get('/sale/{venta}/edit', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::patch('/sale/{venta}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::patch('/sale/estado/{venta}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');
        Route::delete('/sale/{venta}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,ventas');
        
        
        //Compras
        Route::get('/shopping',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/shopping/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/shopping/{compra}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/shopping2/{compra}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/shopping3', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras');
        Route::get('/shopping4/{compra}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras');//print
        Route::post('/shopping',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/shopping/{compra}/edit',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::patch('/shopping/{compra}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::patch('/shopping/estado/{compra}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::delete('/shopping/{compra}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 

        //Clientes
        Route::get('/client',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::get('/client/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes');
        Route::get('/client/create2',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::get('/client/{cliente}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes');
        Route::get('/client2',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes');  
        Route::post('/client',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::post('/client2',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::get('/client/{cliente}/edit',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::patch('/client/{cliente}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::patch('/client/estado/{cliente}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes'); 
        Route::delete('/client/{cliente}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,clientes'); 

        //documento
        Route::get('/document', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::get('/document/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::get('/document/{documento}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::post('/document',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::get('/document/{documento}/edit',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::patch('/document/{documento}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::patch('/document/estado/{documento}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::delete('/document/{documento}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 


        //proveedor
        Route::get('/provider', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/provider/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/provider/{proveedor}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/provider2',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::post('/provider',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::get('/provider/{proveedor}/edit',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::patch('/provider/{proveedor}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::patch('/provider/estado/{proveedor}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 
        Route::delete('/provider/{proveedor}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,compras'); 

        //reportes
        Route::get('/ReporteProductoMas', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::get('/ReporteVenta', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes');
        Route::get('/ReporteProductoMenos', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes');
        Route::get('/ReporteCompra', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes');
        Route::get('/ReporteCliente', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes');
        Route::get('/ReporteProveedor', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes');

        //prueba datapick                
        Route::get('/Reportes/create', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::get('/Reportes/{proveedor}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::post('/Reportes',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::get('/Reportes/{proveedor}/edit',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::patch('/Reportes/{proveedor}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::patch('/Reportes/estado/{proveedor}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes'); 
        Route::delete('/Reportes/{proveedor}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,informes'); 

        //config
        Route::get('/Bussiness', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::get('/Bussiness2', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');                 
        Route::get('/Bussiness/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::get('/Bussiness2/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');  
        Route::get('/Bussiness/{config}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::post('/Bussiness',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');
        Route::post('/Bussiness2',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema');  
        Route::get('/Bussiness/{config}/edit',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::get('/Bussiness2/{config}/edit',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::patch('/Bussiness/{config}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::patch('/Bussiness2/{config}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::patch('/Bussiness/estado/{config}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 
        Route::delete('/Bussiness/{config}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,sistema'); 


        //roles
        Route::get('/roles',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');           
        Route::get('/roles/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::get('/roles/{rol}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::get('/roles2',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::post('/roles',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::get('/roles/{rol}/edit',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::patch('/roles/{rol}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::patch('/roles/estado/{rol}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');
        Route::delete('/roles/{rol}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,usuarios');

         //contacto
         Route::get('/contacto', [contactoController::class, 'index']); 
         Route::get('/contactoFJ',[contactoController::class, 'index2'])->middleware('permiso:administrador-main');          
         Route::get('/contacto/create',[contactoController::class, 'create'])->middleware('permiso:administrador-main');
         Route::get('/contacto/{contacto}',[contactoController::class, 'show'])->middleware('permiso:administrador-main');
         Route::get('/contacto2',[contactoController::class, 'show2'])->middleware('permiso:administrador-main');
         Route::post('/contacto',[contactoController::class, 'store'])->middleware('permiso:administrador-main');
         Route::get('/contacto/{contacto}/edit',[contactoController::class, 'edit'])->middleware('permiso:administrador-main');
         Route::patch('/contacto/{contacto}',[contactoController::class, 'update'])->middleware('permiso:administrador-main');
         Route::patch('/contacto/estado/{contacto}',[contactoController::class, 'estado'])->middleware('permiso:administrador-main');
         Route::delete('/contacto/{contacto}',[contactoController::class, 'destroy'])->middleware('permiso:administrador-main');
 
         //licencia
         Route::get('/licencia',[licenciaController::class, 'index'])->middleware('permiso:administrador-main');   
         Route::get('/licenciaFJ',[licenciaController::class, 'index2'])->middleware('permiso:administrador-main');         
         Route::get('/licencia/create',[licenciaController::class, 'create'])->middleware('permiso:administrador-main');
         Route::get('/licencia/{licencia}',[licenciaController::class, 'show'])->middleware('permiso:administrador-main');
         Route::get('/licencia2',[licenciaController::class, 'show2'])->middleware('permiso:administrador-main');
         Route::post('/licencia',[licenciaController::class, 'store'])->middleware('permiso:administrador-main');
         Route::get('/licencia/{licencia}/edit',[licenciaController::class, 'edit'])->middleware('permiso:administrador-main');
         Route::patch('/licencia/{licencia}',[licenciaController::class, 'update'])->middleware('permiso:administrador-main');
         Route::patch('/licencia/estado/{licencia}',[licenciaController::class, 'estado'])->middleware('permiso:administrador-main');
         Route::delete('/licencia/{licencia}',[licenciaController::class, 'destroy'])->middleware('permiso:administrador-main');




        Route::get('/clear-cache', function() {
            Artisan::call('cache:clear');
            return "Cache is cleared";
            }); 

            
        Route::get('/daterange', [contactoController::class, 'index'])->middleware('permiso:administrador-main');
        Route::post('/daterange/fetch_data',[contactoController::class, 'index'])->middleware('permiso:administrador-main');



        //modulo de contabilidad
        ///////////////////////////////
            ///////// account ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////													  
                                                                                //							
            //listar account                                                   	/
            Route::get('account/account',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //agregar account
            Route::get('account/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('account/save',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //editar account
            Route::get('account/edit',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('account/edit/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::put('account/editar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');    
            //eliminar account
            Route::delete('account/eliminar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //detalle
            Route::get('account/detalle/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');


            ///////////////////////////////
            ///////// Cattegorias ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////									  
                                                                                //							
            //listar categories                                                 /
            Route::get('categories/categories',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //agregar categories
            Route::get('categories/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('categories/save',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //editar categories
            Route::get('categories/edit', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('categories/edit/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('categories/editar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');

            //eliminar categories
            Route::delete('categories/eliminar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');

            Route::get('categories/categories/attr/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('categories/categories/attr/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');

            Route::get('categories/attr/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('categories/eliminarattr/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');

            ///////////////////////////////
            ///////// attached ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////										  
                                                                                //							
            //listar attached                             
            Route::get('attached/attached',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //agregar attached
            Route::get('attached/create', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('attached/create/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('attached/save',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //editar attached
            Route::get('attached/edit', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('attached/edit/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::put('attached/editar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            //eliminar attached
            Route::delete('attached/eliminar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');


            ///////////////////////////////
            ///////// summary ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////													  
                                                                                //							
            //listar attached
            Route::get('summary/summary',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');                                                 	

            //agregar attached
            Route::get('summary/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
        //    Route::get('summary/create', function ()    {
            // 	return view('Accounting.summary.create');
            // });
            Route::post('summary/save',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //editar attached
            Route::get('summary/edit', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('summary/edit/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::put('summary/editar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');

            //eliminar attached
            Route::delete('summary/eliminar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::delete('summary/eliminart/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');


            ///////////////////////////////
            /////////Totales ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////												  
                                                                                //							
            //listar attached
            Route::get('montos/montos',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');                                            
            
            //agregar attached

            ///////////////////////////////
            /////////INICIO ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ///										  
                                                                                //							
            Route::get('/home2',[contactoController::class, 'index']);
            Route::get('/statisjson',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');                                             	
        


            ///////////////////////////////
            /////////detalle ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////											  
                                                                                //
            //detalle 
            Route::get('detalle/detalle/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');                                                         
            Route::get('/download/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');

            ///////////////////////////////
            ///////// users ////////////
            ////////////////////////////////////////////////////////////////////////
                                                                                ////                                          ///            
                                                                                //                          
            //listar users
            Route::get('users/users',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');                                                      
            Route::get('users/activar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('users/desactivar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::delete('users/eliminar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            

            ///////////////////////////////
            ///////// Transferencias ////////////
            /////////////////////////////////////////////////////////////////////////
                                                                                ////                                          
                                                                                ///                          
            //listar transferencia                                            //
            Route::get('transfer/create',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('transfer/save',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('transfer/consul/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('transfer/edit/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('transfer/editar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            //bitacora

            Route::get('bitacora/bitacora',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            


            Route::get('pdf',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            


            Route::get('tours/tours',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            //agregar categories
            Route::get('tours/create', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('tours/save',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            //editar categories
            Route::get('tours/edit', [contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/edit/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::put('tours/editar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            // //eliminar categories
            Route::delete('tours/eliminar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/eliminarattr/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
            
        
            Route::get('tours/tours/attr/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::post('tours/tours/attr/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/attr/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/ver/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/fecha/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('tours/tours/select',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            

            

            Route::get('futuro/futuro',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('pdffuturo',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('futuro/edit/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::put('future/editar/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('future/acept/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            

            //roles
            Route::get('permisos/ver/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('users/update/{id}',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            

            //listar balances de  categories
            Route::get('balance/balance',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('balance/balance/out',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            Route::get('balance/balance/add',[contactoController::class, 'index'])->middleware('permiso:administrador-main,administrador,contabilidad');
            
        //    Route::get('categories/create', function ()    {
        //        return view('Accounting.categories.create');
        //    });
            


            Route::get('/wait', function () {
            return view('Accounting.wait');
            });
    };


