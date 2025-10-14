@include('layout.header')
            <h3 style="color:black; text-align:center;">FLAVOUR INFORMATION</h3>
           @if($drink->photo)
                <div style="text-align:center;">
                    <img src="{{ asset('storage/' . $drink->photo) }}" 
                        alt="Drink Photo" 
                        style="max-width:200px;">
                </div>
            @else
                <p style="text-align:center;">No image available</p>
            @endif
            <table class="table table-bordered" style="margin-top:20px;">
                <tbody>
                    <tr>
                        <td style="width:150px; color:black; font-weight:bold;">Code </td>
                        <td style="color:darkblue; font-weight:bold;">{{ $drink->code}}</td>
                    </tr>
                    <tr>
                        <td style="width:150px; color:black; font-weight:bold;"> Category Code </td>
                        <td style="color:darkblue; font-weight:bold;">{{ $drink->categorycode}}</td>
                    </tr>
                    <tr>
                        <td style="width:150px; color:black; font-weight:bold;">Flavour Name </td>
                        <td>{{ $drink->flavourname}}</td>
                    </tr>
                    <tr> 
                        <td style="width:150px; color:black; font-weight:bold;">Ingredient </td>
                        <td>{{ $drink->ingredient}}</td>
                    </tr>
                    <tr>
                        <td style="width:150px; color:black; font-weight:bold;">Price</td>
                        <td>{{ $drink->price}}.00</td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-secondary">
                    <a href="{{route('drinkflavour.index')}}" style="text-decoration:none; color:white; font-weight:2px;" class="button"><i class="bi bi-arrow-left"></i> Back to list</a>
                </button>
@include('layout.footer')