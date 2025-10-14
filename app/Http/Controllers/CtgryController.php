<?php

namespace App\Http\Controllers;

use App\Models\Ctgry;
use App\Models\drinkfla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CtgryController extends Controller
{
    


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$allcategory = Ctgry::all(); // ✅ Correct variable name
        $allcategory = Ctgry::orderBy('id', 'asc')->paginate(5); // show 5 records per page

        // Pass the variable to the view
        return view('category.index', compact('allcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //find last drink , and generate a auto number for cate code
        $lastcode = Ctgry::latest('id')->first();

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
        $validate_data = $request->validate
        ([
            'code'=> 'required|max:100',
            'categoryname' => 'required|max:100',
            'description'  => 'required',
        ],['categoryname.required' => '⚠️ Please fill in the category name before saving.',
          'description.required' => '⚠️ Please fill in the description before saving.']);

        //stored the data in db
        //Ctgry::create($validate_data);

        $category = new Ctgry();

        $category->code             = $request->code;
        $category->categoryname     = $request->categoryname;
        $category->description      = $request->description;
        $category->save();

          // Log message
        Log::info('New category added', [
            'user'       => auth()->user()->name ?? '',
            'category'   => $category->categoryname,
            'description'=> $category->description,
            'time' => now()
        ]);

        //redirect ke index
        return redirect()->route('category.index');
       
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         $ctgry = Ctgry::findOrFail($id);

         // Get all drinks that belong to this category using code
         $drinks = drinkfla::where('categorycode', $ctgry->code)->get();

        return view('category.show', compact('ctgry','drinks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ctgry = Ctgry::findOrFail($id);
        return view('category.edit', compact('ctgry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        // Optional: validate the inputs first
    $request->validate([
        'code' => 'required|string|max:100',
        'categoryname' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
    ],['categoryname.required' => '⚠️ Please fill in the category name before saving.',
       'description.required' => '⚠️ Please fill in the description before saving.']);

    // Find the record
    $ctgry = Ctgry::findOrFail($id);

    // Assign each input value to the model attributes
    $ctgry->code = $request->code;
    $ctgry->categoryname = $request->categoryname;
    $ctgry->description = $request->description;

    // Save to database
    $ctgry->save();

    // Redirect with message
    return redirect('category')->with('success', 'Category updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ctgry = Ctgry::findOrFail($id);
        $ctgry->delete();

        return redirect('category')->with('success', 'Category deleted successfully!');
    }
}
