<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandeItem;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Commande::paginate(2);
        $commande_items = CommandeItem::get();
        //dd($commande_items);
        return view('admin.orders.index', compact('orders', 'commande_items'));
    }


    public function voir()
    {
        return view('frontend.message.contact');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        return view('admin.orders.edit', compact('commande') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Commande $commande, Request $request)
    {
        $request->validate(['payment_status'=> 'required', ]);
        $commande->payment_status = $request->payment_status;
        $commande->save();
        return redirect()->route('orders.list')->withInput()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        Commande::destroy($commande->id);
        return redirect()->route('orders.list')->with('success', 'Product Deleted Successfuly!!');
    }
}
