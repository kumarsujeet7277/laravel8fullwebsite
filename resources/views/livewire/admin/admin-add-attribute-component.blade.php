<div>
    <div class="container" style="padding: 30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Attribute
                            </div> 
                            <div class="col-md-6">
                                <a href="{{route('admin.attribute')}}" class="btn btn-success pull-right">All Attribute</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" action="" wire:submit.prevent="storeAttribute">
                            <div class="form-group">
                                <label class="col-md-4 control-level">Attribute Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Attribute Name" class="form-control input-md" wire:model="name" />
                                    @error('name')<p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-level"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
