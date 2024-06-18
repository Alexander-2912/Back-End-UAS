<x-app-layout>
  <div class="table-data">
    <div class="header-wrapper">
      <h4>List Pembelian Barang untuk Goedank</h4>
    
        <div class="button-add-wrapper">    
          <button class="button-add" id="button-create"><span>Add new product</span><i></i></button>
        </div>
    </div>

    <div class="popup">
      <div class="close-btn">&times;</div>
      
      <form method="post" action="{{route('purchase.store')}}" class="form">
        @csrf
        @method('post')
          <div class="form-element">
            <label for="purchase-seller-name">Seller Name</label>
            <input type="text" id="purchase-seller-name" placeholder="Seller Name" class="input-color" name="sellerName"/>
          </div>
          <div class="form-element">
            <label for="purchase-phone-number">Phone Number</label>
            <input type="text" id="purchase-phone-number" placeholder="Phone Number" class="input-color" name="phoneNumber"/>
          </div>
          <div class="form-element">
            <label for="purchase-name">Product Name</label>
            <input type="text" id="purchase-product-name" placeholder="Product Name" class="input-color" name="productName"/>
          </div>
          <div class="form-element">
            <label for="purchase-code">Product Code</label>
            <input type="text" id="purchase-product-code" placeholder="Product Code" class="input-color" name=productCode/>
          </div>
          <div class="form-element">
            <label for="purchase-quantity">Quantity</label>
            <input type="text" id="purchase-quantity" placeholder="Quantity" class="input-color" name="quantity"/>
          </div>
          <div class="form-element">
            <label for="purchase-price">Price</label>
            <input type="text" id="purchase-price" placeholder="Price" class="input-color" name="price"/>
          </div>
          <div class="form-element">
            <label for="purchase-date">Date</label>
            <input type="date" id="purchase-date" class="input-color" name="date"/>
          </div>

          <div class="button-create-submit">
              <input type="submit" value="Create" class="btn btn-success button-new-list" id="button-create-submit">
          </div>
      </form>
  </div>

  <div>
    <div class="fitur-wrapper">
      <input id="keyword" type="text" class="form-control fitur" placeholder="Search by Product Name" style="width: 25%" />
      <label for="dropdown" style="margin-top: 20px;" class="fitur">Sort By</label>
      <div class="dropdown fitur" id="dropdown">
        <div class="select">
          <span class="selected">Price</span>
          <div class="caret"></div>
        </div>
        <ul class="menu">
          <li>Product Name</li>
          <li>Product Code</li>
          <li class="active-feature">Price</li>
        </ul>
        </div>
        <label for="start_date" style="margin-top: 20px;" class="fitur">Start date</label>
      <input type="date" id="start_date" class="fitur">
      <label for="end_date" class="fitur" style="margin-top: 20px; ">End date</label>
      <input type="date"  id="end_date">
  </div>


  <div class="table-list-data">
    <table>
      <tr>
        <th>ID</th>
        <th>Seller Name</th>
        <th>Phone Number</th>
        <th>Product Name</th>
        <th>Product Code</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Date</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Vin</td>
        <td>Vario</td>
        <td>XX1</td>
        <td>50</td>
        <td>50.000</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Lex</td>
        <td>Honda</td>
        <td>XX2</td>
        <td>65</td>
        <td>100.000</td>
      </tr>
    </table>
  </div>
  </div>
</x-app-layout>
