<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Validation\Rules;

class OwnersController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $owners = Owner::select('id','name','email','created_at')
        ->orderBy('created_at','desc')
        ->paginate(5);
        
        return view('admin.owners.index',
        compact('owners'));
    }

    
    public function create()
    {
        return view('admin.owners.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()
        ->route('admin.owners.index')
        ->with(['message' => 'オーナー登録を実施しました。',
          'status' => 'success']);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $owner = Owner::findOrFail($id);
        
        return view('admin.owners.edit',compact('owner'));
    }

    
    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->password = Hash::make($request->password);
        $owner->save();

        return redirect()
        ->route('admin.owners.index')
        ->with(['message' => 'オーナー登録を更新しました。',
                'status' => 'success']);
    }

    
    public function destroy($id)
    {
        Owner::findOrFail($id)->delete();
        return redirect()
        ->route('admin.owners.index')
        ->with(['message' => 'オーナーを消去しました。',
    'status' => 'alert']);
    }

    public function expiredOwnerIndex()
    {
        $expiredOwners = Owner::onlyTrashed()->get();
        return view('admin.expired-owners',
       compact('expiredOwners'));
    }

       public function expiredOwnerRestore($id)
    {
        Owner::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.expired-owners.index');
    }

    public function expiredOwnerDestroy($id)
    {
        Owner::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.expired-owners.index');
    }
}
