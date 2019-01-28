<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Price;
use App\Http\Requests\CreateProductRequest;
use Session;

class ProductsController extends Controller
{
    //metoda wyswietlajaca liste produktów
    public function index(){

    	$products = Product::all();

    	return view('products.index')->with('products', $products);

    }

    //metoda wyswietlajaca szczegoly produktu
    public function show($id){

    	$product = Product::findOrFail($id);
        $price = DB::table('prices')->where('product_id', '=', $product->id)->first();
    
    	return view('products.show', compact('product', 'price'));

    }

    //metoda wyswietlajaca formularz dodawania
    public function create(){

    	return view('products.create');

    }

    //metoda zapisujaca produkt w bazie
    public function store(CreateProductRequest $request){


        $product = new Product($request->all());
        
        //pobranie ceny z formularza i wyliczeny ceny brutto (VAT 23%)
        $price = $request->input('price');
        $price_brutto = $price*1.23;

        //okreslenie cen netto i brutto
        $price_rec = new Price();
        $price_rec->price_netto = $price;
        $price_rec->price_brutto = $price_brutto;
        
        // zapisanie produktu do bazy
        $product->save();

        //powiazanie id produktu z dwoch tabel
        $price_rec->product_id = $product->id;

        //zapisanie rekordu ceny
        $price_rec->save();
        
        //wyswietlenie komunikatu sesji
        Session::flash('product_created', 'Produkt został zapisany w bazie');
        return redirect('/products');

    }

    //metoda wyswietlajaca formularz edycji
    public function edit($id){

        $product = Product::findOrFail($id);
        $price = Product::find($id)->price->price_netto;
        
    	return view('products.edit', compact('product', 'price'));

    }

    //metoda aktualizujaca rekord w bazie
    public function update(CreateProductRequest $request, $id){

        //znalezienie produktu o okreslonym ID
        $product = Product::findOrFail($id);

        //znalezienie ceny edytowanego produktu
        $price = DB::table('prices')->where('product_id', '=', $product->id)->first();

        //pobranie ceny z formularza i wyliczeny ceny brutto (VAT 23%)
        $price->price_netto = $request->input('price');
        $price->price_brutto = $price->price_netto*1.23;
        $date = new \DateTime();

        //aktualizacja tabeli prices
        $price_update = DB::table('prices')->where('id', $price->id)->update(
            [
                'price_netto' => $price->price_netto,
                'price_brutto' => $price->price_brutto,
                'updated_at' => $date
            ]
        );

        //aktualizacja tabeli product
        $product->update($request->all());

        Session::flash('product_modified', 'Produkt został zaaktualizowany');
        return redirect('/products');

    }

    //metoda usuwajaca produkt z bazy 
    public function destroy($id){

    	$product = Product::findOrFail($id);
        $product->delete($id);

        //wyswietlenie komunikatu sesji
        Session::flash('product_deleted', 'Produkt został usuniety z bazy');
        return redirect('/products');

    }



}
