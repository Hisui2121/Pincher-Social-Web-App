<x:layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="hero">
        <div class="hero-content">
            <div class="card">
                <div class="card-body">
                    <h1 class="hRegister">Create Account</h1>
                    <form action="/register" method="POST">
                        @csrf

                        <label class="floating-label">
                            <input type="text"
                                    name="name"
                                    placeholder="Juan DelaCruz"
                                    value="{{ old('name')}}"
                                    class="input"
                                    required>
                            <span>Name</span>
                        </label>
                        @error('name')
                            <div class="label">
                                <span class="label-text-alt">{{$message}}</span>
                            </div>
                        @enderror

                        <label class="floating-label">
                            <input type="email"
                                    name="email"
                                    placeholder="[mail@example.com](<mailto:mail@example.com>)"
                                    class="input @error('email') input-error @enderror"
                                    required>
                            <span>Email</span>
                        </label>
                        @error('email')
                            <div class="label">
                                <span class="label-text-alt">{{$message}}</span>
                            </div>
                        @enderror

                        <label class="floating-label">
                            <input type="password"
                                    name="password"
                                    placeholder="••••••••"
                                    class="input @error('password') input-error @enderror"
                                    required>
                            <span>Password</span>
                        </label>
                        @error('password')
                            <div class="label">
                                <span class="label-text-alt"> {{$message}} </span>
                            </div>
                        @enderror

                        <label class="floating-label">
                            <input type="password"
                                    name="password_confirmation"
                                    placeholder="••••••••"
                                    class="input @error('password') input-error @enderror"
                                    required>
                            <span>Confirm Password</span>
                        </label>

                        <div class="form-control">
                            <button type="submit" class="btn-register">
                                Register
                            </button>
                        </div>
                    </form>

                    <div class="divider">OR</div>
                    <p class="text-center">
                        Already have an account?
                        <a href="/login" class="link">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x:layout>