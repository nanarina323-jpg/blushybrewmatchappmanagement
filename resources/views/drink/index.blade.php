@include('layout.header')
<h3 style="color:black; text-align:center;">FLAVOUR LIST</h3>
            <button class="btn btn-secondary" style="margin-bottom:10px;">
                <a href="{{ route('drinkflavour.create')}}" style="text-decoration:none; color:white; font-weight:2px;" class="button"><i class="bi bi-plus"></i> Add new Flavour</a>
            </button>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>   No.             </th>
                        <th>   Code            </th>
                        <th>   Flavour Name    </th>
                        <th>   Category Code   </th>
                        <th>   Price (RM)      </th>
                        <th>   Action          </th>
                    </tr>
                    <tbody>
                    @foreach($alldrink as $key=>$r)
                        <tr>
                            <td>{{ ($alldrink->currentPage() - 1) * $alldrink->perPage() + $loop->iteration }}</td>
                            <td>{{ $r->code }}</td>
                            <td>{{ $r->flavourname }}</td>
                            <td>{{ $r->categorycode }}</td>
                            <td>{{ $r->price }}.00</td>
                            <td>
                            <!-- Details Button -->
                            <a href="{{ route('drinkflavour.show', $r->id) }}" class="btn btn-success">
                                <i class="bi bi-info-lg"></i> Details
                            </a>

                            <!-- Edit Button -->
                            <a href="{{ route('drinkflavour.edit', $r->id) }}" class="btn btn-dark">
                                <i class="fa-regular fa-pen-to-square"></i> Edit
                            </a>

                            <!-- Delete Button (inside its own form) -->
                            <form action="{{ url('drinkflavour/' . $r->id) }}" method="POST" 
                                style="display:inline;" 
                                onsubmit="return confirm('Are you sure you want to delete this flavour?');">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash3"></i> Delete
                                </button>
                            </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </thead>
            </table> 
            <div class="Page navigation example">
                {{ $alldrink->links()}}
            </div>
@include('layout.footer')