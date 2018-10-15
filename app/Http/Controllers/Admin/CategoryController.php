<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{

            $this->validate($request,Category::$rules,Category::$messages);

            $category = Category::create($request->all());

            return back()->with('success','categoría creada correctamente');

        }catch(\Exception $e){
            return back()->with('error','error al crear la categoría');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categoria)
    {
        //
        try{
            $validator = $this->validate($request,Category::$rules,Category::$messages);

            $categoria->name = $request->name;
            if($request->description) $categoria->description = $request->description;

            $categoria->save();
            //$categoria->update($request->all());

            return back()->with('success','categoría editada correctamente');
        }catch (\Exception $e){
            return back()->with('error','error al editar la categoría');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categoria)
    {
        try{

            $categoria->delete();

            return back()->with('success','categoría eliminada correctamente');
        }catch (\Exception $e){
            return back()->with('error','error al eliminar la categoría');
        }
    }
}
