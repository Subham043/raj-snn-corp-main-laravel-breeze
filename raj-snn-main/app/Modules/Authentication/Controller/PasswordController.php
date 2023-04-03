<?php

namespace App\Modules\Authentication\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Authentication\Request\PasswordRequest;
use Illuminate\Http\RedirectResponse;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(PasswordRequest $request): RedirectResponse
    {

        $request->updateAuthPassword();

        return back();
    }
}
