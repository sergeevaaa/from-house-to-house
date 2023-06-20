<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index()
    {
        return view('admin.technologies', [
            'technologies' => Technology::all()->sortBy('name')
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $technology = new Technology;
        $technology->name = $request['name'];
        $technology->save();
        return redirect('admin/technologies');
    }

    public function show(Technology $technology)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.technologies', [
            'technologies' => Technology::all()->sortBy('name'),
            'edit_technology' => Technology::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $technology = Technology::find($id);
        $technology->name = $request['name'];
        $technology->save();
        return redirect('admin/technologies');
    }


    public function destroy($id)
    {
        Technology::find($id)->delete();
        return back();
    }
}
