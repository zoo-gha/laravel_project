<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use App\Models\Product;
use App\Models\CommandeItem;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        //dd(session()->get('cart'));
        return view('frontend.order.checkout');
    }

    public function order()
    {
        return view('frontend.order.checkout');
    }

    public function passeOrder(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'user_name' => 'required',
            'user_adresse' => 'required',
            'user_city' => 'required',
            'user_phone' => 'required',
            'payment_status' => 'required'
        ]);
        if(session()->has('cart') && session()->has('commande_item')){
            $total = 0;
            foreach(session('cart') as $id => $details){
                $total += $details['price'] * $details['quantity'];
            }
            $commande = new Commande();
            $commande->user_id = auth()->user()->id;
            $commande->status = 'Passed';
            $commande->order_date = date('Y-m-d');
            $commande->payment_status= $request->payment_status;
            $commande->payment_method = 'On Delivery';
            $commande->grand_total = $total;
            $commande->user_name = $request->user_name;
            $commande->user_email = auth()->user()->email;
            $commande->user_phone = $request->user_phone;
            $commande->user_city = $request->user_city;
            $commande->user_adresse = $request->user_adresse;
            $commande->save();
            foreach ((array) session('cart') as $id => $details) {
                $product = Product::where('id', $id)->get();
                //dd($product->weight);
                $commandeItem = new CommandeItem();
                $commandeItem->qty = $details['quantity'];
                $commandeItem->base_price = $details['price'];
                $commandeItem->base_total = $details['quantity']*$details['price'];
                $commandeItem->sub_total = $details['quantity']*$details['price'];
                $commandeItem->name = $details['product_name'];
                $commandeItem->weight = 250.25;
                $commandeItem->product_id = $id;
                $commandeItem->commande_id = $commande->id;
                $commandeItem->save();
                //dd($commandeItem);

            }
            session()->forget(['cart', 'commande_item']);
            return redirect()->route('home')->withInput()->with('success', 'Votre demande est passée avec Succèe!! Merci pour votre Confiance *-^');
        }else{
            abort(403);
        }

    }
}
