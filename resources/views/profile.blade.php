<x-header title="profile" description="hello word" keywords="virat jaiswal,E-commerce, Best traning center,login page"/>

    

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
              
                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="section-title">
                          <h2>MY Account</h2>
                    </div>

                    <div class="contact__form">
                        @if(session()->has('error'))
                        <div class="alert alert-danger">
                           <p>{{session()->get('error')}}</p>
                        </div>
                     @endif
                       
                     
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
                                    <input type="text" name="fullname" placeholder="Name" value="{{$user->fullname}}" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="email" placeholder="Email" value="{{$user->email}}" readonly required>
                                </div>
                                <div class="col-lg-12">
                                    <input type="file" name="file" >
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="password" value="{{$user->password}}" placeholder="password" required>
                                </div>
                                <div class="col-lg-12">  
                                    <button type="submit" name="register" class="site-btn">save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

  <x-footer/>