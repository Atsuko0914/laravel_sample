<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sample;
use App\Mail\ContactMail;

class SamplesController extends Controller
{
    public function index()
    {
        return view('samples.index');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:10',
            'email'    => 'required|email',
            'tel'      => 'nullable|numeric',
            'gender'   => 'required',
            'contents' => 'required',
        ]);

        $inputs = $request->all();

        return view('samples.confirm', ['inputs' => $inputs]);
    }

    public function process(Request $request)
    {
        $action = $request->get('action', 'return');
        $input  = $request->except('action');

        if($action === 'submit') {

            // DBにデータを保存
            $sample = new Sample();
            $sample->fill($input);
            $sample->save();

            return redirect()->route('complete');
        } else {
            return redirect()->route('sample')->withInput($input);
        }
    }

    public function complete()
    {
        return view('samples.complete');
    }
}
