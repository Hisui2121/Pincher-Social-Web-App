<x-layout>
    <x-slot:title>
        Edit Pinch
    </x-slot>
    
        <div class="edit-container">
        <h1 class="edit-h1">Edit Pinch</h1>
            <div class="edit-card-bg">
            
                <div class="edit-card-body">
                    <form action="/pinches/{{$pinch->id}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="edit-form-control">
                            <textarea name="message" class="edit-textarea @error('message') textarea-error @enderror" rows="4" maxlength="255" 
                            required>{{old('message', $pinch->message)}}
                            </textarea>

                            @error('message')
                                <div class="err-label">
                                    <span class="err-label-text">
                                    {{$message}}
                                    </span>
                                </div>
                            @enderror
                        </div>
                        
                        <div class="cancel-card">
                            <a href="/" class="cancel-btn">
                                Cancel
                            </a>
                            <button type="submit" class="cancel-submit-btn">
                                Update Pinch
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-layout>