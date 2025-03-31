<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity;
use App\Models\Transaction;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        // Logic to fetch data for the dashboard
        $entities = Entity::count();
        $transactions = Transaction::count();
        $categories = Category::count();

        return view('dashboard.index', compact('entities', 'transactions', 'categories'));
    }
}
