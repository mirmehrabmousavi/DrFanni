<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    @if($category->id != $subcategory->id )
        <option value="{{$subcategory->id}}" @if($category->parent_id == $subcategory->id ) selected @endif >
            {{$dash}}{{$subcategory->category_name}}
        </option>
    @endif
    @if(count($subcategory->subcategory))
        @include('admin.categories.subCategoryListUpdate',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach
