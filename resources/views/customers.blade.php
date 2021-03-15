<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hauzeo | Customers</title>
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
            <h4>Customers</h4><hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Street Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Country</th>
                    <th>Created Date | Time</th>
                    <th>Profile Status</th>
                </tr>
                </thead>
                <tbody>
                @if(count($customer_data) > 0)
                    @foreach($customer_data as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td class="wwrap wdth">{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->street_address}}</td>
                            <td>{{$data->city}}</td>
                            <td>{{$data->state}}</td>
                            <td>{{$data->zip}}</td>
                            <td>{{$data->country}}</td>
                            <td class="text-center">{{date('d-m-Y | h:i A', strtotime($data->created_at))}}</td>
                            @if($data->is_active == 1)
                                <td class="text-center"><i class="fa fa-check clr-grn" aria-hidden="true"></i> Active</td>
                            @else
                                <td class="text-center"><i class="fa fa-times clr-rd" aria-hidden="true"></i> Inactive</td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan='5'>No record found.</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {{$customer_data->links()}}
        </div>

    </div>
</div>

<script>

    $(document).ready(function () {
        $("#view_customers").addClass("active");
    });

</script>
</body>
</html>
