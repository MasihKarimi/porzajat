<?php

namespace App\Http\Controllers;

use App\Comp;
use App\Company;
use App\Customer;
use App\Debt;
use App\Product;
use App\Sale;
use App\Stock;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\financeexpenses;
use App\Quotation;
use DB;
use App\settingexchange;
use App\settingcurrency;
use App\settingexpenses;
use App\settingunit;
use Illuminate\Support\Facades\Input;

class front_controller extends Controller
{
    //##########purchase operations###########
    public function add_purchases()
    {
        $showStock=Stock::take(10000)->orderBy('id','desc')->paginate(30);
        return view('page.add_purchase',['showStock'=>$showStock]);
    }
    public function add_purchase(Request $request)
    {
        
        $rules = array(
            'prodcutName' => 'required',
            'quantity'=>'required',
            'netprice'=>'required',
            'saleprice'=>'required',
            'id'=>'required',

            'ptype'=>'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray(),));
        } else {
            $addStock=new Stock();
            $addStock->product_id=$request->prodcutName;
            $addStock->net_price=$request->netprice;
            $addStock->sales_price=$request->saleprice;
            $addStock->customer_id=$request->customer_id;
            $addStock->bill=$request->bill;
            $addStock->pay_amount="";
            $addStock->sales_type=$request->ptype;
            $addStock->total_benefit=($request->saleprice - $request->netprice) * $request->quantity;
            $addStock->quantity=$request->quantity;
            $addStock->remins=$request->quantity;
            $addStock->quantity_sales="0";
            $addStock->date=date('Y-m-d');
            $addStock->user_id=$request->id;
            $addStock->save();
            if($request->ptype!=0){
                print_r('noting ');
                exit;
            }else{
                $firstCheck=DB::table('cash_paids')->first();
                if($firstCheck){
                    $all_ol_tl=DB::table('cash_paids')->where('customer_id',$request->customer_id)->get();
                    $sum=0;
                    foreach($all_ol_tl as $tlo){
                        $sum=$sum+$tlo->tl_amount;
                    }  
                    DB::table('cash_paids')->where('customer_id',$request->customer_id)->update([
                        'customer_id'=>$request->customer_id,
                        'user_id'=>$_SESSION['access'],
                        'pay_amount'=>0,
                        'tl_amount'=>$sum+$request->quantity*$request->netprice
                    ]);
                }else{
                    DB::table('cash_paids')->insert([
                        'customer_id'=>$request->customer_id,
                        'user_id'=>$_SESSION['access'],
                        'pay_amount'=>0,
                        'tl_amount'=>$request->quantity*$request->netprice
                    ]);
                    
                }
            }
            return response()->json($addStock);
        }
    }

