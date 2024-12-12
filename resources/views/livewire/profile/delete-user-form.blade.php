<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<form wire:submit="updatePassword" class="mt-6 space-y-6">
    <div class="card-body">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Password">
            </div>
        </div>
        <button type="submit" class="btn btn-danger float-right">Submit</button>
    </div>
</form>
