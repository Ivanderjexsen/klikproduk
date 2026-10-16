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

    public function generate(Request $request): View
    {
        $validated = $request->validate([
            'product_name' => ['required', 'string', 'max:100'],
            'poster_style' => [
                'required',
                'in:modern,minimalis,elegan,ceria,futuristik',
            ],
            'poster_prompt' => ['required', 'string', 'max:1000'],
        ]);

        $styleNames = [
            'modern' => 'Modern dan Profesional',
            'minimalis' => 'Minimalis',
            'elegan' => 'Elegan dan Premium',
            'ceria' => 'Ceria dan Berwarna',
            'futuristik' => 'Futuristik',
        ];

        $concept = [
            'product_name' => $validated['product_name'],
            'style' => $styleNames[$validated['poster_style']],
            'description' => $validated['poster_prompt'],
            'headline' => 'Temukan ' . $validated['product_name'] . ' Pilihanmu!',
            'visual_idea' => 'Gunakan gaya '
                . $styleNames[$validated['poster_style']]
                . ' dengan fokus visual pada produk, '
                . 'judul promosi yang jelas, dan tata letak yang menarik.',
        ];

        return view('poster.index', [
            'concept' => $concept,
        ]);
    }
}
