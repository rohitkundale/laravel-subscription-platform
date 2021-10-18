<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribedToWebsite;
use App\Http\Requests\SubscribeRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Website $website
     * @return void
     */
    public function show(Website $website): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Website $website
     * @return void
     */
    public function update(Request $request, Website $website): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Website $website
     * @return void
     */
    public function destroy(Website $website): void
    {
        //
    }

    public function subscribe(SubscribeRequest $request, Website $website): UserResource
    {
        $user = User::findOrFail($request->user_id);
        $website->users()->syncWithoutDetaching($user);

        return new UserResource($user);
    }
}
