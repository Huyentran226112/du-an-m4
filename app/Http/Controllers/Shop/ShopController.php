<?php
namespace App\Http\Controllers\Shop;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Doctrine\Common\Cache\Cache;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function checklogin(LoginRequest $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // dd($arr);
        if (Auth::guard('customers')->attempt($arr)) {
            Session::push('customer', $arr['email']);



            return redirect()->route('shop.index');
        }
        else {


            return redirect()->route('shop.login');
        }

    }

    public function index()
    {
        if (isset(Auth::guard('customers')->user()->id)) {
            $user = Auth::guard('customers')->user()->id;
            $carts = session()->get('carts'.$user);
            if (isset($carts[Auth::guard('customers')->user()->id])){
                $carts = array_values($carts);
            }
        } else {
                $carts = [];
            }
        $products = Product::get();
        $param = [
            'products' => $products,
        ];
        return view('shop.includes.main', $param);
    }
    public function home()
    {
        $products = Product::get();
        $param = [
            'products' => $products
        ];
        return view('shop.home', $param);
    }


    public function show(string $id)
    {
        $product = Product::find($id);
        // dd($product);
        return view('shop.includes.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    //view gi??? h??ng
    public function cart()
    {
        if (isset(Auth::guard('customers')->user()->id)) {
            try {
                $products = Product::search()->get();
                $user = Auth::guard('customers')->user()->id;
                $carts = Cache::get('carts'.$user);
                if ($carts) {

                    $carts = array_values($carts);
                    $param = [
                        'products' => $products,
                        'carts' => $carts,
                    ];
                } else {
                    $carts = [];
                    $param = [
                        'products' => $products,
                        'carts' => $carts,
                    ];
                }
                return view('shop.cart', $param);
            } catch (\Exception$e) {
                Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
                $carts = [];
                $products = [];
                    $param = [
                        'products' => $products,
                        'carts' => $carts,
                    ];
                return view('shop.includes.cart', $param);
            }
        } else {
            return view('shop.auth.login');
        }
    }

    public function register()
    {
        return view('shop.auth.register');
    }

    public function checkregister(RegisterRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        try {
            $customer->save();
            return redirect()->route('viewlogin');
        } catch (\Exception $e) {
            Log::error("message:".$e->getMessage());
        }

            if ($request->password == $request->confirmpassword) {
                $customer->save();
                return redirect()->route('shop.index');
            }else{
                return redirect()->route('shop.register');

            }
    }
    public function login()
    {
        return view('shop.auth.login');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('shop.login');
      }

    public function category_detail($id,Request $request){
          //1``: lays danh sach nhung s???n ph???m c?? c??ng danh m???c(c??ng  category_id)
          $products = Product::where ('category_id',[$id])->get();
            $param =[
            'products' => $products
            ];
        //   tr??? v??? cho view hi???n th??? nh??ng s???n p[h???m c?? c??ng danh m???c SP ????
        return view('shop.layouts.categorydetail',$param) ;
    }
    public function order(Request $request){
        //l????y emai cu??a cuustomer
        $email= Session::get('customer');
        // l????y id product(????????c push khi ng??????i dung click ??????t ha??ng())
        $arr = [
            'id' => $request->id,
            'quantity' => $request->quantity
        ];
        $product=Session::get('product');
        Session::push('customer', $arr['id'],['quantity']);
        $param =[
            'products'=>$product
        ];
        dd($product);
        $product_id=$product[0];
        $product_quantity=$product[0];
        return view('shop.includes.order',$param);
    }
}
