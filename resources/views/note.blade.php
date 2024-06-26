<x-app-layout>
    <div class="table-data">
        <div class="header-wrapper">
            <h4>Notes</h4>

            <div class="button-add-wrapper">
                <button class="button-add" id="button-create">
                    <span>New notes</span><i></i>
                </button>
            </div>
        </div>

        <div class="popup">
            <div class="close-btn">&times;</div>

            <form class="form" id="cardForm">

                <div class="form-element">
                    <label for="date">Date</label>
                    <input type="date" id="date" class="input-color" name="date" />
                </div>
                <div class="form-element">
                    <label for="description">Description</label>
                    <textarea id="description" class="text-area" name="description" rows="4" column="100"
                        style="width: 100%; color:black"></textarea>
                </div>
                <div class="form-element">
                    <input type="checkbox" id="important" name="important" value="important">
                    <label for="important">Important</label><br>
                </div>
                <div class="button-create-submit">
                    <input type="submit" value="Create" class="btn btn-success button-new-list"
                        id="button-create-submit">
                </div>
            </form>
        </div>
        <div>
            <input type="checkbox" id="important" name="important" value="important">
            <label for="important" style="margin-top: 20px"> important</label><br>
        </div>
        <div class="table-list-data" id="table-list-data">

            <div class="card-wrapper">
                <div class="card-date">
                    <span class="date-text">adawd</span>
                </div>
                <div class="card-description">
                    <span>ad</span>
                </div>
            </div>
        </div>

    </div>


</x-app-layout>
