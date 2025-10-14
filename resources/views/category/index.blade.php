@include('layout.header')
            <h3 style="color:black; text-align:center;">CATEGORY LIST</h3>
            <button class="btn btn-secondary" style="margin-bottom:10px;">
                <a href="{{route('category.create')}}" style="text-decoration:none; color:#fff"><i class="bi bi-plus"></i> Add new Category</a><br>
            </button>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>   No.             </th>
                        <th>   Code            </th>
                        <th>   Category Name   </th>
                        <th>   Description     </th>
                        <th>   Action          </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allcategory as $key=>$r)
                    <tr>
                        <td>{{ ($allcategory->currentPage() - 1) * $allcategory->perPage() + $loop->iteration }}</td>
                        <td>{{ $r->code }}</td>
                        <td>{{ $r->categoryname }}</td>
                        <td>{{ $r->description }}</td>
                        <td>
                            <!-- Details Button -->
                            <a href="{{ route('category.show', $r->id) }}" class="btn btn-success">
                                <i class="bi bi-info-lg"></i> Details
                            </a>

                            <!-- Edit Button -->
                            <a href="{{ route('category.edit', $r->id) }}" class="btn btn-dark">
                                <i class="fa-regular fa-pen-to-square"></i> Edit
                            </a>

                            <!-- Delete Button (inside its own form) -->
                            <form action="{{ url('category/' . $r->id) }}" method="POST" style="display:inline;" 
                                onsubmit="return confirm('Are you sure you want to delete this category?');">
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
            </table>
            <br>
            <div class="Page navigation example">
                {{ $allcategory->links()}}
            </div>
@include('layout.footer')
