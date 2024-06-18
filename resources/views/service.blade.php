<x-app-layout>
    <div class="table-data">
      <div class="header-wrapper">
        <h4>List Service di Goedank</h4>

        <div class="button-add-wrapper">
          <button class="button-add" id="button-create">
            <span>Add new product</span><i></i>
          </button>
        </div>
      </div>

      <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
          <h2 style="color: white">Create New Product</h2>
          <div class="form-element">
            <label for="service-customer-name">Customer Name</label>
            <input type="text" id="service-customer-name" placeholder="Customer Name" class="input-color"/>
          </div>
          <div class="form-element">
            <label for="service-number">Phone Number</label>
            <input type="text" id="service-name" placeholder="Phone Number" class="input-color"/>
          </div>
          <div class="form-element">
            <label for="service-name">Service Name</label>
            <input type="text" id="service-name" placeholder="Service Name" class="input-color"/>
          </div>
          <div class="form-element">
            <label for="service-code">Service Code</label>
            <input type="text" id="service-code" placeholder="Service Code" class="input-color"/>
          </div>
          <div class="form-element">
            <label for="price">Price</label>
            <input type="text" id="price" placeholder="Quantity" class="input-color"/>
          </div>

          <div class="button-create-submit">
            <button
              type="button"
              class="btn btn-success button-new-list"
              id="button-create-submit"
              onclick="createItem()"
            >
              Create
            </button>
          </div>
        </div>
      </div>

      <div>
        <div class="fitur-wrapper">
          <input id="keyword" type="text" class="form-control fitur" placeholder="Search by Product Name" style="width: 25%" />
          <label for="dropdown" style="margin-top: 20px;" class="fitur">Sort By</label>
          <div class="dropdown fitur" id="dropdown" style="position: static">
            <div class="select">
              <span class="selected">Price</span>
              <div class="caret"></div>
            </div>
            <ul class="menu">
              <li>Product Name</li>
              <li>Product Code</li>
              <li class="active">Price</li>
            </ul>
            </div>
          <label for="start_date" style="margin-top: 20px;" class="fitur">Start date</label>
          <input type="date" id="start_date" class="fitur">
          <label for="end_date" class="fitur" style="margin-top: 20px;">End date</label>
          <input type="date"  id="end_date">
      </div>

      <div class="table-list-data">
        <table>
          <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Phone Number</th>
            <th>Service Name</th>
            <th>Service Code</th>
            <th>Price</th>
          </tr>
          <tr>
            <td>1</td>
            <td>Vario</td>
            <td>XX1</td>
            <td>50</td>
            <td>50.000</td>
            <td>image</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Honda</td>
            <td>XX2</td>
            <td>65</td>
            <td>100.000</td>
            <td>image</td>
          </tr>
        </table>
      </div>
    </div>
</x-app-layout>