<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchController extends Controller
{
    public function searchProperties(Request $request): JsonResponse
    {

        $name = $request->query('name');
        $bedrooms = $request->query('bedrooms');
        $bathrooms = $request->query('bathrooms');
        $garages = $request->query('garages');
        $storeys = $request->query('storeys');
        $price = $request->query('price');

        // explode this search and get the max and the min from this string, convert to a integer and store it in another variable
        $priceRange = explode('-', $price);
        $minPrice = (int) $priceRange[0];
        $maxPrice = (int) $priceRange[1];

        if ($minPrice > $maxPrice) {
            return response()->json([
                'error' => 'Invalid price range',
            ], 400);
        }


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
            ->when($price, function ($query) use ($minPrice, $maxPrice) {
                $query->where('price', '>=', $minPrice)
                    ->where('price', '<=', $maxPrice);
            })
            ->get();

        return response()->json([
            'properties' => $searchResults,
        ]);
    }
}
