<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\CreditCard;
use App\Models\Debt;
use App\Models\Expense;
use App\Models\Financing;
use App\Models\Result;
use App\Models\Revenue;

class TableController extends Controller
{
    public function index()
    {
        $revenues = Revenue::all();
        $expenses = Expense::all();
        $assets = Asset::all();
        $debts = Debt::all();
        $creditCards = CreditCard::all();
        $financings = Financing::all();
        $results = Result::all();

        return view('table_control.index', compact('revenues', 'expenses', 'assets', 'debts', 'creditCards', 'financings', 'results'));
    }
}
