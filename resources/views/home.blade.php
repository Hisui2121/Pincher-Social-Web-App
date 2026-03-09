<x-layout>
    <x-slot:title>Home Feed</x-slot>
    <div class="max-w-2x1 mx-auto">
        <h1 class="hPinch">Latest Pinches</h1>
        <div class="card-bg">
            <div class="card-form-body">
                <form method="POST" action="/pinches">
                    @csrf
                    <div class="form-control">
                        <textarea name="message" placeholder="What's on your pincher mind?"
                        rows="4" class="form-message" class_alias="@error('message') textarea-error @enderror"> {{old('message')}}</textarea>

                        @error('message')
                            <div class="error-label">
                                <span class="text-error"> {{$message}} </span>
                            </div>
                        @enderror
                    </div>

                    <div class="button-container">
                        <button type="submit" class ="pinch-button">
                            Pinch
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @forelse($pinches as $pinch)
            <x-pinch :pinch="$pinch" />
        @empty
            <p class="text-gray-500">No pinches yet. Be the first to pinch!</p>
        @endforelse
        </div>
</x-layout>