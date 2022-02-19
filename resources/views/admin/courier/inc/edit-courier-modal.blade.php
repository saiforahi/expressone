<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <small>Courier Information add</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" method="post" action="{{ route('addEditCourier', $courier->id) }}"
                            autocomplete="off" class="form-horizontal form-label-left input_mask">
                            @csrf

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" placeholder="Arafat" name="first_name"
                                    id="first_name" value="{{ $courier->first_name }}">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" placeholder="Ahmed" name="last_name"
                                    id="last_name" value="{{ $courier->last_name }}">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" placeholder="abc@gmail.com" name="email"
                                    id="email" value="{{ $courier->email }}">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" placeholder="01234567898" name="phone"
                                    id="phone" value="{{ $courier->phone }}">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="phone">NID:</label>
                                <input type="text" class="form-control @error('nid') is-invalid @enderror" name="nid"
                                    value="{{ $courier->nid_no }}" placeholder="NID" required="" />
                                @error('nid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="salary">Salary:</label>
                                <input type="text" class="form-control" placeholder="salary" name="salary"
                                    id="salary" value="{{ $courier->salary }}" required>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="address">Address:</label>
                                <textarea type="text" class="form-control" name="address"
                                    id="address">{{ $courier->address }}</textarea>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php $units = \App\Models\Unit::where('admin_id',auth()->guard('admin')->user()->id)->get(); ?>
                                <label class="form-label">Unit:</label>
                                <select name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror"
                                    value="{{ old('unit') }}" required>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}" @if($unit->id==$courier->unit)selected @endif>{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                @error('unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" placeholder="*******" name="password"
                                    id="password">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="password_confirmation ">Confirm Password:</label>
                                <input type="password" class="form-control" placeholder="*******"
                                    name="password_confirmation" id="password_confirmation">
                            </div>
                            <hr>
                            <div class="col-md-12 form-group has-feedback ">
                                <button type="submit" class="btn btn-success pull-right"><i
                                        class="mdi mdi-content-save m-r-3"></i>Save
                                </button>
                                <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">
                                    <i class="mdi mdi-cancel m-r-3"></i>Cancel
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>