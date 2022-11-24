<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\TypeModel;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class ProductController extends Controller
{
    public function indexRegister(Product $product)
    {
        
        $categories = Category::all();

        $typeModels = TypeModel::all();

        $listData = [
            'models'=> $typeModels,
            'categories'=> $categories,
            'product' => $product
        ];

        return Inertia::render('ProductForm', $listData);
    }

    public function indexView()
    {
        $products = Product::all();
        $products->load('category');
        $products->load('typeModel');

        $listData = [
            'products'=> $products,
        ];

        return Inertia::render('ProductView', $listData);
    }

    public function indexDetail(Product $product)
    {   
        $product->load('category');
        $product->load('typeModel');

        $listData = [
            'product'=> $product,
        ];

        return Inertia::render('ProductDetail', $listData);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->only(
            'name',
            'description',
            'price',
            'published',
            'image',
            'color',
            'year_product',
            'type_model_id',
            'category_id',
            'user_id'
        );

        Product::create($data);

        return Redirect::route('produtoView')->with('success', 'Produto registrado com sucesso!');

    }

    public function update(Request $request)
    {
        $data = $request->only(
            'name',
            'description',
            'price',
            'published',
            'image',
            'color',
            'year_product',
            'type_model_id',
            'category_id',
            'user_id'
        );
        
        Product::where('id', $request->id)->update($data);

        return Redirect::route('produtoView')->with('success', 'Produto atualizado com sucesso!');

    }

    public function delete(Product $product)
    {
        $product->delete();
        return Redirect::route('produtoView')->with('success', 'Produto deletado com sucesso!');
    }

}
