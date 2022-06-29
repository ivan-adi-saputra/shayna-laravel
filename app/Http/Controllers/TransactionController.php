<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Routing\Controller;
use App\Http\Requests\TransactionRequest;
use App\Http\Requests\setStatusRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transaction::all();
        return view('pages.transaction.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::with('details.product')->findOrFail($id);
        
        return view('pages.transaction.show', [
            'item' => $item,
            'product' => Product::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);
        return view('pages.transaction.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all(); 

        $item = Transaction::findOrFail($id);
        $item->update($data);
        // Transaction::where('id', $transaction->id)
        //             ->update($data); 
        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::destroy($transaction->id);
        // $item = Transaction::findOrFail($id); 
        // $item->delete();

        return redirect()->route('transactions.index');
    }

    public function setStatus(setStatusRequest $request, $id)
    {
        $request->status;

        $item = Transaction::findOrFail($id); 
        $item->transaction_status = $request->status;

        $item->save();

        return redirect()->route('transactions.index');
    }
}
