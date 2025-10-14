@include('layout.header')
            <h3 style="margin-bottom:20px; text-align:center;">EDIT INFORMATION </h3>
            <form action="{{ url('category/' . $ctgry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to save this new details?');">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                        <label for="code" class="col-sm-2 col-form-label">Code : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="code" id="code" value="{{ $ctgry->code}}" readonly style="color:darkblue; font-weight:bold;"></input>
                    </div>
                </div>
                <div  class="row mb-3">
                    <label for="categoryname" class="col-sm-2 col-form-label">Category Name : </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="categoryname" id="categoryname" value="{{ $ctgry->categoryname}}" ></input>
                </div>
                </div> 
                    {{-- Error message if field empty--}}
                        @error('categoryname')
                            <div style="color:#fc0808; font-size:15px;" class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    <div class="row mb-3" >
                        <label for="description" class="col-sm-2 col-form-label">Description : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="description" id="description" value="{{ $ctgry->description}}" ></input>
                    </div>
                    </div>
                    {{-- Error message if field empty--}}
                        @error('description')
                            <div style="color:#fc0808; font-size:15px;" class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                </div>
                <button class="btn btn-secondary" style="margin-left:120px; margin-top:20px;">
                    <a href="{{route('category.index')}}" style="text-decoration:none; color:white; font-weight:2px;" class="button"><i class="bi bi-arrow-left"></i> Back to list</a>
                </button>
                <button type="submit" class="btn btn-success" style="margin-top:20px;"><i class="bi bi-floppy"></i> Update details</button>
            </form>       
@include('layout.footer')
