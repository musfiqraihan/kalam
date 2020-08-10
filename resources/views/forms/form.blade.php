@extends('layouts/app')

@section('content')
<style media="screen">
  .custom-design{
    font-size: 40px;
    padding-left:2px;
    padding-right: 2px;
    cursor: pointer;
  }
</style>




  <div class="container my-5">
      <!-- Vertical Layout | With Floating Label -->
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="row">
                  <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="body">
                        <form action="" method="POST">
                            @csrf
                            <h4 class="text-center mb-4">Merchant Information</h4>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="businessname" class="form-control" name="businessname" placeholder="Enter businessname">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" id="phone" class="form-control" name="phone" placeholder="Enter phone">
                                </div>
                            </div>


                            <div class="row">

                              <div class="col-md-4 col-lg-4">
                                <div class="form-group form-float">
                                  <label>Select Division</label>
                                      <select name="division" id="division" class="form-control show-tick">
                                        <option selected="" disabled="">Select</option>
                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                              </div>

                              <div class="col-md-4 col-lg-4">
                                <div class="form-group form-float">
                                  <label for="category">Select District</label>
                                      <select name="district" id="district" class="form-control show-tick">
                                        <option selected="" disabled="">Select</option>

                                              <option value=""></option>

                                        </select>
                                </div>
                              </div>
                              <div class="col-md-4 col-lg-4">
                                <div class="form-group form-float">
                                  <label for="category">Select Upazila</label>
                                      <select name="upazila" id="upazila" class="form-control show-tick">
                                        <option selected="" disabled="">Select</option>

                                              <option value=""></option>

                                        </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 col-lg-4">
                                <div class="form-group form-float mb-5">
                                <label>Reference</label>
                                  <select name="reference" onchange="myFunction()" id="reference" class="form-control show-tick">
                                    <option selected="" disabled="">Select</option>
                                    <option value="social">Social</option>
                                    <option value="markting">Markting officer</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-8 col-lg-8">
                                <div id="show" style="display:none;">
                                  <label style="margin-bottom:10px;">Social Icons</label><br>
                                <i class="fab fa-facebook-square custom-design"></i>
                                <i class="fab fa-instagram custom-design"></i>
                                <i class="fab fa-twitter-square custom-design"></i>
                                <i class="fab fa-linkedin custom-design"></i>
                                </div>


                              </div>

                            </div>



                            <button type="submit" class="btn btn-primary m-t-15 waves-effect btn-block">SUBMIT</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>


<script type="text/javascript">
function myFunction(){
    var selected = document.getElementById("reference").value;
    if ( selected == 'social' ) {
        document.getElementById("show").style.display = "block";
    }else{
      document.getElementById("show").style.display = "none";
    }
}

</script>





  <script type="text/javascript">
          jQuery(document).ready(function() {

              jQuery('select[name="district"]').attr('disabled', 'disabled');
              jQuery('select[name="upazila"]').attr('disabled', 'disabled');

              jQuery('select[name="division"]').on('change', function() {
                  var divisionID = jQuery(this).val();
                  if (divisionID) {
                    jQuery('select[name="district"]').attr('disabled', 'disabled');
                    jQuery('select[name="upazila"]').attr('disabled', 'disabled');

                      jQuery.ajax({
                          url: '/getdistricts/' + divisionID,
                          type: "GET",
                          dataType: "json",
                          success: function(data) {
                              jQuery('select[name="district"]').empty();
                              jQuery('select[name="upazila"]').empty();
                              $('select[name="district"]').append('<option selected="" disabled="">Select</option>');
                              $('select[name="upazila"]').append('<option selected="" disabled="">Select</option>');
                              jQuery.each(data, function(key, value) {
                                  $('select[name="district"]').append('<option value="' + key + '">' + value + '</option>');
                              });
                              jQuery('select[name="district"]').removeAttr('disabled');
                          }
                      });

                  } else {
                      $('select[name="district"]').empty();
                      $('select[name="upazila"]').empty();
                  }
              });


          });

          jQuery(document).ready(function() {


              jQuery('select[name="district"]').on('change', function() {
                  var districtID = jQuery(this).val();
                  if (districtID) {
                      jQuery('select[name="upazila"]').attr('disabled', 'disabled');

                      jQuery.ajax({
                          url: '/getupazilas/' + districtID,
                          type: "GET",
                          dataType: "json",
                          success: function(data) {
                              jQuery('select[name="upazila"]').empty();
                              $('select[name="upazila"]').append('<option selected="" disabled="">Select</option>');
                              jQuery.each(data, function(key, value) {
                                  $('select[name="upazila"]').append('<option value="' + key + '">' + value + '</option>');
                              });
                              jQuery('select[name="upazila"]').removeAttr('disabled');
                          }
                      });

                  } else {
                      $('select[name="district"]').empty();
                      $('select[name="upazila"]').empty();
                  }
              });



          });
      </script>






@endsection
