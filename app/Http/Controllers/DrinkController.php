<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Ctgry;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alldrink = Drink::all(); // ✅ Correct variable name

        // Pass the variable to the view
        return view('drink.index', compact('alldrink'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Ctgry::all();
        return view('drink.create', compact('categories'));
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
            'flavourname'   => 'required|max:100',
            'ingredient'    => 'required|max:255',
            'categorycode'  => 'required|max:100',
            'price'         => 'required',
        ],['code.required' => '⚠️ Please fill in the code before saving.',
            'flavourname.required' => '⚠️ Please fill in the flavou rname before saving.',
            'ingredient.required' => '⚠️ Please fill in the ingredient before saving.',
            'categorycode.required' => '⚠️ Please fill in the category code before saving.',
            'price.required' => '⚠️ Please fill in the price before saving.',]);

        $drink = new Drink();
        $drink->code            = $request->code;
        $drink->flavourname     = $request->flavourname;
        $drink->ingredient      = $request->ingredient;
        $drink->categorycode    = $request->categorycode;
        $drink->price           = $request->price;
        $drink->save();

        //redirect ke index
        return redirect()->route('drink.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $drink = Drink::findOrFail($id);
        return view('drink.show', compact('drink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $drink = Drink::findOrFail($id);
        $categories = Ctgry::all();
        return view('drink.edit', compact('drink','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // validation
        $validate_data = $request->validate
        ([
            'code'=> 'required|max:100',
            'flavourname'   => 'required|max:100',
            'ingredient'    => 'required|max:255',
            'categorycode'  => 'required|max:100',
            'price'         => 'required',
        ],[ 'code.required' => '⚠️ Please fill in the code before saving.',
            'flavourname.required' => '⚠️ Please fill in the flavour name before saving.',
            'ingredient.required' => '⚠️ Please fill in the ingredient before saving.',
            'categorycode.required' => '⚠️ Please fill in the category code before saving.',
            'price.required' => '⚠️ Please fill in the price before saving.',]);

            // Find the record
            $drink = Drink::findOrFail($id);

            // Assign each input value to the model attributes
            $drink->code            = $request->code;
            $drink->flavourname     = $request->flavourname;
            $drink->ingredient      = $request->ingredient;
            $drink->categorycode    = $request->categorycode;
            $drink->price           = $request->price;

            // Save to database
            $drink->save();

            // Redirect with message
            return redirect('drink')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $drink = Drink::findOrFail($id);
        $drink->delete();

        return redirect('drink')->with('success', 'Category deleted successfully!');
    }
}
