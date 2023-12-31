<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    public function index()
    {
        //
        $categories = Category::paginate(5);
         
        return view('category.index', ['categories'=>$categories]);
    }
   
    public function create()
    { 
        $categories = Category::all();
        return view('category.create', ['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:5'],
        ], [
            'name.required' => 'Category must have a name',
            'name.min' => 'Category name should be at least 5 characters',
        ]);
        if ($validator->fails()) {
            return redirect()->route('category.create')
                ->withErrors($validator)
                ->withInput();
        }
        $data_request=$request->all();
         Category::create($data_request);
        return to_route('category.index');
    }

    public function show(Category $category)
    {
        return view('category.show', ['category'=>$category]);
    }
     
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('category.edit',["category"=>$category,'categories'=>$categories]);
    }

    public function update(Request $request, Category $category)
    {
        $request_data = $request->all();
        $category->update($request_data);
        return to_route('category.show', $category->id);  
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
