<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ApiController extends Controller
{
    public function produk_index(){
        $produk = Produk::get();
        return response()->json($produk);
    }

    public function produk_store(Request $request){
        Produk::insert([
            'produk'       => $request->api_produk,
            'price'         => $request->api_price,
            'stock'         => $request->api_stock,
        ]);

        $response = array(
            'responseCode'      => '00',
            'responseStatus'    => 'Success'
        );
        return response()->json($response);
    }

    public function produck_by_id($id){
        $produk = Produk::where('id', $id)->first();
        return response()->json($produk);
    }

    public function produk_update($id, Request $request){
        $produk = Produk::where('id', $id)->update([
            'produk'       => $request->api_produk,
            'price'         => $request->api_price,
            'stock'         => $request->api_stock
        ]);

        $response = array(
            'responseCode'      => '00',
            'responseStatus'    => 'Succes'
        );

        return response()->json($response);
    }


    public function categories_delete($id){
        categories::where('id', $id)->delete();

        $response = array(
            'responseCode'      => '00',
            'responseStatus'    => 'Success Delete'
        );

        return response()->json($response);
    }

    public function create_categories(){
        $formData = [
            'categories'       => null,
            'price'         => null,
            'stock'         => null,
        ];

        return response()->json($formData);
    }

        public function categories_index(){
            $produk = categories::get();
            return response()->json($categories);
        }
    
        public function categories_store(Request $request){
            categories::insert([
                'categories'       => $request->api_categories,
                'price'         => $request->api_price,
                'stock'         => $request->api_stock,
            ]);
    
            $response = array(
                'responseCode'      => '00',
                'responseStatus'    => 'Success'
            );
            return response()->json($response);
        }
    
        public function categories_by_id($id){
            $categories = categories::where('id', $id)->first();
            return response()->json($categories);
        }
    
        public function categories_update($id, Request $request){
            $categories = categories::where('id', $id)->update([
                'categories'       => $request->api_categories,
                'price'         => $request->api_price,
                'stock'         => $request->api_stock
            ]);
    
            $response = array(
                'responseCode'      => '00',
                'responseStatus'    => 'Succes'
            );
    
            return response()->json($response);
        }
}