    public function searchPurchases(Request $request)
    {
        $term='%'.$request->term.'%';
        $showStock=Stock::take(10000)->orderBy('id','desc')
            ->orWhereHas('Product',function ($query) use ($term){
            $query->where('product_name','LIKE',$term)->orWhere('product_s','LIKE',$term);
        })->paginate(30);
        return view('page.add_purchase',['showStock'=>$showStock]);
    }
    public function view_purchases()
    {
        $showStock=Stock::take(10000)->orderBy('id','desc')->paginate(30);
        return view('page.view_purchases',['showStock'=>$showStock]);
    }
    public function searchPurchaseView(Request $request)
    {
        $term=$request->term;
        $showStock=Stock::where('bill',$term)->paginate(30);
        return view('page.view_purchases',['showStock'=>$showStock]);
    }
    public function edit_purchase($id)
    {
        $edit_purchase=Stock::find($id);
        return view('page.edit_purchase',['edit_purchase'=>$edit_purchase]);
    }
    public function update_purchase(Request $request)
    {
        $this->validate($request,[
            'prodcutName' => 'required',
            'quantity'=>'required',
            'netprice'=>'required',
            'saleprice'=>'required',
            'id'=>'required',
            'ptype'=>'required'
        ]);
        $update_stock=Stock::find($request['singleID']);
        $update_stock->product_id=$request->prodcutName;
        $update_stock->customer_id=$request->customer_id;
        $update_stock->net_price=$request->netprice;
        $update_stock->sales_price=$request->saleprice;
        $update_stock->total_benefit=($request->saleprice - $request->netprice) * $request->quantity;
        $update_stock->sales_type=$request->ptype;
        $update_stock->quantity=$request->quantity;
        $update_stock->remins=$request->quantity;
        $update_stock->quantity_sales="0";
        $update_stock->user_id=$request->id;
        $update_stock->update();

        return redirect()->route('/view_purchases')->with(['success'=>'Your Selected Item Updated']);
    }
    public function delete_purchase($id)
    {
        $delete_Stock=Stock::find($id);
        $delete_Stock->delete();
        return redirect()->back()->with(['success'=>'Your Selected Item Deleted']);
    }
    //##########product operations############
    public function add_product()
    {
        $ProductShow=Product::take(10000)->orderBy('id','desc')->paginate(20);
        return view('page.add_product',['ProductShow'=>$ProductShow]);
    }
    public function add_products(Request $request)
    {
        $rules = array(
            'product_name' => 'required',
            'product_serial'=>'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray(),));
        } else {
            $data=new Product();
            $data->product_name=$request->product_name;
            $data->product_s=$request->product_serial;
            $data->save();
            return response()->json($data);
        }
    }
    public function deleteProduct(Request $req)
    {
        Product::find($req->id)->delete();
        return response()->json();
    }
    public function editProduct(Request $req)
    {
        $data = Product::find($req->id);
        $data->product_name = $req->name;
        $data->product_s=$req->ser;
        $data->save();
        return response()->json($data);
    }
    public function searchProducts(Request $request)
    {
        $term='%'.$request->term.'%';
        $ProductShow=Product::where('product_name','LIKE',$term)->orWhere('product_s','LIKE',$term)->paginate(20);
        return view('page.add_product',['ProductShow'=>$ProductShow]);
    }
    //#########View Stock Operations#########
    public function view_stock()
    {

        $showStock=Stock::take(10000)->orderBy('id','desc')->paginate(30);
        return view('page.view_stock',['showStock'=>$showStock]);
    }
    public function searchStockView(Request $request)
    {
        $term='%'.$request->term.'%';
        $showStock=Stock::take(10000)->orderBy('id','desc')
            ->orWhereHas('Product',function ($query) use ($term){
                $query->where('product_name','LIKE',$term);
            })->paginate(30);
        return view('page.view_stock',['showStock'=>$showStock]);
    }
    public function view_info()
    {
        return view('page.view_info');
    }
    // ###############qoutation opertations################
    public function view_add_qoutation()
    {
        return view('page.view_add_quotation');
    }
    public function add_q()
    {
            $show_sales=DB::table('quotations')->orderBy('id','desc')->paginate(30);
            return view('page.view_q',['show_sales'=>$show_sales]);
    }
    public function searchq_id_view(Request $request)
    {
        $id=$request->id;
        $show_sales=DB::table('quotations')->where('bene','=',$id)->paginate(30);
        return view('page.view_q',['show_sales'=>$show_sales]);
    }
    public function quoutation_salesdetail($id)
    {
        $row = DB::select('select * from quotations where id = :id', ['id' => $id]);
        return view("page.q_details", compact("row"));
    }
    public function edit_q($id)
    {
        $edit_qu=DB::table('quotations')->where('id','=',$id)->first();
        return view('page.edit_q',['edit_qu'=>$edit_qu]);
    }
    public function update_q(Request $request)
    {
        $this->validate($request,[
           'id'=>'required',
            'product_id'=>'required',
            'quantity'=>'required'
        ]);
            $quotation_update=Quotation::find($request['id']);
            $quotation_update->product_id = $request->product_id;
            $quotation_update->quantity = $request->quantity;
            $quotation_update->sales_price=$request->sales_price;
            $quotation_update->update();
            
            return redirect()->back()->with(['success' => 'Your Selected Item Updated']);
    }
    public function delete_q($id)
    {
         $sale= Quotation::find($id);
         $sale->delete();
        return redirect()->route('/add_q')->with(['success'=>'Your Selected Item Deleted']);
    }
    //################sales Operations ####################
    public function add_sale()
    {
        $showStock=Stock::take(10000)->orderBy('id','desc')->paginate(30);
        return view('page.add_sales',['showStock'=>$showStock]);
    }
    public function add_sale_view()
    {
        return view('page.view_add_sales');
    }
    public function add_sales(Request $request)
    {
        $rules = array(
            'buyerName' => 'required',
            'address'=>'required',
            'productname'=>'required',
            'quantity'=>'required',
            'sales'=>'required',
            'salestype'=>'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray(),));
        } else {
            $data=new Sale();
            $data->product_id=$request->productname;
            $data->seller_name=$request->buyerName;
            $data->address=$request->address;
            $data->currency=$request->currencyType;
            $data->total_price=$request->sales;
            $data->quantity=$request->quantity;
            $data->sales_type=$request->salestype;
            $data->save();
            return response()->json($data);
        }
    }
    public function product_salesdetails($id)
    {
        $row = DB::select('select * from sales where id = :id', ['id' => $id]);
        return view("page.sales_details", compact("row"));
    }
    public function product_salesdelivery($id)
    {
        $row = DB::select('select * from sales where id = :id', ['id' => $id]);
        return view("page.sales_deliver", compact("row"));
    }
    public function searchSales_id(Request $request)
    {
        $id=$request->id;
        $show_sales=Sale::take(10000)->where('bene','=',$id)->paginate(30);
        return view('page.add_sales',['show_sales'=>$show_sales]);

    }
    public function view_sales(){
        $show_sales=Sale::take(10000)->orderBy('id','desc')->paginate(30);
        return view('page.view_sales',['show_sales'=>$show_sales]);
    }
    public function searchSales_id_view(Request $request)
    {
        $id=$request->id;
        $show_sales=Sale::take(10000)->where('bene','=',$id)->paginate(30);
        return view('page.view_sales',['show_sales'=>$show_sales]);
    }
    public function edit_sales($id)
    {
        $edit_sales=Sale::find($id);
        return view('page.edit_sales',['edit_sales'=>$edit_sales]);
    }
    public function update_sale(Request $request)
    {
        $this->validate($request,[
           'id'=>'required',
            'product_id'=>'required',
            'quantity'=>'required'
        ]);
        $sales_update=Sale::find($request['id']);
        if ($sales_update->giveback == 'false') {
            $sales_update->product_id = $request->product_id;
            $sales_update->quantity = $request->quantity;
            $sales_update->sales_price=$request->sales_price;
            $sales_update->sales_type=$request->c_c_money;
            $sales_update->update();
            
            return redirect()->back()->with(['success' => 'Your Selected Item Updated']);
        }
        return redirect()->route('/view_sales')->with(['errors'=>'You Cant Update']);
    }
    public function delete_sales($id)
    {
         $sale= Sale::find($id);
         $sale->delete();
        return redirect()->route('/view_sales')->with(['success'=>'Your Selected Item Deleted']);
    }
    public function sales_giveback($id)
    {
        $access = User::find($_SESSION['access']);
        $givwe = $access->ms_gaveback;
        if ($givwe == "1") {
            return view('404')->with('access', 'access');
        }
        $giv = '';
        if ($productsales = DB::table('sales')->where('bene', $id)->first()) {
            $give = $productsales->giveback;
        }
        if ($give == "true") {
            DB::table('sales')->where('bene', $id)->update(['giveback' => 'false']);
            $phar = DB::table('sales')->where('bene', $id)->get();
            $customers=DB::table('customers')->get();
            foreach ($phar as $idss) {
                $amo = ($idss->quantity);
                $productsales = Stock::where('product_id',$idss->product_id)->first();
                $productsales->quantity = $productsales->quantity + $idss->quantity;
                $productsales->quantity_sales = $productsales->quantity_sales - $idss->quantity;
                $productsales->save();
                if($idss->sales_type==='5'){
                foreach($customers as $custo){
                    if($idss->customer_id===$custo->id){
                $total_cost=$idss->quantity*$idss->sales_price;
                //$totcost=ceil($total_cost - (($total_cost * $idss->discount) / 100));
                $sum=0;
                $current_l_amount=DB::table('customers')->where('id',$idss->customer_id)->first();
                $sum=$sum+$current_l_amount->l_amount-$total_cost;
                DB::table('customers')->where('id', $idss->customer_id)->update(['l_amount' => $sum]);
                }
                else{

                }
                }
                }else{
                    foreach($customers as $custo){
                        if($idss->customer_id===$custo->id){
                            $total_cost=$idss->quantity*$idss->sales_price;
                            //$totcost=ceil($total_cost - (($total_cost * $idss->discount) / 100));
                            $sum=0;
                            $current_p_amount=DB::table('customers')->where('id',$idss->customer_id)->first();
                            $sum=$sum+$current_p_amount->p_amount-$total_cost;
                            DB::table('customers')->where('id', $idss->customer_id)->update(['p_amount' => $sum]);
                            }
                            else{
            
                            }
                        }
                }
            }
            
            

        } else {
            DB::table('sales')->where('bene', $id)->update(['giveback' => 'true']);
            $phar = DB::table('sales')->where('bene', $id)->get();
            $customers=DB::table('customers')->get();
            foreach ($phar as $idss) {
                $amo = ($idss->quantity);
                $productsales = Stock::where('product_id',"=",$idss->product_id)->first();
                $productsales->quantity = $productsales->quantity - $idss->quantity;
                $productsales->quantity_sales = $productsales->quantity_sales + $idss->quantity;
                $productsales->save();
                
                if($idss->sales_type==='5'){
                foreach($customers as $custo){
                if($idss->customer_id===$custo->id){
                    $total_cost=$idss->quantity*$idss->sales_price;
                    //$totcost=ceil($total_cost - (($total_cost * $idss->discount) / 100));
                    $sum=0;
                    $current_l_amount=DB::table('customers')->where('id',$idss->customer_id)->first();
                    $sum=$sum+$current_l_amount->l_amount+$total_cost;
                    DB::table('customers')->where('id', $idss->customer_id)->update(['l_amount' => $sum]);
                    }
                    else{
    
                    }
                }
                }else{
                    foreach($customers as $custo){
                        if($idss->customer_id===$custo->id){
                            $total_cost=$idss->quantity*$idss->sales_price;
                            //$totcost=ceil($total_cost - (($total_cost * $idss->discount) / 100));
                            $sum=0;
                            $current_p_amount=DB::table('customers')->where('id',$idss->customer_id)->first();
                            $sum=$sum+$current_p_amount->p_amount+$total_cost;
                            DB::table('customers')->where('id', $idss->customer_id)->update(['p_amount' => $sum]);
                            }
                            else{
            
                            }
                        }
                }
            }
        }
        return redirect()->action("front_controller@view_sales")->with('success', 'The Selected item Successfully Updated!');

    }

