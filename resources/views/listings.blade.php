
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Listings</h3>
  </div>
  <div class="box-body">
    
    <div style="overflow: auto">

      <div class="form-group">
          <label style="margin-left: 10px">Zip</label>
          <select class="form-control select2" style="width: 100px;">
            <option>02108</option>
            <option>etc..</option>
          </select>
          <label style="margin-left: 10px">Purchase Type</label>
          <select class="form-control select2" style="width: 100px;">
            <option>Buy</option>
            <option>Rent</option>
          </select>
          <label style="margin-left: 10px">Price Min</label>
          <select class="form-control select2" style="width: 100px;">
            <option>100,000</option>
            <option>150,000</option>
            <option>200,000</option>
          </select>
          <label style="margin-left: 10px">Price Max</label>
          <select class="form-control select2" style="width: 100px;">
            <option>150,000</option>
            <option>200,000</option>
            <option>250,000</option>
          </select>
          <label style="margin-left: 10px">Beds Min</label>
          <select class="form-control select2" style="width: 100px;">
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
          <label style="margin-left: 10px">Beds Max</label>
          <select class="form-control select2" style="width: 100px;">
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
      </div>
      
    
      <table id="example1" class="table table-bordered table-striped">
          <!-- Date downloaded, Website downloaded from, link to first image, Address, For Rent/For Sale, Property Type, MLS Number, City, Zip, Beds, Baths, Sale Price / Monthly Rent, Sqft, Price per sqft, HOA Dues, Link to details page -->

          <thead>
          <tr>
            <th>Date Downloaded</th>
            <th style="width: 400px">Address</th>
            <th>Rent/Sale</th>
            <th>Sqft</th>
            <th>Beds</th>
            <th>Baths</th>
            <th>Price / Rent</th>
            <th>Zip</th>
            <th>MLS Number</th>
            <th>Link</th>
          </tr>
          </thead>




          <tbody>
            <tr>
              <td>10/16/2018</td>
              <td>123 Main Street Boston, MA 02108</td>
              <td>Sale</td>
              <td>2,000</td>
              <td>4</td>
              <td>3</td>
              <td>$300,000</td>
              <td>A03121</td>
              <td>n/a</td>
              <td><a href="#">Link</a></td>
            </tr>

            <tr>
              <td>10/16/2018</td>
              <td>123 Main Street Boston, MA 02108</td>
              <td>Sale</td>
              <td>2,000</td>
              <td>4</td>
              <td>3</td>
              <td>$300,000</td>
              <td>A03121</td>
              <td>n/a</td>
              <td><a href="#">Link</a></td>
            </tr>

            <tr>
              <td>10/16/2018</td>
              <td>123 Main Street Boston, MA 02108</td>
              <td>Sale</td>
              <td>2,000</td>
              <td>4</td>
              <td>3</td>
              <td>$300,000</td>
              <td>A03121</td>
              <td>n/a</td>
              <td><a href="#">Link</a></td>
            </tr>

            <tr>
              <td>10/16/2018</td>
              <td>123 Main Street Boston, MA 02108</td>
              <td>Sale</td>
              <td>2,000</td>
              <td>4</td>
              <td>3</td>
              <td>$300,000</td>
              <td>A03121</td>
              <td>n/a</td>
              <td><a href="#">Link</a></td>
            </tr>

            <tr>
              <td>10/16/2018</td>
              <td>123 Main Street Boston, MA 02108</td>
              <td>Sale</td>
              <td>2,000</td>
              <td>4</td>
              <td>3</td>
              <td>$300,000</td>
              <td>A03121</td>
              <td>n/a</td>
              <td><a href="#">Link</a></td>
            </tr>

            <tr>
              <td>10/16/2018</td>
              <td>123 Main Street Boston, MA 02108</td>
              <td>Sale</td>
              <td>2,000</td>
              <td>4</td>
              <td>3</td>
              <td>$300,000</td>
              <td>A03121</td>
              <td>n/a</td>
              <td><a href="#">Link</a></td>
            </tr>

            <tr>
              <td>10/16/2018</td>
              <td>123 Main Street Boston, MA 02108</td>
              <td>Sale</td>
              <td>2,000</td>
              <td>4</td>
              <td>3</td>
              <td>$300,000</td>
              <td>A03121</td>
              <td>n/a</td>
              <td><a href="#">Link</a></td>
            </tr>

                              
          </tbody>
        </table>
      </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection
