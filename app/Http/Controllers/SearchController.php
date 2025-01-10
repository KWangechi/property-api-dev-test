<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchController extends Controller
{

    public function index(): JsonResponse
    {
        return response()->json([
            "properties" => Property::all()
        ]);
    }


    public function searchProperties(Request $request): JsonResponse
    {

        $name = $request->query('name');
        $bedrooms = (int) ($request->query('bedrooms'));
        $bathrooms = (int) ($request->query('bathrooms'));
        $garages = (int) ($request->query('garages'));
        $storeys = (int) ($request->query('storeys'));
        $price = $request->query('price');

        $searchResults = Property::when($name, function ($query) use ($name) {
            $query->where('name', 'ILIKE', '%' . $name . '%');
        })
            ->when($bedrooms, function ($query) use ($bedrooms) {
                $query->where('bedrooms', '=', $bedrooms);
            })
            ->when($bathrooms, function ($query) use ($bathrooms) {
                $query->where('bathrooms', '=', $bathrooms);
            })
            ->when($storeys, function ($query) use ($storeys) {
                $query->where('storeys', '=', $storeys);
            })
            ->when($garages, function ($query) use ($garages) {
                $query->where('garages', '=', $garages);
            })
            ->when($price, function ($query) use ($price) {
                if ($price) {
                    $priceRange = explode('-', $price);
                }
                $minPrice = (int) $priceRange[0];
                $maxPrice = (int) $priceRange[1];

                if ($minPrice > $maxPrice) {
                    return response()->json([
                        'error' => 'Invalid price range',
                    ], 400);
                }

                $query->where('price', '>=', $minPrice)
                    ->where('price', '<=', $maxPrice);
            })
            ->get();

        return response()->json([
            'properties' => $searchResults,
        ]);
    }
}
