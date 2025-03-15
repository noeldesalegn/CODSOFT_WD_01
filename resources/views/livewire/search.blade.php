<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <style>
        /* Custom styling for the input group */
        .custom-input-group .form-control {
            background-color: #e9ecef; /* Light gray background */
            border: 1px solid #ced4da;
        }
        .custom-input-group .btn {
            background-color: #adb5bd; /* A complementary gray shade */
            border: 1px solid #ced4da;
            color: #000;
        }
    </style>
    <form>
        <div class="mt-2">
            <div class="input-group input-group-sm w-100 shadow-sm custom-input-group">
                <input type="text"
                       wire:model.live.debounce="searchText"
                       placeholder="Search here..."
                       class="form-control rounded-start">
                <button class="btn rounded-end" wire:click.prevent="clear()">Clear</button>
            </div>
        </div>

    </form>
    <div class="mt-4">
        <div class="list-group shadow-sm rounded">
            @foreach($results as $result)
                <a href="/post/{{ $result->id }}" class="list-group-item list-group-item-action">
                    {{ $result->title }}
                </a>
            @endforeach
        </div>
    </div>
</div>
