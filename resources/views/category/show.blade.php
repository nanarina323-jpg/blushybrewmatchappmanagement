@include('layout.header')
            <h3 style="color:black; text-align:center;">CATEGORY INFORMATION</h3>
            <table class="table table-bordered" style="margin-top:20px;">
                <tbody>
                    <tr>
                        <td style="width:150px; color:black; font-weight:bold;">Code </td>
                        <td style="color:blue; color:darkblue; font-weight:bold;">{{ $ctgry->code}}</td>
                    </tr>
                    <tr>
                        <td style="width:150px; color:black; font-weight:bold;">Category Name </td>
                        <td>{{ $ctgry->categoryname}}</td>
                    </tr>
                    <tr>
                        <td style="width:150px; color:black; font-weight:bold;">Description </td>
                        <td>{{ $ctgry->description}}</td>
                    </tr>
                   <tr>
                    <td style="width:150px; color:black; font-weight:bold;">List of Drink</td>
                    <td>
                        @if ($drinks->isNotEmpty())
                            <ul>
                                @foreach($drinks as $drink)
                                    <li>{{ $drink->code }} - {{ $drink->flavourname }}</li>
                                @endforeach
                            </ul>
                        @else
                            <!-- To display unavailable message if catagory not yet have a drink-->
                            <span style="color:gray;">No drink available</span>
                        @endif
                    </td>
                </tr>

                </tbody>
            </table>
            <button class="btn btn-secondary">
                    <a href="{{route('category.index')}}" style="text-decoration:none; color:white; font-weight:2px;" class="button"><i class="bi bi-arrow-left"></i> Back to list</a>
                </button>
@include('layout.footer')
