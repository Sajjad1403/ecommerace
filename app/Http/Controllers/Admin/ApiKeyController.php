<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ApiKey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $apiKeys = ApiKey::with('user')->get();
      return view('admin.key.index',compact('apiKeys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.key.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $request->validate([
         'appName' => 'required',
         'status' => 'required',
         'assign_to' => 'required'
     ]);  
     $keyName = str_replace('-','',Str::uuid()) ;
   
     ApiKey::create([
         'key' => $keyName ,
         'user_id' => Auth::id(),
         'assign_to' => $request->assign_to,
         'app_name' => $request->appName,
         'status' => $request->status
     ]);
     toastr()->success('Api key is created.');
     return redirect()->route('admin.apiKeys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apiKey = ApiKey::find($id);
        $users = User::all();
        return view('admin.key.edit',compact('apiKey','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'appName' =>  'required',
           'status' =>  'required',
           'assign_to' => 'required'
        ]);
       $apiKey = ApiKey::findOrFail($id);
       $apiKey->update([
        'app_name' =>  $request->appName,
        'status' =>   $request->status,
        'assign_to' =>   $request->assign_to,
        
       ]);
       toastr()->success('Api key updated successfully.');
       return redirect()->route('admin.apiKeys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $apiKey = ApiKey::find($id);
      $apiKey->delete();
      toastr()->error('Api key revoke successfully.');
      return redirect()->route('admin.apiKeys.index');
    }
}