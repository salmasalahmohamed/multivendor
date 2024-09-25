<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(\Symfony\Component\HttpFoundation\Request $request)


    {
//$query=Category::query();
//        if ($request->get('search')){
//              $query->where('name','LIKE',"%{$request->get('search')}%");
//        }
//        if ($request->get('status')){
//            $query->where('status',$request->get('status'));
//        }
//        $categories=$query->paginate(1);
        $categories=Category::active($request->query())->with(['category','product'])->withCount(['product'=>function($query){ $query->where('status','active');}])->paginate(2);
        return view('categories.show',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();

        return view('categories.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCategoryRequest $request)
    {
        $request->merge(['slug'=>Str::slug($request->name)]);
        $data=$request->except('logo');
if ($request->hasFile('logo')){

}
        $file=$request->file('logo');
        $path=$file->store('upload','public');
        $data['logo']=$path;

        Category::create($data);
        return to_route('categories.index')->with('success','you added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $category=Category::findOrFail($id);

        }catch (Exception $e){
            return to_route('categories.index');

        }
        $parents=Category::where('id','<>',$id)->where(function ($q)use($id){
            $q->whereNull('parent_id')->orWhere('parent_id','<>',$id);

        });
        return view('categories.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddCategoryRequest $request, string $id)
    {
        $category=Category::find($id);

        $ola_image=$category->logo;


        $data=$request->except('logo');
        if ($request->hasFile('logo')){
            $file=$request->file('logo');
            $path=$file->store('upload','public');
            $data['logo']=$path;

        }

        if ($ola_image && isset($data['logo'])){
            Storage::disk('public')->delete($ola_image);
        }
        $category->update($data);
        return to_route('categories.index')->with('success','you updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
$category=Category::find($id)  ;
$category->delete();



return to_route('categories.index')->with('success','you deleted successfully');

    }
    public function trash(){
        $categories=Category::onlyTrashed()->paginate(2);
        return view('categories.trash',get_defined_vars());
    }
    public function restore(\Symfony\Component\HttpFoundation\Request $request,$id){
        $categories= Category::onlyTrashed()->find($id);
$categories->restore();
        return to_route('categories.index')->with('success','you deleted successfully');

    }
    public function forcedelete($id){
        $category= Category::onlyTrashed()->find($id);
        $category->forceDelete();
        if ($category->logo){
    Storage::disk('public')->delete($category->logo);

}
        return to_route('categories.index')->with('success','you added successfully');


    }

}
