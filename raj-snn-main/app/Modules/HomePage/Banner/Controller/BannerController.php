<?php

namespace App\Modules\HomePage\Banner\Controller;

use App\Http\Controllers\Controller;
use App\Modules\HomePage\Banner\Model\HomeBanner;
use App\Modules\HomePage\Banner\Request\BannerCreateRequest;
use App\Modules\HomePage\Banner\Request\BannerUpdateRequest;
use App\Modules\HomePage\Banner\Resource\BannerCollection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;

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

        return Redirect::route('banner.create')->with('success', 'created');
    }

    /**
     * Display the banner's edit form.
     */
    public function edit($id): Response
    {
        $banner = HomeBanner::findOrFail($id);
        return Inertia::render('HomePage/Banner/Edit', [
            'banner' => BannerCollection::make($banner),
        ]);
    }

    /**
     * Update the banner's information.
     */
    public function update(BannerUpdateRequest $request, $id): RedirectResponse
    {
        $data = HomeBanner::findOrFail($id);
        $request->update($data);

        return Redirect::route('banner.edit', $id)->with('success', 'updated');
    }

     /**
     * Delete the banner's edit form.
     */
    public function delete(HomeBanner $homeBanner, $id): RedirectResponse
    {
        $banner = HomeBanner::findOrFail($id);
        if(file_exists(storage_path('app/public/'.$homeBanner->image_path.'/'.$banner->image))){
            unlink(storage_path('app/public/'.$homeBanner->image_path.'/'.$banner->image));
        }
        $banner->delete();

        return Redirect::back()->with('success', 'deleted');
    }

    /**
     * Display the user's profile form.
     */
    public function list(Request $request): Response
    {
        $banners = QueryBuilder::for(HomeBanner::class)
                    ->allowedFilters([
                        AllowedFilter::custom('search', new CommonFilter),
                    ])
                    ->paginate(10);
        return Inertia::render('HomePage/Banner/List', [
            'banners' => BannerCollection::collection($banners),
            'filters' => $request->only('filter')
        ]);
    }

}


class CommonFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->where('title', 'LIKE', '%' . $value . '%')
        ->orWhere('sub_title', 'LIKE', '%' . $value . '%');
    }
}
