<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Status;
use App\Models\Order;
Use Alert;
use Cart;
class CartController extends Controller
{
    //
    private $cartTotalQuantity;

    public function index()
    {
        $products = Cart::getContent();
        return view('public.cart.index',[
            'products' => $products
        ]);
    }




    // for ajax



    public function store(Request $request, Product $product)
    {


        $id = $product->id;
        $name = $product->name;
        $price = $product->price;
        $quantity = 1;
        if($request->has('quantity'))
        {
            $quantity = $request->post('quantity');
        }

        Cart::add($id, $name, $price, $quantity, array() )->associate('App\Models\Product');
        return response()->json($this->getCartTotalQuantity(), 200);

    }

    public function destroy(Request $request, Product $product)
    {
        Cart::remove($product->id);
        return response()->json('Đã xóa sản phẩm ra khỏi giỏ hàng', 200);
    }

    public function update(Request $request, Product $product)
    {
        $id = $product->id;
        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        return response()->json([
            'cartPrice' => $this->getCartPrice($id),
            'TotalQuantity' => $this->getCartTotalQuantity(),
            'subTotal' => $this->getSubTotal()
        ], 200);
    }
    public function getSubTotal()
    {
        return Cart::getSubTotal();
    }
    public function getCartPrice($id){
        return Cart::get($id)->getPriceSum();
    }
    public function getCartTotalQuantity ()
    {
        return Cart::getTotalQuantity();
    }
    public function setCartTotalQuantity ()
    {
        return $this->cartTotalQuantity = Cart::getTotalQuantity();
    }




    public function checkout(Request $request)
    {
        $status = Status::where('slug', Status::CHUA_XU_LY)->first();
        $order = new Order();
        $order->price =  Cart::getSubTotal();

        $order->address = $request->post('address');
        $order->phone = $request->post('phone');
        $order->name = $request->post('name');
        $order->mail = $request->post('mail');


        $order->status()->associate($status);

        if($order->save())
        {
            $this->updateOrderProduct($order);
            $this->removeAllCart();
            Alert::success( 'Thành công','Đặt hàng thành công chúng tôi sẽ liên hệ lại với bạn');
            return redirect()->route('home.index');
        }else{
            return redirect()->back();
        }
    }
    public function updateOrderProduct(Order $order)
    {
        $products = Cart::getContent();
        foreach ($products as $product)
        {
            $order->products()->attach($product->id, [
                'quantity' => $product->quantity
            ]);
        }
    }
    public function removeAllCart()
    {
        $products = Cart::getContent();
        foreach ($products as $product)
        {
            Cart::remove($product->id);
        }
    }
}
