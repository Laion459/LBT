<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Entity;
use App\Models\Transaction;

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
