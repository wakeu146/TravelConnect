<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FavoriteController extends Controller
{
    public function toggle(Request $request, string $slug): JsonResponse
    {
        abort_unless($request->user()->isTraveler(), 403);

        $agencyName = Str::of($slug)->replace('-', ' ')->title()->toString();
        $agency = Agency::where('company_name', $agencyName)->firstOrFail();
        $favorite = $request->user()->favorites()->where('agency_id', $agency->id)->first();

        if ($favorite) {
            $favorite->delete();
            $saved = false;
        } else {
            $request->user()->favorites()->create(['agency_id' => $agency->id]);
            $saved = true;
        }

        return response()->json(['saved' => $saved]);
    }
}
