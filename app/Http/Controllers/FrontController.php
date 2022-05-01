<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $category = Category::where('parent_id',null)->paginate(10000);
        $content = Content::where('parent_id',null)->get();
        return view('Front.index',compact('category','content'));
    }

    public function search()
    {
        return view('Front.search');
    }

    public function list1()
    {
        $content = Content::all();
        $category = Category::all();
        $category1 = Category::where('parent_id',1)->get();
        return view('Front.list1',compact('category','category1','content'));
    }

    public function list2()
    {
        $content = Content::all();
        $category = Category::all();
        $category2 = Category::where('parent_id',2)->get();
        return view('Front.list2',compact('category','category2','content'));
    }

    public function list3($id)
    {
        $content = Content::findOrFail($id);
        $category = Category::all();
        $category3 = Category::where('parent_id',3)->get();
        return view('Front.list3',compact('category','category3'));
    }

    public function list4($id)
    {
        $content = Content::findOrFail($id);
        $category = Category::all();
        $category4 = Category::where('parent_id',4)->get();
        return view('Front.list4',compact('category','category4'));
    }

    public function list5($id)
    {
        $content = Content::findOrFail($id);
        $category = Category::all();
        $category5 = Category::where('parent_id',5)->get();
        return view('Front.list5',compact('category','category5'));
    }

    public function list6($id)
    {
        $content = Content::findOrFail($id);
        $category = Category::all();
        $category6 = Category::where('parent_id',6)->get();
        return view('Front.list6',compact('category','category6'));
    }

    public function content()
    {
        return view('Front.content');
    }
}
