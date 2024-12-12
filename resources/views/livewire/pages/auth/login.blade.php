<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <p class="login-box-msg">Sign in to start your session
        @error('form.email')
        <br>
        <span style="color:red;font-size:14px;font-style:italic">Username atau Password Salah</span>
        @enderror
    </p>
    <form wire:submit="login">
        @csrf
        <div class="mb-3">
            <div class="input-group">
                <input wire:model="form.email" id="email" name="email" type="email"
                    class="form-control @error('form.email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email"
                    required autocomplete="username" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="input-group mb-3">
            <input wire:model="form.password" type="password" id="password" name="password"
                class="form-control @error('form.password') is-invalid @enderror" placeholder="Password"
                autocomplete="current-password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            {{-- <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div> --}}
            <!-- /.col -->
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <div class="col-12">
                <a href="{{ route('register') }}" class="btn btn-danger btn-block">Register a new membership</a>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <p class="mt-3">
        <a href="forgot-password.html">I forgot my password</a>
    </p>
    {{-- <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
    </p> --}}
</div>
