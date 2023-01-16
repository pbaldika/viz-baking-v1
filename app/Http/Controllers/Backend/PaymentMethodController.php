<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PaymentMethodRequest;
use App\Models\PaymentMethod;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Neonexxa\BillplzWrapperV3\BillplzCollection;
use Neonexxa\BillplzWrapperV3\BillplzBill;
use App\Models\Product;


class PaymentMethodController extends Controller
{
    public function index(): View
    {
        $this->authorize('access_payment_method');

        $paymentMethods = PaymentMethod::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')
            ->paginate(\request()->limitBy ?? 10);

        return view('backend.payment_methods.index', compact('paymentMethods'));
    }

    public function create(): View
    {
        $this->authorize('create_payment_method');

        return view('backend.payment_methods.create');
    }

    public function store(PaymentMethodRequest $request): RedirectResponse
    {
        $this->authorize('create_payment_method');

        PaymentMethod::create($request->validated());

        return redirect()->route('admin.payment_methods.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function show(PaymentMethod $paymentMethod): View
    {
        $this->authorize('show_payment_method');

        return view('backend.payment_methods.show', compact('paymentMethod'));
    }

    public function edit(PaymentMethod $paymentMethod): View
    {
        $this->authorize('edit_payment_method');

        return view('backend.payment_methods.edit', compact('paymentMethod'));
    }

    public function update(PaymentMethodRequest $request, PaymentMethod $paymentMethod): RedirectResponse
    {
        $this->authorize('edit_payment_method');

        $paymentMethod->update($request->validated());

        return redirect()->route('admin.payment_methods.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(PaymentMethod $paymentMethod): RedirectResponse
    {
        $this->authorize('delete_payment_method');

        $paymentMethod->delete();

        return redirect()->route('admin.payment_methods.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }

    public function createBill(Request $request){
        
        //dd($request);
        $res0 = new BillplzBill;
        // $res0->collection_id = $request->collection; // which collection you want to park this bill under
        $res0->collection_id = $request->collection; // which collection you want to park this bill under
        $res0->description = $request->desc; // bill description
        $res0->email = $request->email; // client email
        $res0->name = $request->name; // cleint name
        $res0->amount = $request->totPrice*100; // by default in cent
        $res0->callback_url = "http://127.0.0.1:8000"; // callback url after execution
        // and other optional params
        $res0 = $res0->create_bill();
        list($rhead ,$rbody, $rurl) = explode("\n\r\n", $res0);
        $bplz_result = json_decode($rurl);   

        // return redirect($bplz_result->url);
    }

}