<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $content = Content::all();
        return view('admin.dashboard',compact('content'));
    }

    public function indexCategory()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function createCategory()
    {
        $categories = Category::where('parent_id', null)->orderby('category_name', 'asc')->get();
        return view('admin.categories.create', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories',
            'parent_id' => 'nullable|numeric'
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
            'parent_id' =>$request->parent_id
        ]);

        return redirect()->back()->with('success', 'با موفقیت انجام شد.');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id', null)->where('id', '!=', $category->id)->orderby('category_name', 'asc')->get();
        return view('admin.categories.edit',compact('category','categories'));
    }

    public function updateCategory($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'category_name'     => 'required',
            'category_slug' => ['required', Rule::unique('categories')->ignore($category->id)],
            'parent_id'=> 'nullable|numeric'
        ]);
        if($request->category_name != $category->category_name || $request->parent_id != $category->parent_id)
        {
            if(isset($request->parent_id))
            {
                $checkDuplicate = Category::where('category_name', $request->category_name)->where('parent_id', $request->parent_id)->first();
                if($checkDuplicate)
                {
                    return redirect()->back()->with('error', 'دسته بندی وجود دارد.');
                }
            }
            else
            {
                $checkDuplicate = Category::where('category_name', $request->category_name)->where('parent_id', null)->first();
                if($checkDuplicate)
                {
                    return redirect()->back()->with('error', 'دسته بلندی وجود دارد.');
                }
            }
        }

        $category->category_name = $request->category_name;
        $category->category_slug = $request->category_slug;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->back()->with('success', 'با موفقیت انمجام شد.');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        if(count($category->subcategory))
        {
            $subcategories = $category->subcategory;
            foreach($subcategories as $cat)
            {
                $cat = Category::findOrFail($cat->id);
                $cat->parent_id = null;
                $cat->save();
            }
        }
        $category->delete();
        return redirect()->back()->with('delete', 'با موفقیت انجام شد.');
    }

    public function createContent()
    {
        $categories = Category::all();
        return view('admin.content.create',compact('categories'));
    }

    public function storeContent(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Content::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'parent_id' =>$request->parent_id
        ]);

        return redirect()->back()->with('success', 'با موفقیت انجام شد.');
    }

    public function editContent($id)
    {
        $content = Content::findOrFail($id);
        $categories = Category::all();
        return view('admin.content.edit',compact('content','categories'));
    }

    public function updateContent($id,Request $request)
    {
        $content = Content::findOrFail($id);
        $request->validate([
            'title' => 'required',
        ]);

        $content->title = $request->title;
        $content->desc = $request->desc;
        $content->parent_id = $request->parent_id;
        $content->update();

        return redirect()->back()->with('success', 'با موفقیت انجام شد.');
    }

    public function deleteContent($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();
        return redirect()->back()->with('success', 'با موفقیت انجام شد.');
    }
}
