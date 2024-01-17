<x-adminheader  title="products"/>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">



        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Top Products</p>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewModal">
                            Add New
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="addNewModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add New Product</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{URL::to('AddNewProduct')}}" method="POST" enctype="multipart/form-data">
                                             @csrf
                                             <label for="">title</label>
                                             <input type="text" name="title" placeholder="enter title" class="form-control mb-2" >
                                             <label for="">price</label>
                                             <input type="text" name="price" placeholder="enter price ($)" class="form-control mb-2" >
                                             <label for="">quantity</label>
                                             <input type="number" name="quantity" placeholder="enter quantity" class="form-control mb-2" >
                                             <label for="">picture</label>
                                             <input type="file" name="file"  class="form-control mb-2" >
                                             <label for="">description</label>
                                             <input type="text" name="description" placeholder="enter description"  class="form-control mb-2" >
                                             <label for="">keywords</label>
                                             <input type="text" name="keywords" placeholder="enter keywords"  class="form-control mb-2" >
                                             <label for="">category</label>
                                             <select name="category" class="form-control mb-2" id="">
                                                <option value="">select category</option>
                                                <option value="Accessories">Accessories</option>
                                                <option value="shoes">shoes</option>
                                                <option value="Clothes">Clothes</option>
                                             </select>
                                             <label for="">type</label>
                                             <select name="type" class="form-control mb-2" id="">
                                                <option value="">select type</option>
                                                <option value="Best Sellers">Best Sellers</option>
                                                <option value="new-arrivals">New-Arrivals</option>
                                                <option value="sale">Sale</option>
                                             </select>
                                             <input type="submit" name="save" class="btn btn-success" value="save now">
                                            
                                        </form>
                                    </div>

                                    

                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>title</th>
                                        <th>Piccture</th>
                                        <th>price</th>
                                        <th>quantity</th>
                                        <th>category</th>
                                        <th>type</th>
                                        <th>update</th>
                                        <th>delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($products as $item)
                                    @php
                                    $i++;
                                @endphp
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td><img src="{{ URL::asset('uploads/products/' . $item->picture) }}"
                                                    width="100px" alt=""></td>
                                            <td class="font-weight-bold">${{ $item->price }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-success">{{ $item->category }}</div>
                                            </td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-info">{{ $item->type }}</div>
                                            </td>

                                            <td class="font-weight-medium">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{$i}}">
                                                    Update
                                                </button>
                        
                                                <!-- The Modal -->
                                                <div class="modal" id="updateModal{{$i}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                        
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Update Product</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                        
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <form action="{{URL::to('UpdateProduct')}}" method="POST" enctype="multipart/form-data">
                                                                     @csrf
                                                                     <label for="">title</label>
                                                                     <input type="text" name="title" value="{{$item->title}}" placeholder="enter title" class="form-control mb-2" >
                                                                     <label for="">price</label>
                                                                     <input type="text" name="price" value="{{$item->price}}" placeholder="enter price ($)" class="form-control mb-2" >
                                                                     <label for="">quantity</label>
                                                                     <input type="number" name="quantity" value="{{$item->quantity}}" placeholder="enter quantity" class="form-control mb-2" >
                                                                     <label for="">picture</label>
                                                                     <input type="file" name="file"  class="form-control mb-2" >
                                                                     <label for="">description</label>
                                                                     <input type="text" name="description" value="{{$item->description}}" placeholder="enter description"  class="form-control mb-2" >
                                                                     <label for="">keywords</label>
                                                                     <input type="text" name="keywords" value="{{$item->keywords}}" placeholder="enter keywords"  class="form-control mb-2" >
                                                                     <label for="">category</label>
                                                                     <select name="category" class="form-control mb-2" id="">
                                                                        <option value="{{$item->category}}"value="{{$item->category}}"></option>
                                                                        <option value="Accessories">Accessories</option>
                                                                        <option value="shoes">shoes</option>
                                                                        <option value="Clothes">Clothes</option>
                                                                     </select>
                                                                     <label for="">type</label>
                                                                     <select name="type" class="form-control mb-2" id="">
                                                                        <option value="{{$item->type}}" value="{{$item->type}}"></option>
                                                                        <option value="Best Sellers">Best Sellers</option>
                                                                        <option value="new-arrivals">New-Arrivals</option>
                                                                        <option value="sale">Sale</option>
                                                                     </select>
                                                                     <input type="hidden" name="id" value="{{$item->id}}">
                                                                     <input type="submit" name="save" class="btn btn-success" value="save changes">
                                                                    
                                                                </form>
                                                            </div>
                        
                                                            
                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{URL::to('deleteProduct/' .$item->id)}}" class="btn btn-danger">delete</a>
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
