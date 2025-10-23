<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food; // Make sure you have this model created
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Reusable validation rules.
     */
    private function validationRules($foodId = null): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                // This ensures the name is unique, except for the item being edited
                Rule::unique('foods')->ignore($foodId),
            ],
            'brand_name' => 'nullable|string|max:255',
            'serving_size' => 'required|numeric|min:0',
            'serving_unit' => 'required|string|max:50',
            'calories' => 'required|numeric|min:0',
            'protein_g' => 'required|numeric|min:0',
            'carbs_g' => 'required|numeric|min:0',
            'fats_g' => 'required|numeric|min:0',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Fetch all foods, paginated
        $foods = Food::query()->paginate(20);
        
        // You will need to create this view: resources/views/admin/foods/index.blade.php
        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->validationRules());

        Food::create($validated);

        return redirect()->route('admin.foods.index')
                         ->with('status', 'Food created successfully!');
    }

    /**
     * Display the specified resource.
     * (Often not needed in admin panels, but good to have)
     */
    public function show(Food $food): View
    {
        // You can create this view: resources/views/admin/foods/show.blade.php
        return view('admin.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food): View
    {
        // You will need to create this view: resources/views/admin/foods/edit.blade.php
        return view('admin.foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food): RedirectResponse
    {
        $validated = $request->validate($this->validationRules($food->id));

        $food->update($validated);

        return redirect()->route('admin.foods.index')
                         ->with('status', 'Food updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food): RedirectResponse
    {
        try {
            $food->delete();
            return redirect()->route('admin.foods.index')
                             ->with('status', 'Food deleted successfully!');
        } catch (\Exception $e) {
            // Handle potential foreign key constraints, etc.
            return redirect()->route('admin.foods.index')
                             ->with('error', 'Could not delete food. It may be in use.');
        }
    }


    public function importCreate(): View
    {
        // We'll reuse the import view you already have
        return view('admin.foods.import');
    }

    /**
     * Handle the CSV file upload and processing.
     */
    public function importStore(Request $request): RedirectResponse
    {
        // 1. Validate the request
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();
        $rowCount = 0; // Initialize row count for error reporting

        try {
            // Open the file for reading
            $handle = fopen($path, 'r');
            if ($handle === FALSE) {
                throw new \Exception("Could not open file.");
            }

            DB::beginTransaction();
            
            // 2. Skip the header row
            $header = fgetcsv($handle);
            
            // 3. Loop through the file line by line
            while (($row = fgetcsv($handle)) !== FALSE) {
                $rowCount++;
                
                // This maps CSV columns to database columns.
                // Assumes a specific CSV structure:
                // [0] Name, [1] Brand, [2] UPC, [3] Serving Size, [4] Unit, [5] Cals, [6] Protein, [7] Carbs, [8] Fats
                
                // Use updateOrCreate to prevent duplicates based on UPC code
                Food::updateOrCreate(
                    [
                        // Column to find
                        'upc_code' => $row[2] ?? null
                    ],
                    [
                        // Data to insert or update
                        'name' => $row[0],
                        'brand_name' => $row[1] ?? null,
                        'serving_size' => $row[3],
                        'serving_unit' => $row[4],
                        'calories' => $row[5],
                        'protein_g' => $row[6],
                        'carbs_g' => $row[7],
                        'fats_g' => $row[8],
                    ]
                );
            }

            fclose($handle);
            
            // 4. If all rows are good, commit the transaction
            DB::commit();

            return redirect()->route('admin.foods.index')
                             ->with('status', "Successfully imported/updated {$rowCount} food items.");

        } catch (\Exception $e) {
            // 5. If any row fails, roll back the entire import
            DB::rollBack();
            
            return redirect()->route('admin.foods.import.create')
                             ->with('error', "Import failed on row " . ($rowCount + 1) . ". Error: " . $e->getMessage());
        }
    }
}

