<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ChartController extends Controller
{
    public function index()
    {
        // Exemple : récupérer le nombre de produits par catégorie
        $products = Product::selectRaw('category_id, COUNT(*) as count')
                            ->groupBy('category_id')
                            ->get();

        $labels = $products->pluck('category_id');
        $data = $products->pluck('count');

        return view('chart', compact('labels', 'data'));
    }
}
