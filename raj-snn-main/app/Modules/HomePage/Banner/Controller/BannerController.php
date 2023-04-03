<?php

namespace App\Modules\HomePage\Banner\Controller;

use App\Http\Controllers\Controller;
use App\Modules\HomePage\Banner\Model\HomeBanner;
use App\Modules\HomePage\Banner\Request\BannerCreateRequest;
use App\Modules\HomePage\Banner\Request\BannerUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class BannerController extends Controller
{
    /**
     * Display the banner's create form.
     */
    public function create(): Response
    {
        return Inertia::render('HomePage/Banner/Create');
    }

    /**
     * Create the banner's information.
     */
    public function store(BannerCreateRequest $request): RedirectResponse
    {

        $request->store();

        return Redirect::route('banner.create')->with('success', 'saved');
    }

    /**
     * Display the banner's edit form.
     */
    public function edit($id): Response
    {
        $data = HomeBanner::findOrFail($id);
        return Inertia::render('HomePage/Banner/Edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the banner's information.
     */
    public function update(BannerUpdateRequest $request, $id): RedirectResponse
    {
        $data = HomeBanner::findOrFail($id);
        $request->update($data);

        return Redirect::route('banner.edit', $id)->with('success', 'saved');
    }

    /**
     * Display the user's profile form.
     */
    public function list(): Response
    {
        $data = HomeBanner::all()->map(function($d) {
            return [
                'id' => $d->id,
                'title' => $d->title,
            ];
        });
        return Inertia::render('HomePage/Banner/List', [
            'data' => $data,
        ]);
    }

}
