<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hauzeo | User Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('includes/css')
    @include('includes/js')
</head>
<body>

@include('includes/header')

<div class="container-fluid">

    <div class="card center">
        <div class="container">
            <h4>Register Here</h4><hr>
            <form method="POST" action="register_customer" id="register_form">

                @include('includes/flash_message')
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Name<span class="star-rd">&nbsp;*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name" autocomplete="off">
                            @if ($errors->has('name'))
                                <span class="text-danger" id="err_name">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Email<span class="star-rd">&nbsp;*</span></label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email" autocomplete="off">
                            @if ($errors->has('email'))
                                <span class="text-danger" id="err_email">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Phone<span class="star-rd">&nbsp;*</span></label>
                            <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone No." autocomplete="off">
                            @if ($errors->has('phone'))
                                <span class="text-danger" id="err_phone">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Street Address<span class="star-rd">&nbsp;*</span></label>
                            <input type="text" class="form-control str_addr" id="us-autocomplete-pro-address-input" name="street_address" value="{{ old('street_address') }}" placeholder="Enter Street Address" autocomplete="smartystreets">
                            <ul class="us-autocomplete-pro-menu" style="display:none;"></ul>
                            @if ($errors->has('street_address'))
                                <span class="text-danger" id="err_street_address">{{ $errors->first('street_address') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" placeholder="Enter City" readonly>
                            @if ($errors->has('city'))
                                <span class="text-danger" id="err_city">{{ $errors->first('city') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" placeholder="Enter State" readonly>
                            @if ($errors->has('state'))
                                <span class="text-danger" id="err_state">{{ $errors->first('state') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') }}" placeholder="Enter Zip" readonly>
                            @if ($errors->has('zip'))
                                <span class="text-danger" id="err_zip">{{ $errors->first('zip') }}</span>
                            @endif
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="county_name" name="county_name" value="{{ old('county_name') }}">

                    <div class="col-lg-12 pddng">
                        <div class="form-group text-center">
                            <button id="save_btn" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        $("#new_registration").addClass("active");
    });

    $("#name").keyup(function(){
        $("#err_name").html('');
    });
    $("#email").keyup(function(){
        $("#err_email").html('');
    });
    $("#phone").keyup(function(){
        $("#err_phone").html('');
    });
    $(".str_addr").keyup(function(){
        $("#err_street_address").html('');
        $("#err_city").html('');
        $("#err_state").html('');
        $("#err_zip").html('');
    });
    $("#city").keyup(function(){
        $("#err_city").html('');
    });
    $("#state").keyup(function(){
        $("#err_state").html('');
    });
    $("#zip").keyup(function(){
        $("#err_zip").html('');
    });

</script>
</body>
</html>
