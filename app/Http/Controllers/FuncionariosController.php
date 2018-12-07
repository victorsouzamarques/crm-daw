<?php

namespace App\Http\Controllers;

use App\Funcionarios;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionarios::get();
    	return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($request->isMethod('post')) {
			$product = Product::create([
				'category'    => $request->category,
				'code'        => $request->code,
				'name'        => $request->name,
				'description' => $request->description,
				'price'       => $request->price
			]);

			return redirect()->route('product.list')->with('sucesss', 'Imagens adicionadas ao produto '.$product->code.' com sucesso.');
		}

		return view('product.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Funcionarios  $funcionarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionarios $funcionarios)
    {
        $product            = Product::find($id);
		$product_categories = ProductCategory::get();

		if($request->isMethod('patch')) {
			$validator = Validator::make($request->all(),
				[
					'code' => 'required|max:60',
					'name'     => 'required|max:60',
				],
				[
					//
				]
			);
			if($validator->fails())
				return back()->withInput($request->all())->withErrors($validator->errors());
			
			$product->update([
				'category' => $request->category,
				'code'        => $request->code,
				'name'        => $request->name,
				'description' => $request->description,
				'price'       => $request->price
			]);

			return redirect()->route('product.list')->with('sucesss', 'Dados do produto '.$product->code.' atualizados com sucesso.');
		}
		return view('product.edit', compact('product_categories', 'product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcionarios  $funcionarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionarios $funcionarios)
    {
        $product = Product::find($id);
    	$code    = $product->code;
		$product->delete();

		return redirect()->route('product.list')->with('error', 'Produto '.$code.' removido com sucesso.');
    }
}
