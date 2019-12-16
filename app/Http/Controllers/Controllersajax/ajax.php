<?php
namespace App\Http\Controllers\Controllersajax;
use App\Http\Controllers\Controller;
use DB;
class ajax extends Controller
{
    public function productName($id)
    {
        $ros = DB::table("stocks")->where('product_id',$id)->get();
        $pord=DB::table('products')->where('id',$id)->first();
        $curr="";
        $tot = 0;
        foreach ($ros as $ro) {
            $tot = $tot + $ro->quantity;
        }
            echo "Product Name :". $pord->product_name."\n";
            echo "Net Price : " . $ro->net_price ."\n";
            echo "Sales Price : " . number_format($ro->sales_price) . "\n";
            echo "Quantity : " . number_format($tot) . "" . "\n";
    }
    public function productAddQ($customer_id,$product_id,$quantity,$mid,$phone,$name,$salep)
    {
        // echo "hi".$customer_id.$product_id.$quantity.$mid.$c_c_money;
        // exit;
       
            DB::table('quotations')->insert([         
                'customer_id' => $customer_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
                'bene' => $mid,
                'one_name'=>$name,
                'one_phone'=>$phone,
                'date'=>date('Y-m-d'),
                'sales_price'=>$salep
            ]);
            echo "<label>item added succesfully </label>";
            if(isset($mid)){
                $ros = DB::table("quotations")->where('bene',$mid)->get();
            $curr="";
            $tot = 0;
           
            echo "<table class='table responsive table-borderd'>";
            echo "<thead><tr><th>Part Number/Name</th><th>Quantity</th><th>Sales Price</th></tr></thead>";
            foreach ($ros as $ro) {
                echo "<tbody><tr>";
               
                $product_Nname=DB::table('products')->where('id',$ro->product_id)->get();
                foreach($product_Nname as $prodName){
                    
                echo "<td>". $prodName->product_s ."-".$prodName->product_name . "</td>";
                }
                echo "<td>".$ro->quantity."</td>";
                echo "<td>".$ro->sales_price."</td>";
                echo "</tr></tbody>";
            }
            echo "</table>";
        }else{
            echo "Error Try Again";
        }
        
       
    }
    public function productAdd($customer_id,$product_id,$quantity,$mid,$c_c_money,$phone,$name,$salep,$c_date)
    {
        // echo "hi".$customer_id.$product_id.$quantity.$mid.$c_c_money;
        // exit;
       
            DB::table('sales')->insert([         
                'customer_id' => $customer_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
                'bene' => $mid,
                'sales_type' => $c_c_money,
                'one_name'=>$name,
                'one_phone'=>$phone,
                'date'=>$c_date,
                'sales_price'=>$salep
            ]);
            echo "<label>item added succesfully </label> \n";
            // echo "<a href='product_salesdetail/{{ $mid }}'>buttin</a>";
            if(isset($mid)){
            $ros = DB::table("sales")->where('bene',$mid)->get();
        $curr="";
        $tot = 0;
       
        echo "<table class='table responsive table-borderd'>";
        echo "<thead><tr><th>Part Number/Name</th><th>Quantity</th><th>Sales Price</th></tr></thead>";
        foreach ($ros as $ro) {
            echo "<tbody><tr>";
           
            $product_Nname=DB::table('products')->where('id',$ro->product_id)->get();
            foreach($product_Nname as $prodName){
                
            echo "<td>". $prodName->product_s ."-".$prodName->product_name . "</td>";
            }
            echo "<td>".$ro->quantity."</td>";
            echo "<td>".$ro->sales_price."</td>";
            echo "</tr></tbody>";
        }
        echo "</table>";
    }else{
        echo "Error Try Again";
    }
        
       
    }
    public function productList_clicked($bene_id)
    {
        
        
    }
    public function money_receive_add($id)
    {
        // echo $id;
        // exit;
        $ros = DB::select("select * from customers where id='$id'");
        foreach ($ros as $ro) {
            $payb=$ro->l_amount;
            // $cell=$ro->phone;
            // $add=$ro->address;
            // $p_contact=$ro->p_contact;
        }
        if($payb>0){
        //echo "Total Debt : " . number_format($tot) . "\n";
        return \response()->json($payb);
        // echo "Cell:&nbsp;".$cell."&nbsp;\n";
        // echo "Address:&nbsp;".$add."&nbsp;\n";
        // echo "Point of contact:&nbsp;".$p_contact."&nbsp;";
        }else{
            return \response()->json("No Loan money on customer");
        }
    }
    public function money_payment_add($id)
    {
        // echo $id;
        // exit;
        $ros =DB::table('cash_paids')->where('customer_id',$id)->get();
        $sum=0;
        foreach ($ros as $ro) {
            $sum=$sum+$ro->tl_amount;
            //$sales_type_check=$ro->sales_type;
            // $cell=$ro->phone;
            // $add=$ro->address;
            // $p_contact=$ro->p_contact;
        }
       // return \response()->json($jj);
        if($sum){
        //echo "Total Debt : " . number_format($tot) . "\n";
        return \response()->json($sum);
        // echo "Cell:&nbsp;".$cell."&nbsp;\n";
        // echo "Address:&nbsp;".$add."&nbsp;\n";
        // echo "Point of contact:&nbsp;".$p_contact."&nbsp;";
        }else{
            return \response()->json("No Loan money on un");
        }
    }
   
}