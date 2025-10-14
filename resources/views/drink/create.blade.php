@include('layout.header')
 <h3 style="color:black; text-align:center;">ADD NEW FLAVOUR</h3>
 <br>
            <form action="{{ route('drinkflavour.store') }}" method="POST" onsubmit="return confirm('Are you sure you to save this new flavour?');" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label" for="code">Code : </label>
                    <div class="col-sm-8">
                        <input type="text" name="code" id="code" class="form-control" placeholder="e.g. STB-004CMO" ></input>
                    </div>
                    </div>
                        {{-- Error message if field empty--}}
                        @error('code')
                            <div style="color:#fc0808; font-size:15px;" class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label" for="flavourname">Flavour Name : </label>
                    <div class="col-sm-8">
                        <input type="text" name="flavourname" id="flavourname" class="form-control" placeholder="e.g. Coffee Mist Oreo"></input>
                    </div>
                    </div>
                        {{-- Error message if field empty--}}
                        @error('flavour_name')
                            <div style="color:#fc0808; font-size:15px;" class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label" for="ingredient">Ingredient : </label>
                    <div class="col-sm-8">
                        <input type="text" name="ingredient" id="ingredient" class="form-control" placeholder="e.g. explaination of what contain in drink "></input>
                    </div>
                    </div>
                        {{-- Error message if field empty--}}
                        @error('ingredient')
                            <div style="color:#fc0808; font-size:15px;" class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label" for="categorycode">Category Code : </label>
                    <div class="col-sm-8">
                    <select name="categorycode" id="categorycode" class="form-control" required>
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->code }}">
                                {{ $category->code }} - {{ $category->categoryname }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                    </div>
                   <!-- <input type="text" name="categorycode" id="categorycode" placeholder="e.g. STB-004"></input>-->
                     {{-- Error message if field empty--}}
                        @error('category')
                            <div style="color:#fc0808; font-size:15px;" class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label" for="price">Price (RM) : </label>
                    <div class="col-sm-8">
                        <input type="text" name="price" id="price" class="form-control" placeholder="e.g. 9.00"></input>
                    </div>
                    </div>
                    {{-- Error message if field empty--}}
                        @error('price')
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
                <button type="submit" class="btn btn-success" style="margin-top:20px; "><i class="bi bi-floppy"></i> Add to Menu</button>
            </form> 
@include('layout.footer')