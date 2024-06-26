<x-app-layout>
    <!-- Container untuk data tabel -->
    <div class="table-data">
        <div class="header-wrapper">
            <h4>Notes</h4>
<!-- Wrapper untuk tombol tambah -->
            <div class="button-add-wrapper">
                <button class="button-add" id="button-create">
                    <span>New notes</span><i></i>
                </button>
            </div>
        </div>
<!-- Popup untuk tambah catatan baru -->
        <div class="popup">
            <div class="close-btn">&times;</div>

            <form method="POST" action="{{ route('notes.store') }}">
                @csrf
                <div class="form-element">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" required></textarea>
                </div>
                <div class="form-element">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="form-element">
                    <input type="checkbox" id="important" name="important" value="1">
                    <label for="important">Important</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- Checkbox untuk filter -->
        <div>
            <input type="checkbox" id="show-important" name="show-important" value="important">
            <label for="show-important" style="margin-top: 20px">Show Only Important</label><br>
        </div>

        <!-- Container untuk menampilkan catatan -->
        <div class="table-list-data" id="table-list-data">
            @foreach ($notes as $item)
                <div class="card-wrapper @if ($item->important) important @endif">
                    <div class="card-date">
                        <span class="date-text">{{ $item->date }}</span>
                    </div>
                    <div style="margin-top: 15px">
                    @if ($item->important)
                        <p>Important note!</p>
                    @endif
</div> 
                    <div class="card-description">
                        <span>{{ $item->description }}</span>
                    </div>
                    <div class="card-actions" style="margin-top: 20px;">
                        <a href="{{ route('notes.edit', ['note' => $item->id]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('notes.destroy', ['note' => $item->id]) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    
                </div>
            @endforeach
        </div>

    </div>
<!-- Script untuk handle filter -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle perubahan pada checkbox
            document.getElementById('show-important').addEventListener('change', function() {
                let isChecked = this.checked;
                filterImportant(isChecked);
            });

             // Fungsi untuk filter catatan penting
            function filterImportant(showImportant) {
                let cards = document.querySelectorAll('.card-wrapper');
                cards.forEach(card => {
                    if (showImportant && !card.classList.contains('important')) {
                        card.style.display = 'none';
                    } else {
                        card.style.display = 'block';
                    }
                });
            }
        });
    </script>
</x-app-layout>
