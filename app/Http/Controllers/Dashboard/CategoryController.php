<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $categories = DB::table('categories')->paginate(10);
        return response()->view('dashboard.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Print Data
//        var_dump(request('category_name'));
//        var_dump(request('category_code'));

        $input = $request->all();
//        dd($input);

        $category = new Category();
        $category_name = $input['category_name'];
        $category_code = $input['category_code'];
        $category->name = $category_name;
        $category->code = $category_code;

        // Insert in Database
        $category->save();

        // Get Last ID || Category ID
        $category_id = Category::all()->last();
        // Status for Adding the New Category To The System!
        $alert_status = 'alert-success';
        // Msg
        $msg = 'New Category Added Successfully.';
        // Pref
        $pref = "You Add $category_name As New Category To The System!<br>His ID : {$category_id['id']} ,His Code : $category_code . ";
        $status = ['alert_status' => $alert_status, 'msg' => $msg, 'pref' => $pref];

        return redirect()->back()->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $category = Category::findOrFail($id);
        return response()->view('dashboard.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        $category = Category::findOrFail($id);
        return response()->view('dashboard.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $input = $request->all();

        $category = Category::findOrFail($id);
//        $category = Category::where('id', $id)->first();
        $category_name = $input['category_name'];
        $category_code = $input['category_code'];
        $category->name = $category_name;
        $category->code = $category_code;

        // Insert in Database
        $category->save();

        // Status for Editing the Category in The System!
        $alert_status = 'alert-success';
        // Msg
        $msg = "Edit Category $category_name Successfully.";
        // Pref
        $pref = "You Edit $category_name Category in The System!<br>His ID : {$id} ,His Code : $category_code . ";
        $status = ['alert_status' => $alert_status, 'msg' => $msg, 'pref' => $pref];

        return redirect()->route('dashboard.categories.index')->with('status', $status);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category_name = $category->name;
        $category_code = $category->code;
        echo "Category name :$category_name / Category code :$category_code";
        // Status for Deleting Category from The System!
        $alert_status = 'alert-warning';
        // Msg
        $msg = "Delete Category $category_name Successfully.";
        // Pref
        $pref = "You Delete $category_name Category from The System!<br>His ID : {$id} ,His Code : $category_code . ";
        $status = ['alert_status' => $alert_status, 'msg' => $msg, 'pref' => $pref];

        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('status', $status);
    }
}
