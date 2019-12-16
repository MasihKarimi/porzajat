<?php

//###############view and add purchases########
Route::get('/add_purchases',[
   'uses'=>'front_controller@add_purchases',
    'as'=>'add_purchases'
]);
Route::post('/add_purchase',[
    'uses'=>'front_controller@add_purchase',
    'as'=>'add_purchase'
]);

Route::post('/searchPurchases','front_controller@searchPurchases')->name('/searchPurchase');
Route::post('/searchPurchaseView','front_controller@searchPurchaseView')->name('/searchPurchaseView');
Route::get('/view_purchase','front_controller@view_purchases')->name('/view_purchases');
$user=DB::table('users')->where('id',$_SESSION['access'])->first();
if($user->type==1){
Route::get('/edit_purchase/{id}','front_controller@edit_purchase')->name('/edit_purchase');
Route::post('/update_purchase','front_controller@update_purchase')->name('/update_purchase');
Route::get('/delete_purchase/{id}','front_controller@delete_purchase')->name('/delete_purchase');
}
//#############Add Products################
Route::get('/add_product',[
   'uses'=>'front_controller@add_product',
    'as'=>'add_product'
]);
Route::get('/allProd','front_controller@allProd');
Route::post('/add_products',[
   'uses'=>'front_controller@add_products',
    'as'=>'add_products'
]);
$user=DB::table('users')->where('id',$_SESSION['access'])->first();
if($user->type==1){
Route::post('/deleteProducts', 'front_controller@deleteProduct');
Route::post('/editProducts', 'front_controller@editProduct');
}
Route::post('/searchProduct','front_controller@searchProducts')->name('/searchProduct');
//#############Stock Operations###########################
Route::get('/view_stock','front_controller@view_stock')->name('/view_stock');
Route::post('/searchStockView','front_controller@searchStockView')->name('/searchStockView');

// ############qoutation operations#######################
Route::get('/add_q','front_controller@add_q')->name('/add_q');
Route::get('/add_qoutation','front_controller@view_add_qoutation');
Route::get('productAddQ/{customer_id}/{recept_id}/{quantity}/{mid}/{phone}/{name}/{salep}','Controllersajax\ajax@productAddQ');
Route::post('/q_id_view','front_controller@searchq_id_view');
Route::get('quoutation_salesdetail/{id}','front_controller@quoutation_salesdetail');
$user=DB::table('users')->where('id',$_SESSION['access'])->first();
if($user->type==1){
Route::get('/edit_q/{id}','front_controller@edit_q')->name('/edit_q');
Route::post('/update_q','front_controller@update_q');
Route::get('/delete_q/{id}','front_controller@delete_q');
}
//#############Sales Operations###########################
Route::get('/add_sale','front_controller@add_sale')->name('/add_sale');
Route::get('exchangeTypeSendto/{id}/{cur}','Controllersajax\ajax@exchangeTypeSendto');
Route::get('productName/{id}','Controllersajax\ajax@productName');
Route::get('medicineTotal/{quantity}/{id}','Controllersajax\ajax@medicineTotal');
//Route::post('/add_sales','front_controller@add_sales');
Route::get('productAdd/{customer_id}/{recept_id}/{quantity}/{mid}/{c_c_money}/{phone}/{name}/{sales_price}/{c_date}','Controllersajax\ajax@productAdd');
Route::get('product_salesdetail/{id}','front_controller@product_salesdetails');
Route::get('add_sales','front_controller@add_sale_view');
Route::get('product_salesdelivery/{id}','front_controller@product_salesdelivery');
Route::get('show_current_list/{bene_id}','Controllersajax\ajax@productList_clicked');
Route::post('/sales_id','front_controller@searchSales_id');
Route::get('/view_sales','front_controller@view_sales')->name('/view_sales');
Route::post('/sales_id_view','front_controller@searchSales_id_view');
$user=DB::table('users')->where('id',$_SESSION['access'])->first();
if($user->type==1){
Route::get('/edit_sales/{id}','front_controller@edit_sales')->name('/edit_sales');
Route::post('/update_sales','front_controller@update_sale')->name('/update_sales');
Route::get('/delete_sales/{id}','front_controller@delete_sales')->name('/delete_sales');
}
Route::get('sales_giveback/{id}','front_controller@sales_giveback');
Route::get('procurementSales/{percen}/{price}','Controllersajax\ajax@procurementSales');
Route::get('procurementSalesben/{percen}/{ben}','Controllersajax\ajax@procurementSalesben');
//##############cash receive and cash payment################
Route::get('cash_receive','front_controller@cash_receives');
//##############Expenses Operations###############
Route::get('finance_expenses','front_controller@finance_expenses');

