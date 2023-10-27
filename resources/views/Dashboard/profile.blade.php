<x-adminheader title="Account Details" />
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">



        <div class="row">
            <div class="col-12 col-md-6 mx-auto grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">my profile</p>
                         
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                           <p>{{session()->get('success')}}</p>
                        </div>
                     @endif
                        <img src="{{URL::asset('uploads/profiles/'.$user->picture)}}" class="mx-auto d-block mb-4"  width="200px" alt="">
                        <form action="{{route('updateUser')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="fullname" placeholder="Name" class="form-control mb-2" value="{{$user->fullname}}" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="email" placeholder="Email" class="form-control mb-2" value="{{$user->email}}" readonly required>
                                </div>
                                <div class="col-lg-12">
                                    <input type="file" name="file" class="form-control mb-2" >
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="password" class="form-control mb-2" value="{{$user->password}}" placeholder="password" required>
                                </div>
                                <div class="col-lg-12">  
                                    <button type="submit" name="register" class="btn btn-info" >save changes</button>
                                </div>
                            </div>
                        </form>
                        
                        
                        
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <x-adminfooter />
