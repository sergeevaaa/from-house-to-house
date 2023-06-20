<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Application;

class XMLController extends Controller
{
    public function FestivalDataLoad() {
        $xmlDataString = file_get_contents(asset('files/xml/festival.xml'));
        $xmlObject = simplexml_load_string($xmlDataString);

        $json = json_encode($xmlObject);
        $phpDataArray = json_decode($json, true);

        return view('index', [
            'data' => $phpDataArray
        ], [
            'applications' => Application::all()->where('app_status_id', 2)->sortBy('created_at') //!!! screen
        ]);
    }

    public function Show() {
        $xmlDataString = file_get_contents(asset('files/xml/festival.xml'));
        $xmlObject = simplexml_load_string($xmlDataString);

        $json = json_encode($xmlObject);
        $phpDataArray = json_decode($json, true);

        return view('admin.about', [
            'data' => $phpDataArray
        ]);
    }

    public function Store(Request $request) {
        $xmlDataString = file_get_contents('files/xml/festival.xml');
        $xmlObject = simplexml_load_string($xmlDataString);

        $xmlObject->info = $request['editor'];
        $xmlObject->short = $request['short'];
        $xmlObject->mainInfo = $request['mainInfo'];
        $xmlObject->instruction = $request['instruction'];
        $xmlObject->help = $request['editor_help'];
        $xmlObject->asXML('files/xml/festival.xml');

        return redirect('admin/festivals');
    }

    public function HelpDataLoad() {
        $xmlDataString = file_get_contents(asset('files/xml/festival.xml'));
        $xmlObject = simplexml_load_string($xmlDataString);

        $json = json_encode($xmlObject);
        $phpDataArray = json_decode($json, true);

        return view('instructions', [
            'data' => $phpDataArray
        ]);
    }

    public function change_file(Request $request) {

        Validator::make($request->all(), [
            'photo' => ['file'],
        ])->validate();

        if ($request->isMethod('post') && $request->file('file')) {

            $file = $request->file('file');
            $upload_folder = 'public/files';
            $filename = $file->getClientOriginalName();
            Storage::putFileAs($upload_folder, $file, $filename);

            $xmlDataString = file_get_contents('files/xml/festival.xml');
            $xmlObject = simplexml_load_string($xmlDataString);
            $xmlObject->file = $filename;
            $xmlObject->asXML('files/xml/festival.xml');

        }

        return redirect('admin/about');
    }

    public function change_file_instruction(Request $request) {

        Validator::make($request->all(), [
            'instruction_file' => ['file'],
        ])->validate();

        if ($request->isMethod('post') && $request->file('instruction_file')) {

            $file = $request->file('instruction_file');
            $upload_folder = 'public/files';
            $filename = $file->getClientOriginalName();
            Storage::putFileAs($upload_folder, $file, $filename);

            $xmlDataString = file_get_contents('files/xml/festival.xml');
            $xmlObject = simplexml_load_string($xmlDataString);
            $xmlObject->instruction_file = $filename;
            $xmlObject->asXML('files/xml/festival.xml');

        }

        return redirect('admin/about');
    }

    public function resetFestivalXML()
    {
        $xmlDataString = file_get_contents('files/xml/festival.xml');
        $xmlObject = simplexml_load_string($xmlDataString);

        $defaultDataString = file_get_contents('files/xml/festivalDefault.xml');
        $default = simplexml_load_string($defaultDataString);

        $xmlObject->info = $default->info;
        $xmlObject->short = $default->short;
        $xmlObject->mainInfo = $default->mainInfo;
        $xmlObject->instruction = $default->instruction;
        $xmlObject->help = $default->help;
        $xmlObject->asXML('files/xml/festival.xml');

        return redirect('admin/about');
    }
}
