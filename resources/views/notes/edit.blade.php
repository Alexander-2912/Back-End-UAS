<x-app-layout>
    <div class="table-data">
        <div class="header-wrapper">
            <h4>Edit Note</h4>
        </div>
        <style>
            .putih {
                color: black;
            }
        </style>
        <div class="">
            <form method="POST" action="{{ route('notes.update', ['note' => $note->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-element">
                    <label for="description" class="putih">Description</label>
                    <textarea id="description" name="description" class="form-control" required>{{ $note->description }}</textarea>
                </div>
                <div class="form-element">
                    <label for="date" class="putih">Date</label>
                    <input type="date" id="date" name="date" class="form-control"
                        value="{{ $note->date->format('Y-m-d') }}" required>

                </div>
                <div class="form-element">
                    <input type="checkbox" id="important" name="important" value="1"
                        @if ($note->important) checked @endif>
                    <label for="important" style="color: black">Important</label>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
