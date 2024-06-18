<x-app-layout>
  <div class="table-data">
    <div class="header-wrapper">
      <h4>List Barang Terjual di Goedank</h4>
    
        <div class="button-add-wrapper">    
          <button class="button-add" id="button-create"><span>Add new sold product</span><i></i></button>
        </div>
    </div>

    <div class="popup">
      <div class="close-btn">&times;</div>
      <div class="form">
          <h2 style="color: white;">Add New Sold Product</h2>
          <div class="form-element">
            <label for="sold-name">Product Name</label>
            <input type="text" id="sold-name" placeholder="Product Name" />
          </div>
          <div class="form-element">
            <label for="sold-code">Product Code</label>
            <input type="text" id="sold-code" placeholder="Product Code" />
          </div>
          <div class="form-element">
            <label for="sold-quantity">Quantity</label>
            <input type="text" id="sold-quantity" placeholder="Quantity" />
          </div>
          <div class="form-element">
            <label for="sold-price">Price</label>
            <input type="text" id="sold-price" placeholder="Quantity" />
          </div>
          <div class="form-element">
            <label for="sold-image">Image</label>
            <input type="file" id="sold-image" />
          </div>

          <div class="button-create-submit">
              <button type="button" class="btn btn-success button-new-list"
              id="button-create-submit" onclick="createItem()">Create</button>
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
        <th>Buyer name</th>
        <th>Phone Number</th>
        <th>Product Name</th>
        <th>Product Code</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Image</th>
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