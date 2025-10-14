@include('layout.header')
            <h3 style="margin-bottom:20px; text-align:center;">EDIT INFORMATION </h3>
            <form action="{{ url('drinkflavour/' . $drink->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to save this new details?');" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="form-group">
                
                <div class="row mb-3">
                        <label for="code" class="col-sm-2 col-form-label">Code : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="code" id="code" value="{{ $drink->code}}" style="color:darkblue; font-weight:bold;"></input>
                    </div>
                </div>

                <div class="row mb-3">
                        <label for="categorycode" class="col-sm-2 col-form-label">Category Code : </label>
                    <div class="col-sm-8">
                        <select name="categorycode" id="categorycode" class="form-control" required>
                        @foreach($categories as $category)
                        <option  value="{{ $category->code }}" 
                             {{ $drink->categorycode == $category->code ? 'selected' : '' }}>
                                {{ $category->code }} - {{ $category->categoryname }}
                        </option>
                         @endforeach
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                        <label for="flavourname" class="col-sm-2 col-form-label">Flavour Name : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="flavourname" id="flavourname" value="{{ $drink->flavourname}}"></input>
                    </div>
                </div>
                     {{-- Error message if field empty--}}
                        @error('flavourname')
                            <div style="color:#fc0808; font-size:15px;" class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                
                <div class="row mb-3">
                        <label for="ingredient" class="col-sm-2 col-form-label">Ingredient : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="ingredient" id="ingredient" value="{{ $drink->ingredient}}"></input>
                    </div>
                </div>
                     {{-- Error message if field empty--}}
                        @error('ingredient')
                            <div style="color:#fc0808; font-size:15px;" class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                
                <div class="row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">Price (RM) : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="price" id="price" value="{{ $drink->price}}"></input>
                    </div>
                </div>
                     {{-- Error message if field empty--}}
                        @error('description')
                            <div style="color:#fc0808; font-size:15px;" class="text-danger mt-1">{{ $message }}</div>
                        @enderror

                <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label" for="photo">Image : </label>
                <div class="col-sm-8">
                    <input type="file" name="photo" id="photo" class="form-control" placeholder=""></input>
                </div>
                </div>

            </div>
                <button class="btn btn-secondary" style=" margin-top:20px;">
                    <a href="{{route('drinkflavour.index')}}" style="text-decoration:none; color:white; font-weight:2px;" class="button"><i class="bi bi-arrow-left"></i> Back to list</a>
                </button>
                <button type="submit" class="btn btn-success" style="margin-top:20px;"><i class="bi bi-floppy"></i> Update details</button>
            </form>       
@include('layout.footer')