    //################expenses################
    public function finance_expenses()
    {

        $row = DB::table("finance_expenses")->orderBy('id', 'desc')->paginate('30');
        $ech = DB::table("finance_expenses")->orderBy('id', 'desc')->paginate('30')->count();
        return view("page.finance_expenses")->with('row', $row)
            ->with('check', $ech);
    }
    public function finance_expensesstore()
    {
        $data = Input::All();
        $rules = array(
            'expenses' => 'required',
            'date' => 'required',
            'r_name'=>'required',
            'amount' => 'required',
            'remark' => 'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->action('front_controller@finance_expenses')->withErrors($validation);
        }
        $finanace_expenses = new financeexpenses;
        $finanace_expenses->expenses_type = $data['expenses'];
        $finanace_expenses->date = $data['date'];
        $finanace_expenses->r_name=$data['r_name'];
        $finanace_expenses->amount = $data['amount'];
        $finanace_expenses->currencytype = "10000";
        $finanace_expenses->remark = $data['remark'];
        $finanace_expenses->save();
        return redirect()->action('front_controller@finance_expenses')->with('success', 'Unit Successfully Registered!');
    }
    public function finance_expensesgiveback($id)
    {
        $finanace_expenses = financeexpenses::find($id);
        $give = $finanace_expenses->giveback;
        $total=0;
        if ($give == "true") {
            DB::table('finance_expenses')->where('id', $id)->update(['giveback' => 'false']);
            } else {
            DB::table('finance_expenses')->where('id', $id)->update(['giveback' => 'true']);

        }
        $row = DB::table("finance_expenses")->orderBy('id', 'desc')->paginate('30');
        $ech = DB::table("finance_expenses")->orderBy('id', 'desc')->paginate('30')->count();
        return view("page.finance_expenses")->with('row', $row)
            ->with('check', $ech);
    }
    public function finance_expensesdetail($id)
    {
        $row = DB::select('select * from finance_expenses where id = :id', ['id' => $id]);
        return view("page.finance_expenses_detail", compact("row"));
    }

