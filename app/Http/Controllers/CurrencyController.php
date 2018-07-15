<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCurrencyRequest;
use App\Services\CurrencyServiceInterface;
use App\Currency;
use Illuminate\Support\Facades\Gate;

class CurrencyController extends Controller
{
    /**
     * @var \App\Services\CurrencyServiceInterface
     */
    private $currencyService;
    /**
     * @param \App\Services\CurrencyServiceInterface $currencyService
    */
    public function __construct(CurrencyServiceInterface $currencyService) {
        $this->currencyService = $currencyService;
        $this->middleware('auth');
    }
    /**
     * Display a listing of all currencies
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $currencies  = $this->currencyService->findAll();
        return view('currency.currencies',['currencies' => $currencies]);
    }

    /**
     * Show the form for creating a new currency
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if (Gate::allows('create', Currency::class )) {
            return view('currency.create');
        }
        
        return redirect('/');
    }

    /**
     * Store a newly created currency in storage.
     *
     * @param  \App\Http\Requests\SaveCurrencyRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveCurrencyRequest $request)
    {
        if (Gate::allows('create', Currency::class )) { 
            $data = $request->only('title', 'short_name','logo_url','price');
            $this->currencyService->store($data);
            return redirect()->route('currencies.index');
        }
        
        return redirect('/');
    
    }

    /**
     * Display the specified currency.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $currency = $this->currencyService->findById($id);
        return view('currency.show',['currency' => $currency]);
        
    }

    /**
     * Show the form for editing the specified currency.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (Gate::allows('update', Currency::class )) { 
            $currency = $this->currencyService->findById($id);
            return view('currency.edit',['currency' => $currency]);
        } 
            
        return redirect('/');
      
    }

    /**
     * Update the specified currency in storage.
     *
     * @param  \App\Http\Requests\SaveCurrencyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveCurrencyRequest $request, $id)
    {
        if (Gate::allows('update', Currency::class )) { 
            $data = $request->only('title', 'short_name','logo_url','price');
            $this->currencyService->update($id,$data);
            return redirect()->route('currencies.show', $id);
        } 
           
        return redirect('/');
        
    }

    /**
     * Remove the specified currency from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
    */
    public function destroy($id)
    {
        if (Gate::allows('delete', Currency::class )) { 
            $this->currencyService->delete($id);
            return redirect()->route('currencies.index');
        }
        
        return redirect('/');
      
    }
}
