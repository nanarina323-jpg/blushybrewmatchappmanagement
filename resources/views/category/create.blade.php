@include('layout.header')
            <h3 style="color:black; text-align:center;">ADD NEW DRINK CATEGORY</h3>
            <form action="{{ route('category.store') }}" method="POST" onsubmit="return confirm('Are you sure you to save this new category?');">
                @csrf
                <div class="form-group">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"  for="code">Code : </label>
                 <div class="col-sm-8">
                    <input type="text" class="form-control" name="code" id="code" value="{{ $newCode}}" readonly></input>
                </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"  for="categoryname">Category Name : </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="e.g. Refreshing Mojito"></input>
                </div>
                </div>
                        {{-- Error message if field empty--}}
                        @error('categoryname')
                            <div style="color:#fc0808; font-size:15px;" class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"  for="description">Description : </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="description" id="description" placeholder="e.g. Refreshing soda with flavour"></input>
                </div>
                </div>
                    {{-- Error message if field empty--}}
                        @error('description')
                            <div style="color:#fc0808; font-size:15px;" class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    <br>
                </div>
                <button class="btn btn-secondary" style=" margin-top:20px;">
                    <a href="{{route('category.index')}}" style="text-decoration:none; color:white; font-weight:2px;" class="button"><i class="bi bi-arrow-left"></i> Back to list</a>
                </button>
                <button type="submit" class="btn btn-success" style=" margin-top:20px;"><i class="bi bi-floppy"></i> Add to Menu</button>
            </form> 
@include('layout.footer')
