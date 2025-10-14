<?php

namespace App\Http\Controllers;

use App\Models\drinkfla;
use App\Models\Ctgry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Mail;
use App\Mail\DrinkCreatedMail;

class DrinkflaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$alldrink = drinkfla::all(); // ✅ Correct variable name
         $alldrink = drinkfla::orderBy('id', 'asc')->paginate(5);

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

        $drink = new drinkfla();
        // validation
        $validate_data = $request->validate
        ([
            'code'=> 'required|max:100',
            'flavourname'   => 'required|max:100',
            'ingredient'    => 'required|max:255',
            'categorycode'  => 'required|max:100',
            'price'         => 'required',
            'photo'         => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
        ],['code.required' => '⚠️ Please fill in the code before saving.',
            'flavourname.required' => '⚠️ Please fill in the flavou rname before saving.',
            'ingredient.required' => '⚠️ Please fill in the ingredient before saving.',
            'categorycode.required' => '⚠️ Please fill in the category code before saving.',
            'price.required' => '⚠️ Please fill in the price before saving.',]);

        if ($request->hasFile('photo')) 
            {
                // Store file in storage/app/public/photo
                $path = $request->file('photo')->store('photo', 'public');

                // Save only the relative path, e.g., "photo/matcha.jpg"
                $drink->photo = $path;
             }    

        //if there r no photo upload delete file image from array v
            //unset($validate_data['photo'];)


        $drink->code            = $request->code;
        $drink->flavourname     = $request->flavourname;
        $drink->ingredient      = $request->ingredient;
        $drink->categorycode    = $request->categorycode;
        $drink->price           = $request->price;
        $drink->save();

        // Save only the relative path, e.g., "photo/matcha.jpg"
        $drink->photo           = $path;

        // Log message
        Log::info('New flavour added', [
            'user'           => auth()->user()->name ?? '',
            'code'           => $drink->code,
            'flavourname'    => $drink->flavourname,
            'ingredient'     => $drink->ingredient,
            'categorycode'   => $drink->categorycode,
            'price'          => $drink->price,
            'time'           => now()
        ]);
      

        //redirect ke index
        return redirect('drinkflavour')->with('success', 'Flavour added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $drink = drinkfla::findOrFail($id);
        return view('drink.show', compact('drink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $drink = drinkfla::findOrFail($id);
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
            'photo'         => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
        ],[ 'code.required' => '⚠️ Please fill in the code before saving.',
            'flavourname.required' => '⚠️ Please fill in the flavour name before saving.',
            'ingredient.required' => '⚠️ Please fill in the ingredient before saving.',
            'categorycode.required' => '⚠️ Please fill in the category code before saving.',
            'price.required' => '⚠️ Please fill in the price before saving.',]);

            // Find the record
            $drink = drinkfla::findOrFail($id);


            if (!$drink) {
        return redirect()->back()->with('error', 'Drink not found.');
    }

    // If a new photo is uploaded
            if ($request->hasFile('photo')) 
            {
                    // Delete old photo if exists
                    if ($drink->photo && \Storage::exists('public/' . $drink->photo)) 
                    {
                         \Storage::delete('public/' . $drink->photo);
                    }

                // Store new photo
                $path = $request->file('photo')->store('photo', 'public');
                $drink->photo = $path;
            }

            // Assign each input value to the model attributes
            $drink->code            = $request->code;
            $drink->flavourname     = $request->flavourname;
            $drink->ingredient      = $request->ingredient;
            $drink->categorycode    = $request->categorycode;
            $drink->price           = $request->price;

            // Save to database
            $drink->save();

            // Redirect with message
            return redirect('drinkflavour')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $drink = drinkfla::findOrFail($id);
        $drink->delete();

        return redirect('drinkflavour')->with('success', 'Category deleted successfully!');
    }
}
