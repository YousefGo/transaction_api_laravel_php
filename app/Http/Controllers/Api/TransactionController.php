<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Resources\TransactionResource;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\StoreCategoryRequest;


class TransactionController extends Controller
{
    //
    public function index()
    {
        //
        return  TransactionResource::collection(Transaction::all())  ;
    }
    public function index_2()
    {
        //
        return Category::select('id','name')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        //
        return  new  TransactionResource(Transaction::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
        return  new TransactionResource($transaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTransactionRequest $request, Transaction $transaction)
    {
        //
       $category->update($request->validated());
       return  new TransactionResource($transaction) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
        $transaction->delete();
        return  response()->noContent();
    }
}
