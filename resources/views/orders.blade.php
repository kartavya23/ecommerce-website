<x-header title="orders" description="hello word" keywords="virat jaiswal,E-commerce, Best traning center,login page" />



<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-8 mx-auto">
                <div class="section-title">
                    <h2>MY Order history</h2>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Total Bill
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Order Date
                            </th>
                            <th>
                                View Products
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($orders as $item)
                            @php
                                $i++;
                            @endphp
                            <tr>

                                <td>
                                    {{ $i }}
                                </td>
                                <td>
                                    {{ $item->bill }}
                                </td>
                                <td>
                                    {{ $item->fullname }}
                                </td>
                                <td>
                                    {{ $item->address }}
                                </td>
                                <td>
                                    {{ $item->phone }}
                                </td>
                                <td>
                                    {{ $item->status }}
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#myModal-{{$item->id}}">
                                        Products
                                    </button>

                                    <!-- The Modal -->
                                    <div class="modal" id="myModal-{{$item->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">all products</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                               <th> product</th>
                                                               <th> quantity</th>
                                                               <th> price</th>
                                                               <th> sub total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($items as $product)
                                                                @if($item->id == $product->orderId)
                                                                <tr>
                                                                    <td>
                                                                        <img src="{{URL::asset('uploads/products/'.$product->picture)}}" width="100px" alt="">
                                                                        {{$product->title}}
                                                                    </td>
                                                                    <td>
                                                                        {{$product->quantity}}
                                                                    </td>
                                                                    <td>
                                                                        {{$product->price}}
                                                                    </td>
                                                                    <td>
                                                                        {{$product->price * $product->quantity}}
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<x-footer />