    public function finance_expensesselectupdates($id)
    {


        $row = DB::select('select * from finance_expenses where id = :id', ['id' => $id]);
        return view("page.finance_expenses_update", compact("row"));
    }

    public function finance_expensesupdates()
    {
        $data = Input::All();
        $rules = array(
            'expenses' => 'required',
            'date' => 'required',
            'amount' => 'required',
            'remark' => 'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->action('front_controller@finance_expenses')->withErrors($validation);
        }
        $finanace_expenses = financeexpenses::find($data['id']);
        $finanace_expenses->expenses_type = $data['expenses'];
        $finanace_expenses->date = $data['date'];
        $finanace_expenses->r_name=$data['r_name'];
        $finanace_expenses->amount = $data['amount'];
        $finanace_expenses->remark = $data['remark'];
        $finanace_expenses->save();
        return redirect()->action('front_controller@finance_expenses')->with('success', 'Unit Successfully Updated!');
    }

    public function finance_expensesdelete($id)
    {

        $deleted = DB::delete('delete from finance_expenses where id = :id', ['id' => $id]);
        $row = DB::table("finance_expenses")->orderBy('id', 'desc')->paginate('30');
        $ech = DB::table("finance_expenses")->orderBy('id', 'desc')->paginate('30')->count();
        return view("page.finance_expenses")->with('row', $row)
            ->with('check', $ech)->with('deleted', 'deleted');
    }
    public function finance_manage_id()
    {
        $name = Input::get("id");
        if (!empty($name)) {
            if($rows = DB::table("setting_expenses")->where('expensesna', 'LIKE', '%' . $name . '%')->first()) {
                $row = DB::table("finance_expenses")->where('expenses_type', $rows->id )->orderBy('id', 'desc')->paginate('30');
                $ech = DB::table("finance_expenses")->orderBy('id', 'desc')->paginate('30')->count();
            }else{

                $row = DB::table("finance_expenses")->where('expenses_type', '0' )->orderBy('id', 'desc')->paginate('30');
                $ech = DB::table("finance_expenses")->orderBy('id', 'desc')->paginate('30')->count();
            }
            return view("page.finance_expenses")->with('row', $row)->with('check', $ech);
        } else {
            return redirect()->action('front_controller@finance_expenses');
        }
    }

//#####################report #######################
    public function customer_report()
    {
        return view("page.customer_report");
    }
    public function finance_reports()
    {
        return view("page.finance_report");
    }

    public function create_report_finance()
    {
        $section = Input::get("section");
        $from = Input::get("from");
        $to = Input::get("to");
        return view("page.finance_report")->with('section', $section)->with('start', $from)->with('end', $to);
    }
    public function pharmacy_reports()
    {
        return view("page.sales_report");
    }

    public function create_report_pharmacy()
    {

        $recept_id = Input::get("recept_id");
        $section = Input::get("section");
        $from = Input::get("from");
        $to = Input::get("to");

        return view("page.report.reception_report")
            ->with('recept_id', $recept_id)
            ->with('section', $section)
            ->with('start', $from)->with('end', $to);
    }
    public function create_report_sales()
    {

        $section = Input::get("section");
        //print_r($section);
        //exit;
        $from = Input::get("from");
        $to = Input::get("to");

        return view("page.sales_report")
            ->with('section', $section)
            ->with('start', $from)->with('end', $to);
    }
    public function create_report_customer()
    {

        $section = Input::get("section");
        $type=Input::get("type");
        //print_r($section);
        //exit;
        $from = Input::get("from");
        $to = Input::get("to");

        return view("page.customer_report")
            ->with('section', $section)->with('type',$type)
            ->with('start', $from)->with('end', $to);
    }
    public function reception_reports()
    {
        return view("page.benefit_report");
    }
    public function create_report_benefit()
    {

        $section = Input::get("section");
        $from = Input::get("from");
        $to = Input::get("to");

        return view("page.benefit_report")
            ->with('section', $section)
            ->with('start', $from)->with('end', $to);
    }
    //##########Remin################
    public function view_remind()
    {
        $show_sales=Sale::take(10000)->where('sales_type','1')->orderBy('id','desc')->paginate(30);
        return view('page.view_all_remin',['show_sales'=>$show_sales]);
    }
    public function searchremin_id_view(Request $request)
    {
        $id=$request->id;
        $show_sales=Sale::take(10000)->where('bene','=',$id)->where('sales_type','1')->paginate(30);
        return view('page.view_all_remin',['show_sales'=>$show_sales]);
    }
    //################Setting Operations #####################

    public function expenses()
    {

        $row = DB::table("Setting_expenses")->orderBy('id', 'desc')->get();
        return view("page.Setting_expenses", compact("row"));
    }

    public function expensesstore()
    {

        $data = Input::All();
        $rules = array(
            'expenses_na' => 'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->action('front_controller@expenses')->withErrors($validation);
        }
        $Settingexpenses = new settingexpenses;
        $Settingexpenses->expensesna = $data['expenses_na'];

        $Settingexpenses->save();
        return redirect()->action('front_controller@expenses')->with('success', 'Unit Successfully Registered!');

    }

