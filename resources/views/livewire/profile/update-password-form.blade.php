<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Current Password</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Current Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">New Password</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="New Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Confirm Password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </div>
    </form>
