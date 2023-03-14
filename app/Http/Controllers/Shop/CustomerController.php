<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Customer::class);
        
        $customers = Customer::all();

        return view('admin.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id){
        $this->authorize('delete', Customer::class);

        $customers = Customer::find($id);
        $customers->delete();
        alert()->success('Khách hàng đã được đưa vào thùng rác!');
        return redirect()->route('customer.index');

    }
    public function trash()
    {
        $this->authorize('viewAny', Customer::class);

        $softs = Customer::onlyTrashed()->get();
        return view('admin.customers.trash', compact('softs'));
    }
    public function restore($id)
    {
        $this->authorize('restore', Customer::class);

        try {
            $softs = Customer::withTrashed()->find($id);
            $softs->restore();
            alert()->success('Khôi phục khách hàngThành Công!');
            return redirect()->route('customer.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('customer.index');
        }
    }
     //xóa vĩnh viễn
     public function deleteforever($id)
     {
        $this->authorize('forceDelete', Customer::class);
         try {
             $softs = Customer::withTrashed()->find($id);
             $softs->forceDelete();
           alert()->success('Xóa Vĩnh Viễn Thành Công!');
             return redirect()->route('customer.index');
         } catch (\exception $e) {
             Log::error($e->getMessage());
             toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
             return redirect()->route('customer.index');
         }
     }

}