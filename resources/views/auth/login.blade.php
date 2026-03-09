<x:layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="hero">
        <div class="hero-content">
            <div class="card">
                <div class="card-body">
                    <h1 class="hRegister">Welcome Back!</h1>
                    <form action="/login" method="POST">
                        @csrf

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

                        <div class="form-control">
                            <label class="label">
                                <input type="checkbox"
                                        name="remember"
                                        class="checkbox">
                                <span class="label-text"> Remember me</span>
                            </label>
                        </div>

                        <div class="form-control">
                            <button type="submit" class="btn-register">
                                Sign in
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