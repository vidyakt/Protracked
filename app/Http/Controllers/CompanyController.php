<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Exception;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::select('name','id','email','logo','website')->latest()->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if($request->has('logo')){
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->move(storage_path('app/public'), $imageName);
            $company->logo = $imageName;
        }
        $company->save();
        return redirect()->route('companies.index')
                        ->with('success','Company created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if($request->has('logo')){
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->move(storage_path('app/public'), $imageName);
            $company->logo = $imageName;
        }
        $company->save();
        return redirect()->route('companies.index')
                        ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        try{
            $company->delete();
        }catch(Exception $ex){
            return redirect()->route('companies.index')
                        ->with('error','Item already in use');
        }
       
        return redirect()->route('companies.index')
                        ->with('success','Company deleted successfully');
    }
}
