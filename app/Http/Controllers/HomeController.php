<?php

namespace App\Http\Controllers;

use App\Mail\PasswordMail;
use App\Models\Application;
use App\Models\Festival;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    public function index()
    {
        return view('account', [
            'user' => Auth::user(),
            'apps' => Application::all()->where('user_id', Auth::id())->sortByDesc('id'),
            'last_festival' => Festival::all()->last()
        ]);
    }

    public function register(Request $request) {

        $request->validate([
            'email' => 'required|unique:users|email|max:255',
        ]);

        $users = User::all()->last();
        $last_user_id = $users->id;
        $last_user_id ++;
        $name = 'Пользователь №'.$last_user_id;
        $pass = Str::random(10);

        $user = new User;
        $user->role = 0;
        $user->name = $name;
        $user->photo = 'standard/user.png';
        $user->password = Hash::make($pass);
        $user->email = $request->email;
        $user->save();

        try {
            Mail::to($request->email)->send(new PasswordMail($pass, 'new'));
        }
        catch(Exception $e){
            return view('auth.reg', [
                'error' => 'Такого Email не существует!'
            ]);
        }

        return view('auth.success', [
            'email' => $request->email
        ]);
    }

    public function change_name(Request $request) {
        if ($request['new_name'] != '') {
            $user = User::find(Auth::id());
            $user->name = $request['new_name'];
            $user->save();
        }
        return redirect('account');
    }

    public function change_photo(Request $request) {

        Validator::make($request->all(), [
            'photo' => ['image'],
        ])->validate();

        if ($request->isMethod('post') && $request->file('photo')) {
            $user = User::find(Auth::id());

            $file = $request->file('photo');
            $upload_folder = 'public/users';
            $filename = $file->getClientOriginalName(); // image.jpg

            Storage::putFileAs($upload_folder, $file, $filename);
            $user->photo = $filename;
            $user->save();
        }

        return redirect('account');
    }

    public function resetPass (Request $request) {

        $user = User::all()->where('email', $request['email'])->last();
        if ($user != null) {
            $pass = Str::random(10);
            $user->password = Hash::make($pass);
            $user->save();
        }else{
            return view('auth.reset', [
                'error' => 'Данный Email не зарегистрирован!'
            ]);
        }

        try {
            Mail::to($request->email)->send(new PasswordMail($pass, 'reset'));
        }
        catch(Exception $e){
            return view('auth.reset', [
                'error' => 'Такого Email не существует!'
            ]);
        }
        return view('auth.successReset', [
            'email' => $request->email
        ]);
    }

    public function sitemap() {
        return view('admin.sitemap', [
            'festivals' => Festival::all(),
            'apps' => Application::all()->where('app_status_id', '!=', 1)->where('app_status_id', '!=', 4)
        ]);
    }

    public function members() {
        return view('members', [
            'applications' => Application::all()->where('app_status_id', 2)->sortByDesc('festival_id')
        ]);
    }

    public function members_sort($request) {
        return view('members', [
            'applications' => Application::all()->where('app_status_id', 2)->sortBy($request)
        ]);
    }

    public function sitemapPage() {
        return view('sitemap', [
            'festivals' => Festival::all()
        ]);
    }

    public function ArtisanCommands() {
        Artisan::call('migrate');
        Artisan::call('db:seed');
        Artisan::call('storage:link');
        return 'Успешно';
    }

    public function admin_members() {
        return view('admin.members', [
            'applications' => Application::all()->where('app_status_id', 2)->sortByDesc('festival_id')
        ]);
    }

    public function edit_certificate($id)
    {
        $app = Application::find($id);
        if ($app != null) {
            return view('admin.certificate', [
                'app' => $app,
            ]);
        }else{
            abort(404);
        }
    }


    public function update_certificate(Request $request, $id)
    {
        Validator::make($request->all(), [
            'photo' => ['file'],
        ])->validate();

        if ($request->isMethod('post') && $request->file('file')) {
            $app = Application::find($id);

            $file = $request->file('file');
            $upload_folder = 'public/certificate';
            $filename = $file->getClientOriginalName();
            Storage::putFileAs($upload_folder, $file, $filename);

            $app->certificate = $filename;
            $app->save();
        }
    return redirect('admin/certificate/{id}');
        //     $app = Application::find($id);
        //     $file = $request->file('certificate');
        //         $upload_folder = '/certificate';
        //         $filename = $file->getClientOriginalName(); // image.jpg
        //         Storage::putFileAs($upload_folder, $file, $filename);      
        //         $app->certificate->$filename;
        //         $app->save();
        //     return redirect('admin/certificate/{id}');
        // }
    }


}