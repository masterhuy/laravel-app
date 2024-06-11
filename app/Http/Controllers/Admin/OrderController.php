<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(5);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        $productOrders = ProductOrder::all();

        return view('admin.orders.show', compact('order', 'productOrders'));
    }

    public function edit($id){
        // $contact = Contact::find($id);
        // return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id){
        // $contact = Contact::find($id);
        // $dataUpdate = $request->all();
        // $contact->update($dataUpdate);
        // return redirect()->route('contacts.index')->with(['message' => 'Update contact successfully']);
    }

    public function destroy($id){
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('orders.index')->with(['message' => 'Delete order successfully']);
    }

    public function destroySelected(Request $request)
    {
        $orderIds = $request->input('order_ids', []);

        if (!empty($orderIds)) {
            Order::whereIn('id', $orderIds)->delete();
        }

        return redirect()->back()->with(['message' => 'Delete selected order successfully']);
    }
}
