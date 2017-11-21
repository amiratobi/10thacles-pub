@extends ('layouts.master')

@section ('content')
    
    <div class="container">
		<div class="row">
			<div class="col-12 pt-2">
                <h1 class="display-4 text-center">Pay Items</h1>
                <div id="accordion" role="tablist">
                    @if (!empty($items->divisions))
                        <div class="d-flex flex-row justify-content-between mb-1">
                            <div>
                                <h5 class="ml-2 text-dark-grey-1"> Divisions </h5>
                            </div>
                            <div>
                                <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Division</button>
                            </div>
                        </div>
                        @foreach ($items->divisions as $division)
                            <div class="card">
                                <div class="card-header bg-dark-grey-1 text-light" role="tab" id="headingOne">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <p class="mb-0">{{$loop->iteration}}) {{ $division->name }}</p>
                                        </div>
                                        <div class="ml-auto">
                                            <a data-toggle="collapse" href="#{{$division->_id}}" aria-expanded="true" aria-controls="$division->_id">
                                                <button class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View Groups</button>
                                            </a>
                                        </div>
                                        <div class="ml-2">
                                            <a href="#">
                                                <button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit Division</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div id="{{$division->_id}}" class="collapse" role="tabpanel" aria-labelledby="$division->_id" data-parent="#accordion">
                                    <div class="card-body">
                                        
                                        <div id="div{{$division->_id}}" role="tablist">
                                            <div class="d-flex flex-row justify-content-between mb-1">
                                                <div>
                                                    <h5 class="ml-2 text-dark-grey-1"> Groups </h5>
                                                </div>
                                                <div>
                                                    <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Group</button>
                                                </div>
                                            </div>
                                            @foreach ($division->groups as $group)
                                                <div class="card">
                                                    <div class="card-header bg-dark-grey-2 text-light" role="tab" id="headingOne">
                                                        <div class="d-flex flex-row">
                                                            <div>
                                                                <p class="mb-0">{{$loop->iteration}}) {{ $group->name }}</p>
                                                            </div>
                                                            <div class="ml-auto">
                                                                <a data-toggle="collapse" href="#{{$group->_id}}" aria-expanded="true" aria-controls="$group->_id">
                                                                    <button class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View Classes</button>
                                                                </a>
                                                            </div>
                                                            <div class="ml-2">
                                                                <a href="#">
                                                                    <button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit Group</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="{{$group->_id}}" class="collapse" role="tabpanel" aria-labelledby="$group->_id" data-parent="#div{{$division->_id}}">
                                                        <div class="card-body">
                                                            
                                                            <div id="div{{$group->_id}}" role="tablist">
                                                                <div class="d-flex flex-row justify-content-between mb-1">
                                                                    <div>
                                                                        <h5 class="ml-2 text-dark-grey-1"> Classes </h5>
                                                                    </div>
                                                                    <div>
                                                                        <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Class</button>
                                                                    </div>
                                                                </div>
                                                                @foreach ($group->classes as $class)
                                                                    <div class="card">
                                                                        <div class="card-header bg-dark-grey-3 text-light" role="tab" id="headingOne">
                                                                            <div class="d-flex flex-row">
                                                                                <div>
                                                                                    <p class="mb-0">{{$loop->iteration}}) {{ $class->name }}</p>
                                                                                </div>
                                                                                <div class="ml-auto">
                                                                                    <a data-toggle="collapse" href="#{{$class->_id}}" aria-expanded="true" aria-controls="$class->_id">
                                                                                        <button class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View Items</button>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="ml-2">
                                                                                    <a href="#">
                                                                                        <button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit Class</button>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div id="{{$class->_id}}" class="collapse" role="tabpanel" aria-labelledby="$class->_id" data-parent="#div{{$group->_id}}">
                                                                            <div class="card-body">
                                                                                <div id="div{{$group->_id}}" role="tablist">
                                                                                    <h5 class="ml-2 text-dark-grey-4">Items</h5>
                                                                                        <table class="table">
                                                                                            <thead class="bg-dark-grey-4">
                                                                                                <tr>
                                                                                                    <td>SN</td>
                                                                                                    <td>Item Name</td>
                                                                                                    <td>Item Price</td>
                                                                                                    <td>Price Type</td>
                                                                                                    <td><button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Item</button></td>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach ($class->items as $item)          
                                                                                                    <tr>
                                                                                                        <td>{{$loop->iteration }}</td>
                                                                                                        <td>{{$item->name}}</td>
                                                                                                        <td>{{$item->value}}</td>
                                                                                                        <td>{{$item->valueType}}</td>
                                                                                                        <td><button class="btn btn-sm btn-warning"><i class="fa fa-pencil"> Edit Item</button></td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
    
@section ('scripts')
    <script type="text/javascript">
		$(document).ready(function(){
			$('.nav-link').removeClass('active');
			$('#payitems-navlink').addClass('active');
		});
	</script>
@endsection