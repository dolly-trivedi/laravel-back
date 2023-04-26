<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function getCategories()
    {
        try {
            $cat = Categories::get();
            return response()->json([
                'status' => 200,
                'data' => $cat
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function addCategories(Request $request)
    {
        try {
            $cat = Categories::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => $request->slug
            ]);
            return response()->json([
                'status' => 200,
                'data' => $cat
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function deleteCategories($id)
    {
        try {
            $cat = Categories::find($id)->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Delete Category'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }
}
