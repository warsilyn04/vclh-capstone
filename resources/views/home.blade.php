<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{Auth::user()->name}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('admin_assets/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('admin_assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xl-6 mt-3 mx-auto">
                <h1 class="my-5">Add Your Lodging House / Inn Information.</h1>
                <div class="bg-secondary rounded p-4 mb-5">
                    <form action="{{route('inns.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="inn_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Number of Rooms</label>
                            <input type="number" name="number_of_rooms" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Location ID</label>
                            <input type="number" name="location_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <select name="freebie_id" class="form-select mb-3 w-75 d-inline" aria-label="Default select example">
                                <option value="">Select Freebies</option>
                                @if (count($freebies) > 0)
                                    @foreach ($freebies as $freebie)
                                    <option value="{{$freebie->id}}">with {{$freebie->freebie}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <button type="button" class="btn btn-primary fw-bold float-end" data-bs-toggle="modal" data-bs-target="#addFreebies">
                                +
                            </button>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image</label>
                            <input type="file" name="room_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
       <!-- Modal -->
 <div class="modal fade" id="addFreebies" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add New Freebie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <form action="{{route('freebies.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="freebie" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('admin_assets/lib/chart/chart.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/tempusdominus/js/moment.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('admin_assets/js/main.js')}}"></script>
</html>