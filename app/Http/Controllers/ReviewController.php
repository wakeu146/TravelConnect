<?php

namespace App\Http\Controllers;

use App\Enums\ReviewStatus;
use App\Models\Agency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    public function store(Request $request, string $slug): RedirectResponse
    {
        abort_unless($request->user()->isTraveler(), 403);

        $agencyName = Str::of($slug)->replace('-', ' ')->title()->toString();
        $agency = Agency::where('company_name', $agencyName)->firstOrFail();
        $data = $request->validate([
            'rating' => ['required', 'integer', 'between:1,5'],
            'comment' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        $agency->reviews()->create([
            'user_id' => $request->user()->id,
            'rating' => $data['rating'],
            'comment' => $data['comment'],
            'status' => ReviewStatus::PENDING,
        ]);

        return back()->with('review_status', 'Your review was submitted for approval.');
    }
}