    public function expensesselectupdates($id)
    {

        $row = DB::select('select * from Setting_expenses where id = :id', ['id' => $id]);
        return view('page.Setting_expenses_update', compact("row"));
    }

    public function expensesupdates()
    {
        $data = Input::All();
        $rules = array(
            'expenses_na' => 'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->action('front_controller@expenses')->withErrors($validation);
        }
        $Settingexpenses = Settingexpenses::find($data['id']);
        $Settingexpenses->expensesna = $data['expenses_na'];
        $Settingexpenses->save();
        return redirect()->action('front_controller@expenses')->with('success', 'Unit Successfully Updated!');
    }

    public function expensesdelete($id)
    {

        $deleted = DB::delete('delete from Setting_expenses where id = :id', ['id' => $id]);
        $row = DB::table("Setting_expenses")->orderBy('id', 'desc')->get();

        return view("page.Setting_expenses", compact("row"))->with('deleted', 'deleted');
    }

    //###########exchange opertations############

    public function exchange()
    {
        $row = DB::table("Setting_exchange")->orderBy('id', 'desc')->get();
        return view("page.Setting_exchange", compact("row"));
    }

//            'curna1' => 'required|unique:Settingexchange,curna1',

    public function exchangestore()
    {
        $data = Input::All();
        $rules = array(
            'cur_na1' => 'required',
            'cur_na2' => 'required',
            'cur_ma1' => 'required',
            'date' => 'required',
            'cur_ma2' => 'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->action('front_controller@exchange')->withErrors($validation);
        }

        $Settingexchange = new settingexchange;
        $Settingexchange->curna1 = $data['cur_na1'];
        $Settingexchange->cur_na2 = $data['cur_na2'];
        $Settingexchange->cur_ma1 = $data['cur_ma1'];
        $Settingexchange->cur_ma2 = $data['cur_ma2'];
        $Settingexchange->date = $data['date'];
        $Settingexchange->user=$_SESSION['access'];
        $Settingexchange->save();
        return redirect()->action('front_controller@exchange')->with('success', 'Unit Successfully Registered!');
    }

    public function exchangeselectupdates($id)
    {
        $row = DB::select('select * from Setting_exchange where id = :id', ['id' => $id]);
        return view('page.Setting_exchange_update', compact("row"));
    }

    public function exchangeupdates()
    {
        $data = Input::All();
        $rules = array(
            'cur_ma1' => 'required',
            'cur_ma2' => 'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation);
        }
        $Settingexchange = Settingexchange::find($data['id']);
        $Settingexchange->cur_ma1 = $data['cur_ma1'];
        $Settingexchange->cur_ma2 = $data['cur_ma2'];
        $Settingexchange->date = $data['date'];
        $Settingexchange->save();
        return redirect()->action('front_controller@exchange')->with('success', 'Unit Successfully Updated!');
    }

    public function exchangedelete($id)
    {

        $deleted = DB::delete('delete from Setting_exchange where id = :id', ['id' => $id]);
        $row = DB::table("Setting_exchange")->get();

        return view("page.Setting_exchange", compact("row"))->with('deleted', 'deleted');
    }
    //###################user profile ######################
    public function userprofile()
    {
        $userShow=DB::table('users')->paginate(30);
        return view('page.user_view',['userShow'=>$userShow]);
    }
    public function userstore(Request $request)
    {
       $this->validate($request,[
           'name'=>'required',
           'l_name'=>'required',
           'email'=>'required|email',
           'password'=>'required',
           'image'=>'required',
           'type'=>'required'
       ]);
       $store_user=new User();
       $store_user->f_name=$request['name'];
       $store_user->l_name=$request['l_name'];
       $store_user->email=$request['email'];
       $store_user->type=$request['type'];
       $store_user->state=0;
       $store_user->password=bcrypt($request['password']);
       if ($request->hasFile('image')) {
        $photo = $request->file('image');
        $imagename = time() . '.' . $photo->getClientOriginalExtension();
        $destinationPath=public_path('assets/image/');
        $photo->move($destinationPath,$imagename);
        $data['photo']=$imagename;
        }
        $store_user->photo=$imagename;
        $store_user->save();
        return redirect()->back()->with('success', 'The Record Successfully Saved!');
    }
    public function updateUser($id)
    {
        $find_user=DB::table('users')->where('id',$id)->first();
        return view('page.edit_user',['find_user'=>$find_user]);
    }
    public function update_user(Request $request)
    {
        $first_user_find=User::find($request['user_id']);
        $this->validate($request,[
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required|email',
            'type'=>'required'
        ]);
        $first_user_find->f_name=$request['f_name'];
        $first_user_find->l_name=$request['l_name'];
        $first_user_find->email=$request['email'];
        $first_user_find->password=bcrypt($request['password']);
        $first_user_find->type=$request['type'];
        $first_user_find->state=0;
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $imagename = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath=public_path('assets/image/');
            $photo->move($destinationPath,$imagename);
            $data['photo']=$imagename;
            }
            $first_user_find->photo=$imagename;
            
