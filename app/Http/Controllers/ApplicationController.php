<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Application_status;
use App\Models\Comment;
use App\Models\Festival;
use App\Models\Member_status;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $festival = Festival::all()->last();
        if ($festival != null) {
            return view('registration.registration', [
                'festival' => $festival,
                'member_statuses' => Member_status::all(),
                'apps' => Application::all()->where('user_id', Auth::id())->where('festival_id',  $festival->id)
            ]);
        }else{
            abort(404);
        }
    }

    public function create(Request $request, $festival_id)
    {
        $app = new Application;
        $app->user_id = Auth::id();
        $app->festival_id = $festival_id;
        $app->member_status_id = $request['member_status'];
        $app->name = $request['name'];
        if ($request['technology_id'] != 'none') {
            $app->technology_id = $request['technology_id'];
        }else {
            $app->technology = $request['technology'];
        }
        $app->organization = $request['organization'];
        $app->video = $request['video'];
        $app->app_status_id = 1;
        $app->save();
        return redirect('account');
    }

    public function cancel($id)
    {
        $app = Application::find($id);
        if ($app->user->id == Auth::id()) {
            $app->delete();
        }
        return redirect('account');
    }

    public function reset($id)
    {
        $app = Application::find($id);
        if ($app->user->id == Auth::id()) {
            $app->delete();
            return redirect('registration');
        }else{
            return back();
        }
    }

    public function show($id)
    {
        $app = Application::find($id);
        if ($app != null) {
            if ($app->app_status->name == 'Одобрено' && $app->member_status_id != 1) {
                $user_id = Auth::id();
                $festival_id = $app->festival->id;
                $user_app = Application::all()->where('user_id', $user_id)->where('festival_id', $festival_id);
                $app_count = count($user_app);
                return view('application', [
                    'app' => $app,
                    'comments' => Comment::all()->where('application_id', $id)->sortByDesc('id'),
                    'app_count' => $app_count
                ]);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }

    public function admin()
    {
        return view('admin.applications', [
            'festivals' => Festival::all(),
            'statuses' => Application_status::all()
        ]);
    }

    public function edit($id)
    {
        $app = Application::find($id);
        if ($app != null) {
            return view('admin.application', [
                'app' => $app,
                'statuses' => Application_status::all()
            ]);
        }else{
            abort(404);
        }
    }


    public function update(Request $request, $id)
    {
        $app = Application::find($id);
        $app->app_status_id = $request['status'];
        $app->note = $request['note'];
        $app->save();
        return redirect('admin/applications');
    }

    public function destroy(Application $application)
    {
        //
    }
}
