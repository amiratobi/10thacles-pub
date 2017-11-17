@extends ('layouts.master')

@section ('content')
    
    <div class="container">
		<div class="row">
			<div class="col-12 pt-2">
                <h1 class="display-4 text-center">Pay Items</h1>
                <div id="accordion" role="tablist">
                    <div class="card">
                        <div class="card-header bg-dark text-light" role="tab" id="headingOne">
                        <div class="d-flex flex-row">
                            <div>
                                <h5>Division 1</h5>
                            </div>
                            <div class="ml-auto">
                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <button class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> View Groups</button>
                                </a>
                            </div>
                            <div class="ml-2">
                                <a href="#">
                                    <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Group</button>
                                </a>
                            </div>
                        </div>
                        <h5 class="mb-0">
                        </h5>
                        </div>

                        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                
                                <div id="accordion1" role="tablist">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                                            Class 1
                                            </a>
                                        </h5>
                                        </div>

                                        <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion1">
                                        <div class="card-body">
                                            
                                        </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
                                            Class 2
                                            </a>
                                        </h5>
                                        </div>

                                        <div id="collapseOne2" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion1">
                                        <div class="card-body">
                                            
                                        </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne3" aria-expanded="true" aria-controls="collapseOne">
                                            Class 3
                                            </a>
                                        </h5>
                                        </div>

                                        <div id="collapseOne3" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion1">
                                        <div class="card-body">
                                            
                                        </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('scripts')

@endsection