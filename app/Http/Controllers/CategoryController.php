<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$allcategory = Category::all();
        $allcategory = Category::paginate(5);
        return view('category.index', compact('allcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //find last drink , and generate a auto number for cate code
        $lastcode = Category::latest('id')->first();

        if ($lastcode) {
                // Extract the numeric part (e.g., "002") from the last code
                $lastNumber = (int) str_replace('STB-', '', $lastcode->code);

                // Increment the number
                $nextNumber = $lastNumber + 1;

                // Pad the number with leading zeros to keep format like STB-003
                $newCode = 'STB-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
            } else {
                // If no records exist yet, start from STB-001
                $newCode = 'STB-001';
            }

        return view('category.create', compact('newCode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $validate_data = $request->validate([
            'categoryname' => 'required|max:100',
            'description'  => 'required',
        ]);

        //stored the data in db
        Category::create($validate_data);

        //redirect ke index
        return view('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // validation
        $validate_data = $request->validate([
            'categoryname' => 'required|max:100',
            'description'  => 'required',
        ]);

        //update the data in db
        $category->update($validate_data);

        //redirect ke index
        return view()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return view()->route('category.index');
    }
}
