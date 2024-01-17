<x-header title="register" description="hello word" keywords="virat jaiswal,E-commerce, Best traning center,login page"/>

    

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
              
                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="section-title">
                          <h2>create new account</h2>
                    </div>

                    <div class="contact__form">
                        <form action="{{URL::TO('registerUser')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="fullname" placeholder="Name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-lg-12">
                                    <input type="file" name="file" required>
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" name="password" placeholder="password" required>
                                </div>
                                <div class="col-lg-12">
                                   
                                    <button type="submit" name="register" class="site-btn">Sign up</button>
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