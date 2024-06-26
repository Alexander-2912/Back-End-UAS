<x-app-layout>
    <!-- Container untuk data tabel -->
    <div class="table-data">
        <!-- Wrapper untuk judul -->
        <div class="header-wrapper">
            <h4>Edit Note</h4>
        </div>
        <style>
            .putih {
                color: black;
            }
        </style>
        <div class="">
            <!-- Form untuk mengirimkan data update catatan -->
            <form method="POST" action="{{ route('notes.update', ['note' => $note->id]) }}">
                @csrf
                @method('PUT')
                <!-- Input untuk deskripsi catatan -->
                <div class="form-element" style="margin: 0; margin-top: 3%">
                    <label for="description" class="putih">Description</label>
                    <textarea id="description" name="description" class="form-control" required>{{ $note->description }}</textarea>
                </div>
                <!-- Input untuk tanggal catatan -->
                <div class="form-element" style="margin: 0; margin-top: 3%">
                    <label for="date" class="putih">Date</label>
                    <input type="date" id="date" name="date" class="form-control"
                        value="{{ $note->date->format('Y-m-d') }}" required>

                </div>
                <!-- Checkbox untuk menandai penting atau tidak -->
                <div class="form-element" style="margin: 0; margin-top: 3%">
                    <input type="checkbox" id="important" name="important" value="1"
                        @if ($note->important) checked @endif>
                    <label for="important" style="color: black">Important</label>
                </div>
                <!-- Tombol untuk mengirimkan form update -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
