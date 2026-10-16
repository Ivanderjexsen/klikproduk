<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PosterController extends Controller
{
    public function index(): View
    {
        return view('poster.index');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'product_name' => ['required', 'string', 'max:100'],
            'poster_style' => [
                'required',
                'in:modern,minimalis,elegan,ceria,futuristik',
            ],
            'poster_prompt' => ['required', 'string', 'max:1000'],
        ]);

        $styles = [
            'modern' => 'Modern dan Profesional',
            'minimalis' => 'Minimalis',
            'elegan' => 'Elegan dan Premium',
            'ceria' => 'Ceria dan Berwarna',
            'futuristik' => 'Futuristik',
        ];

        $productName = $validated['product_name'];
        $style = $styles[$validated['poster_style']];
        $description = $validated['poster_prompt'];

        $concept = [
            'product_name' => $productName,
            'style' => $style,
            'description' => $description,
            'headline' => $productName,
            'tagline' => $description,
            'call_to_action' => 'PILIH PRODUK FAVORITMU',
            'visual_idea' => 'Ilustrasi produk dekoratif.',
        ];

        return view('poster.index', [
            'concept' => $concept,
        ]);
    }
}
