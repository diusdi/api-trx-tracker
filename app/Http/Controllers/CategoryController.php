<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $perPage = request('per_page', 5);
        $categories = $query->latest()->paginate($perPage);

        return response()->json([
            'success' => true,
            'message' => 'list category',
            'data' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::create([
            'id' => Str::orderedUuid(),
            'name' => Str::upper($request->name),
            'description' => $request->description,
            'type' => 'NOT_DEFAULT',
            'author_id' => 'a1dad7a4-1224-481b-b322-883dc5cedf65',
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => 'category created',
            ],
            201,
        );
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $category,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $category->name = Str::upper($request->name);
        $category->description = $request->description;
        $category->save();

        return response()->json([
            'success' => true,
            'message' => 'category updated',
        ]);

    }

    public function destroy(string $id)
    {
        return response()->json([
            'success' => false,
            'message' => 'cannot delete data',
        ]);
    }
}
