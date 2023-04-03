<?php

namespace App\Modules\Authentication\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Authentication\Request\PasswordResetRequest;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/ForgotPassword', [
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(PasswordResetRequest $request): RedirectResponse
    {
        $status = $request->sendResetLinkStatus();
        return back()->with('status', __($status));

    }
}
