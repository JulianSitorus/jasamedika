<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MobilController extends Controller
{
    public function index(){
        $mobil = Mobil::orderBy('id', 'desc')->get();
    
        $modelOrder = ['Sedan', 'Hatchback', 'SUV', 'Electric', 'Luxury', 'Sport', 'Van'];
        $mobilsByModel = $mobil->groupBy('model');
    
        $sortedMobilsByModel = [];
        $mobilCounts = [];
    
        foreach ($modelOrder as $model) {
            $mobils = $mobilsByModel->get($model, collect());
    
            $sortedMobilsByModel[$model] = $mobils;
            $mobilCounts[$model] = $mobils->count();
        }
    
        return view('dashboard', [
            'mobil' => $mobil,
            'mobilCounts' => $mobilCounts,
            'sortedMobilsByModel' => $sortedMobilsByModel,
        ]);
    }
    

    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'foto' => 'required',
            'merk' => 'required',
            'nomor_plat' => 'required',
            'tarif_per_hari'=>'required',
            'model'=>'required',
        ]);
        if($request->hasFile('foto')){
            $request-> file('foto')->move('foto_mobil/', $request->file('foto')->getClientOriginalName());
            $validation['foto']  = $request->file('foto')->getClientOriginalName();
        }
        $mobil = Mobil::create($validation);
        
        if($mobil){
            return redirect('dashboard')->with('success', 'Data has been added!');
        }else{
            return redirect(route('create'));
        }        
    }

    public function rent($id){
        $mobil = Mobil::find($id);
        return view('rent',[
            'mobil' => $mobil
        ]);
    }
}
