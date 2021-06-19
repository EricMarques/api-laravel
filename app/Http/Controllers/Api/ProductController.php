<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
         
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->paginate(5);

        //return response()->json($products);
        return new ProductCollection($products);
    }

    public function show($id)
    {
        $product = $this->product->find($id);

        if (!$product)
        {
            return response()->json(['data' => ['msg' => 'Produto inexistente!']]);
        }
        else
        {
            //return response()->json($product);
            return new ProductResource($product);
        }

    }

    public function save(Request $request)
    {
        $data = $request->all();
        $product = $this->product->create($data);

        return response()->json($product);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $product = $this->product->find($data['id']);

        if (!$product)
        {
            return response()->json(['data' => ['msg' => 'Produto inexistente!']]);
        }
        else
        {
            $product->update($data);
            return response()->json($product);
        }
        

        
    }

    public function delete($id)
    {
        $product = $this->product->find($id);
        if(!$product)
        {
            return response()->json(['data' => ['msg' => 'Produto inexistente!']]);
        }
        else
        {
            $product->delete();

            return response()->json(['data' => ['msg' => 'Produto excluído com sucesso!']]);
        }
    }
}