Route::post('finance_expensesstore','front_controller@finance_expensesstore');
Route::post('finance_manage_id','front_controller@finance_manage_id');
Route::get('finance_expensesdetail/{id}','front_controller@finance_expensesdetail');
$user=DB::table('users')->where('id',$_SESSION['access'])->first();
if($user->type==1){
Route::get('finance_expensesselectupdates/{id}','front_controller@finance_expensesselectupdates');
Route::get('finance_expensesdelete/{id}','front_controller@finance_expensesdelete');
Route::post('finance_expensesupdates','front_controller@finance_expensesupdates');
}
Route::get('finance_expensesgiveback/{id}','front_controller@finance_expensesgiveback');
//###############Setting Operations################
$user=DB::table('users')->where('id',$_SESSION['access'])->first();
if($user->type==1){
Route::get('expenses', 'front_controller@expenses');
Route::post('expensesstore', 'front_controller@expensesstore');
Route::get('expensesselectupdates/{id}', 'front_controller@expensesselectupdates');
Route::post('expensesupdates', 'front_controller@expensesupdates');
Route::get('expensesdelete/{id}', 'front_controller@expensesdelete');
}
//##############expense report##############
Route::get('expense_report','front_controller@finance_reports');
Route::post('create_report_expense','front_controller@create_report_finance');
//#############report by customer##################
Route::get('/customer_report','front_controller@customer_report');
Route::post('create_report_customer', 'front_controller@create_report_customer');
Route::get('/seeCustomerRecord/{id}','front_controller@seeCustomerRecord');
//#############View All remin###############
Route::get('view_remind','front_controller@view_remind');
Route::post('/remin_id_view','front_controller@searchremin_id_view');
//#############Sales report################
Route::get('sales_report', 'front_controller@pharmacy_reports');
Route::post('create_report_pharmacy', 'PharmacyControllers\pharmacy_search@create_report_pharmacy');
Route::post('create_report_sales', 'front_controller@create_report_sales');

//##################user view and update #############
// ###########user route############
Route::get('/userp',[
    'uses'=>'front_controller@userprofile',
    'as'=>'userp'
]);
$user=DB::table('users')->where('id',$_SESSION['access'])->first();
if($user->type==1){
Route::post('userstore','front_controller@userstore');
Route::get('/updateUser/{id}','front_controller@updateUser');
Route::post('/update_user','front_controller@update_user');
Route::get('/delete_user/{id}','front_controller@delete_user');
}
//####################add customer#########################
Route::get('add_customer','front_controller@add_customer');
Route::post('add_customer','front_controller@add_custo');
$user=DB::table('users')->where('id',$_SESSION['access'])->first();
if($user->type==1){
Route::post('deletecustomer', 'front_controller@deletecustomer');
Route::post('editcustomer', 'front_controller@editcustomer');
}
Route::post('/searchcustomer','front_controller@searchcustomer')->name('/searchcustomer');
//#############add cash receive from customer ################
Route::get('money_receive_add/{id}','Controllersajax\ajax@money_receive_add');
Route::post('cash_receive_add','front_controller@cash_receive_add');
Route::get('cash_receive_detail/{id}','front_controller@cash_receive_detail');
Route::post('cashcSearch','front_controller@cashcSearch');
$user=DB::table('users')->where('id',$_SESSION['access'])->first();
if($user->type==1){
Route::get('cash_receive_updates/{id}','front_controller@cash_receive_updates');
Route::get('cash_receive_delete/{id}','front_controller@cash_receive_delete');
Route::post('cash_receive_updatesd','front_controller@cash_receive_updatesd');
}
//############add cash payment from us###############
Route::get('cash_payment','front_controller@cash_payment');
Route::get('money_payment_add/{id}','Controllersajax\ajax@money_payment_add');
Route::post('cash_payment_add','front_controller@cash_payment_add');
Route::get('cash_payment_detail/{id}','front_controller@cash_payment_detail');
Route::post('cashpSearch','front_controller@cashpSearch');
$user=DB::table('users')->where('id',$_SESSION['access'])->first();
if($user->type==1){
Route::get('cash_payment_updates/{id}','front_controller@cash_payment_updates');
Route::post('cash_payment_updatesd','front_controller@cash_payment_updatesd');
Route::get('cash_payment_delete/{id}','front_controller@cash_payment_delete');
}

/* this will be last */