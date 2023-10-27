<x-adminheader title="home" />
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">



        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Our orders</p>
                        
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>customer</th>
                                        {{-- <th>email</th>
                                        <th>customer status</th> --}}
                                        <th>bill</th>
                                        <th>phone</th>
                                        <th>address</th>
                                        <th>order status</th>
                                        <th>order date</th>
                                        <th>products</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($orders as $item)
                                    @php
                                    $i++;
                                @endphp
                                        <tr>
                                            <td>{{ $item->fullname }}</td>
                                            {{-- <td>{{ $item->email}}</td>
                                            <td class="text-info">{{ $item->userStatus}}</td> --}}
                                            <td class="font-weight-bold">${{ $item->bill }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-success">{{ $item->status }}</div>
                                            </td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-info">{{ $item->created_at }}</div>
                                            </td>

                                            <td class="font-weight-medium">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{$i}}">
                                                    products
                                                </button>
                        
                                                <!-- The Modal -->
                                                <div class="modal" id="updateModal{{$i}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                        
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Order Product</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                        
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                 <table class="table-responsive">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                product
                                                                            </th>
                                                                            <th>
                                                                                picture
                                                                            </th>
                                                                            <th>
                                                                                price/Item
                                                                            </th>
                                                                            <th>
                                                                                quantity
                                                                            </th>
                                                                            <th>
                                                                                sub total
                                                                            </th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($orderItems as $oItem)
                                                                        @if($oItem->orderId==$item->id)
                                                                        <tr>
                                                                            <td>
                                                                                im {{$oItem->title}}
                                                                            </td>
                                                                            <td>
                                                                                 <img src="{{URL::asset('uploads/products/'.$oItem->picture)}}" width="100px" alt="">
                                                                            </td>
                                                                            <td>
                                                                                ${{$oItem->price}}
                                                                            </td>
                                                                            <td>
                                                                                 {{$oItem->quantity}}
                                                                            </td>
                                                                            <td>
                                                                                ${{$oItem->quantity * $oItem->price}}
                                                                            </td>
                                                                        </tr>
                                                                        @endif
                                                                        @endforeach

                                                                    </tbody>
                                                                 </table>
                                                            </div>
                        
                                                            
                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if($item->status=='Paid')
                                                <a href="{{URL::to('changeOrderStatus/Accepted/' .$item->id)}}" class="btn btn-success">Accept</a>
                                                <a href="{{URL::to('changeOrderStatus/Rejected/' .$item->id)}}" class="btn btn-danger">Reject</a>
                                                @elseif($item->status=='Accepted')
                                                <a href="{{URL::to('changeOrderStatus/Delivered/' .$item->id)}}" class="btn btn-success">completed</a>
                                                @elseif($item->status=='Delivered')
                                                Already completed
                                                {{-- <a href="{{URL::to('changeOrderStatus/Delivered/' .$item->id)}}" class="btn btn-success">completed</a> --}}
                                                @else
                                                <a href="{{URL::to('changeOrderStatus/Accepted/' .$item->id)}}" class="btn btn-success">Accepted</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <x-adminfooter />