            $first_user_find->save();
        return redirect()->back()->with('success','The selected user updated succesfully!');    
    }
    public function delete_user($id)        
    {
        $first_user_del=User::find($id);
        $first_user_del->delete();
        $this->removeuserPhoto($first_user_del->photo);
        return redirect()->back()->with('success','The selected user deleted succesfully!');  
    }
    public function userUpdateEmail()
    {
        $data = Input::All();
        $rules = array(
            'email' => 'required',
            'email1' => 'required',
            'photo'=>'required|mimes:jpg,png,jpeg,gif,bmp|max:1024'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->action('profile@userprofile')->withErrors($validation);
        }
        $Settingwards = User::find($_SESSION['access']);
        if(isset($data['photo'])){
            $file = Input::file('photo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            Input::file('photo')->move(public_path('/assets/image/'), $filename);
            $Settingwards->photo= $filename;
        }
        $Settingwards->email = $data['email'];
        $oldPhoto=$Settingwards->photo;
        if($oldPhoto !== $Settingwards->photo) {
            $this->removeuserPhoto($oldPhoto);
        }
        $Settingwards->save();
        return redirect()->action('front_controller@userprofile')->with('success', 'Email Successfully Updated!');

    }
    private function removeuserPhoto($photo)
    {
        if(!empty($photo))
        {
            $file_path=public_path('/assets/image/'). '/'. $photo;

            if(file_exists($file_path)) unlink($file_path);
        }
    }
    public function userUpdatePassword()
    {
        $data = Input::All();
        $rules = array(
            'curP' => 'required',
            'newP' => 'required',
            'conP' => 'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->action('front_controller@userprofile')->withErrors($validation);
        }
        $Settingwards = User::find($_SESSION['access']);
        if ($data['newP'] == $data['conP'] && $Settingwards->password== $data['curP']) {
            $Settingwards->password = $data['newP'];
            $Settingwards->save();
            return redirect()->action('front_controller@userprofile')->with('success', 'Password Successfully Updated!');
        }else{
            return redirect()->action('front_controller@userprofile')->with('error', 'error');

        }
    }
    //###########################add company########################
    public function add_comp()
    {
        $CompShow=Comp::take(10000)->orderBy('id','desc')->paginate(20);
        return view('page.add_comp',['CompShow'=>$CompShow]);
    }
    public function add_company(Request $request)
    {
        $rules = array(
            'comp_name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray(),));
        } else {
            $data = new Comp();
            $data->comp_name = $request->comp_name;
            $data->save();
            return response()->json($data);
        }
    }
    public function deleteComp(Request $req)
    {
        Comp::find($req->id)->delete();
        return response()->json();
    }
    public function editComp(Request $req)
    {
        $data = Comp::find($req->id);
        $data->	comp_name = $req->name;
        $data->save();
        return response()->json($data);
    }
    public function searchComp(Request $request)
    {
        $term='%'.$request->term.'%';
        $CompShow=Comp::where('comp_name','LIKE',$term)->orWhere('comp_name','LIKE',$term)->paginate(20);
        return view('page.add_comp',['CompShow'=>$CompShow]);
    }
    //###########################add Customer########################
     public function seeCustomerRecord($id)
    {
       $allCustomer=DB::table('customers')->where('id',$id)->first();

            $total_purchase = DB::table('stocks')
        ->join('customers', 'customers.id', '=', 'stocks.customer_id')
        ->select(DB::raw('sum(stocks.quantity*stocks.net_price) AS total'))
        ->where('stocks.customer_id', $id)
        ->first();

        $total_sales = DB::table('sales')
            ->join('customers', 'customers.id', '=', 'sales.customer_id')
            ->select(DB::raw('sum(sales.quantity*sales.sales_price) AS total'))
            ->where('sales.customer_id', $id)
            ->first();
       return view('page.customer_details',compact('allCustomer','total_purchase','total_sales'));
    }
    
    public function add_customer()
    {
        $CustShow=Customer::take(10000)->orderBy('id','desc')->paginate(20);
        return view('page.add_customer',['CustShow'=>$CustShow]);
    }
    public function add_custo(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'customer_add'=>'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray(),));
        } else {
            $data = new Customer();
            $data->name = $request->name;
            $data->address=$request->customer_add;
            $data->phone=$request->customer_phone;
            $data->p_contact=$request->customer_p_contact;
            $data->tin=$request->tin;
            $data->lic=$request->lic;
            $data->reg=$request->reg;
            $data->save();
            $customer_id=DB::table('customers')->orderBy('id', 'desc')->first();
            DB::table('cash_paids')->insert([
                'customer_id'=>$customer_id->id,
                'user_id'=>$_SESSION['access'],
                'pay_amount'=>0,
                'tl_amount'=>0
            ]);
            return response()->json($data);
        }
    }
    public function deletecustomer(Request $req)
    {
        Customer::find($req->id)->delete();
        return response()->json();
    }
    public function editcustomer(Request $req)
    {
        $data = Customer::find($req->id);
        $data->name = $req->name;
        $data->address=$req->address;
        $data->phone=$req->phone;
        $data->p_contact=$req->p_contact;
        $data->tin=$req->tin;
        $data->lic=$req->lic;
        $data->reg=$req->reg;
        $data->save();
        return response()->json($data);
    }
    public function searchcustomer(Request $request)
    {
        $term='%'.$request->term.'%';
        $CustShow=Customer::where('name','LIKE',$term)->orWhere('name','LIKE',$term)->paginate(20);
        return view('page.add_customer',['CustShow'=>$CustShow]);
    }
    //################view company sales###########
    public function cashpSearch()
    {
        $name = Input::get("id");
        if (!empty($name)) {
            
            $row = DB::table("cash_payments")->orderBy('id', 'desc')->where('id',$name)->paginate('30');
            $ech = DB::table("cash_payments")->orderBy('id', 'desc')->paginate('30')->count();
            return view('page.cash_payment')->with('row', $row)->with('check', $ech);
        } else {
            return redirect()->action('front_controller@cash_payment');
        }
    }
    public function cash_payment()
    {
        $row = DB::table("cash_payments")->orderBy('id', 'desc')->paginate('30');
        $ech = DB::table("cash_payments")->orderBy('id', 'desc')->paginate('30')->count();
        return view("page.cash_payment")->with('row', $row)
            ->with('check', $ech);
    }
    public function cash_payment_add()
    {
        $data = Input::All();
        $rules = array(
            'customer_id' => 'required',
            'date' => 'required',
            'pa' => 'required',
            'serial'=>'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $find_customer_total_loan= DB::table('cash_paids')->where('customer_id',$data['customer_id'])->first();
        $t_loan=$find_customer_total_loan->tl_amount;
        $n_loan=$t_loan-$data['pa'];
        DB::table('cash_payments')->insert([
            'customer_id'=>$data['customer_id'],
            'date'=>$data['date'],
            'pay_amount'=>$data['pa'],
            'user_id'=>$data['user_id'],
            'serail_number'=>$data['serial'],
            'tl_amount'=>$find_customer_total_loan->tl_amount,
        ]);
        $sum=0;
        $t_paid=$find_customer_total_loan->pay_amount;
        $sum=$sum+$t_paid+$data['pa'];
        DB::table('cash_paids')->where('customer_id', $data['customer_id'])->update(['tl_amount' => $n_loan,'pay_amount'=>$sum]);
        return redirect()->back()->with('success', 'The Record Successfully Saved!');
    }
    public function cash_payment_detail($id)
    {
        $row = DB::select('select * from cash_payments where id = :id', ['id' => $id]);
        return view("page.cash_payment_detail", compact("row"));
    }
    public function cash_payment_updates($id)
    {
        $row = DB::select('select * from cash_payments where id = :id', ['id' => $id]);
        return view("page.cash_payment_update", compact("row"));
    }
    public function cash_payment_updatesd()
    {
        $data = Input::All();
        $rules = array(
            'date' => 'required',
            'amount' => 'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $sum=0;
        $old_record=DB::table('cash_payments')->where('id',$data['id'])->first();
        $old_pay=$old_record->pay_amount;
        if($old_record->pay_amount>=$data['amount']){
        $new_tlAa=$old_record->tl_amount-$old_pay;
        DB::table('cash_payments')->where('id',$data['id'])->update([
            'date'=>$data['date'],
            'pay_amount'=>$data['amount'],
            'user_id'=>$_SESSION['access']
        ]);
        $customer_old_rec=DB::table('cash_paids')->where('customer_id',$old_record->customer_id)->first();
        $old_p_amount=$customer_old_rec->pay_amount;
        $nlala=$old_pay-$data['amount'];
        $newP=$old_p_amount-$nlala;
        DB::table('cash_paids')->where('customer_id',$old_record->customer_id)->update(['tl_amount'=>$new_tlAa,'pay_amount'=>$newP]);
        }
        else{
            $sum=$sum+$old_pay+$data['amount'];
            $new_tlA=$old_record->tl_amount-$sum;
            DB::table('cash_payments')->where('id',$data['id'])->update([
                'date'=>$data['date'],
                'pay_amount'=>$sum,
                'user_id'=>$_SESSION['access']
            ]);
            $customer_old_rec=DB::table('cash_paids')->where('customer_id',$old_record->customer_id)->first();
            $old_p_amount=$customer_old_rec->pay_amount;
            $newP=$old_p_amount+$data['amount'];
            DB::table('cash_paids')->where('customer_id',$old_record->customer_id)->update(['tl_amount'=>$new_tlA,'pay_amount'=>$newP]);    
        }
        return redirect()->back()->with('success', 'Unit Successfully Updated!');
    }
    public function cash_payment_delete($id)
    {
        $old_record=DB::table('cash_payments')->where('id',$id)->first();
        $customer_old_rec=DB::table('cash_paids')->where('customer_id',$old_record->customer_id)->first();
        $old_p_amount=$customer_old_rec->pay_amount;
        $old_l_amount=$customer_old_rec->tl_amount;
        $newP=$old_p_amount-$old_record->pay_amount;
        $new_tlA=$old_l_amount+$old_record->pay_amount;
        DB::table('cash_paids')->where('customer_id',$old_record->customer_id)->update(['tl_amount'=>$new_tlA,'pay_amount'=>$newP]);
        $deleted = DB::delete('delete from cash_payments where id = :id', ['id' => $id]);
        return redirect()->back()->with('success', 'Unit Successfully Deleted!');
    }
    // ##########cash receives functions###########
    public function cashcSearch()
    {
        $name = Input::get("id");
        if (!empty($name)) {
            
            $row = DB::table("cash_receives")->orderBy('id', 'desc')->where('id',$name)->paginate('30');
            $ech = DB::table("cash_receives")->orderBy('id', 'desc')->paginate('30')->count();
            return view("page.cash_receive")->with('row', $row)
            ->with('check', $ech);
        } else {
            return redirect()->action('front_controller@cash_receives');
        }
    }
    public function cash_receives()
    {
        $row = DB::table("cash_receives")->orderBy('id', 'desc')->paginate('30');
        $ech = DB::table("cash_receives")->orderBy('id', 'desc')->paginate('30')->count();
        return view("page.cash_receive")->with('row', $row)
            ->with('check', $ech);
    }
    public function cash_receive_add()
    {
        $data = Input::All();
        $rules = array(
            'customer_id' => 'required',
            'date' => 'required',
            'pa' => 'required',
            'serial'=>'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $find_customer_total_loan= DB::table('customers')->where('id',$data['customer_id'])->first();
        $t_loan=$find_customer_total_loan->l_amount;
        $n_loan=$t_loan-$data['pa'];
        DB::table('cash_receives')->insert([
            'customer_id'=>$data['customer_id'],
            'date'=>$data['date'],
            'pay_amount'=>$data['pa'],
            'user_id'=>$data['user_id'],
            'serail_number'=>$data['serial'],
            'tl_amount'=>$find_customer_total_loan->l_amount,
        ]);
        $sum=0;
        $t_paid=$find_customer_total_loan->p_amount;
        $sum=$sum+$t_paid+$data['pa'];
        DB::table('customers')->where('id', $data['customer_id'])->update(['l_amount' => $n_loan,'p_amount'=>$sum]);
        return redirect()->back()->with('success', 'The Record Successfully Saved!');
    }
    public function cash_receive_detail($id)
    {
        $row = DB::select('select * from cash_receives where id = :id', ['id' => $id]);
        return view("page.cash_receive_detail", compact("row"));
    }
    public function cash_receive_updates($id)
    {
        $row = DB::select('select * from cash_receives where id = :id', ['id' => $id]);
        return view("page.cash_receive_update", compact("row"));
    }
    public function cash_receive_updatesd()
    {
        $data = Input::All();
        $rules = array(
            'date' => 'required',
            'amount' => 'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $sum=0;
        $old_record=DB::table('cash_receives')->where('id',$data['id'])->first();
        $old_pay=$old_record->pay_amount;
        if($old_record->pay_amount>=$data['amount']){
        $new_tlAa=$old_record->tl_amount-$old_pay;
        DB::table('cash_receives')->where('id',$data['id'])->update([
            'date'=>$data['date'],
            'pay_amount'=>$data['amount'],
            'user_id'=>$_SESSION['access']
        ]);
        $customer_old_rec=DB::table('customers')->where('id',$old_record->customer_id)->first();
        $old_p_amount=$customer_old_rec->p_amount;
        $nlala=$old_pay-$data['amount'];
        $newP=$old_p_amount-$nlala;
        DB::table('customers')->where('id',$old_record->customer_id)->update(['l_amount'=>$new_tlAa,'p_amount'=>$newP]);
        }
        else{
            $sum=$sum+$old_pay+$data['amount'];
            $new_tlA=$old_record->tl_amount-$sum;
            DB::table('cash_receives')->where('id',$data['id'])->update([
                'date'=>$data['date'],
                'pay_amount'=>$sum,
                'user_id'=>$_SESSION['access']
            ]);
            $customer_old_rec=DB::table('customers')->where('id',$old_record->customer_id)->first();
            $old_p_amount=$customer_old_rec->p_amount;
            $newP=$old_p_amount+$data['amount'];
            DB::table('customers')->where('id',$old_record->customer_id)->update(['l_amount'=>$new_tlA,'p_amount'=>$newP]);    
        }
        return redirect()->back()->with('success', 'Unit Successfully Updated!');
    }
    public function cash_receive_delete($id)
    {
        $old_record=DB::table('cash_receives')->where('id',$id)->first();
        $customer_old_rec=DB::table('customers')->where('id',$old_record->customer_id)->first();
        $old_p_amount=$customer_old_rec->p_amount;
        $old_l_amount=$customer_old_rec->l_amount;
        $newP=$old_p_amount-$old_record->pay_amount;
        $new_tlA=$old_l_amount+$old_record->pay_amount;
        DB::table('customers')->where('id',$old_record->customer_id)->update(['l_amount'=>$new_tlA,'p_amount'=>$newP]);
        $deleted = DB::delete('delete from cash_receives where id = :id', ['id' => $id]);
        return redirect()->back()->with('success', 'Unit Successfully Deleted!');
    }
    public function drm_report()
    {
        return view("page.rdm_report");
    }

    public function create_report_rdm()
    {
        $section = Input::get("section");
        $from = Input::get("from");
        $to = Input::get("to");
        return view("page.rdm_report")->with('section', $section)->with('start', $from)->with('end', $to);
    }

    //###setting unit##############
    public function unit()
    {

        $row = DB::table("setting_unit")->orderBy('id', 'desc')->get();
        return view("page.setting_unit", compact("row"));
    }

    public function unitstore()
    {
        $data = Input::All();
        $rules = array(
            'unit_na' => 'required|unique:Setting_unit,unit_na'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation);
        }

        $Settingunit = new settingunit;
        $Settingunit->unit_na = $data['unit_na'];

        $Settingunit->save();
        return redirect()->action('front_controller@unit')->with('success', 'Unit Successfully Registered!');

    }

    public function unitselectupdates($id)
    {
        $row = DB::select('select * from setting_unit where id = :id', ['id' => $id]);
        return view('page.setting_unit_update', compact("row"));
    }

    public function unitupdates()
    {
        $data = Input::All();
        $rules = array(
            'unit_na' => 'required'
        );
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->action('SettingControllers\unit@unit')->withErrors($validation);
        }
        $Settingunit = Settingunit::find($data['id']);
        $Settingunit->unit_na = $data['unit_na'];
        $Settingunit->save();
        return redirect()->action('front_controller@unit')->with('success', 'Unit Successfully Updated!');
    }

    public function unitdelete($id)
    {
        DB::delete('delete from setting_unit where id ='.$id);
        $row = DB::table("setting_unit")->get();

        return view("page.setting_unit", compact("row"))->with('deleted', 'deleted');
    }
}
