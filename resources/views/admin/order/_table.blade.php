<table id="table" class="table table-bordered table-hover ">
    <thead>
    <tr>
        <th>Tên</th>
        <th>ID</th>
        <th>Địa chỉ</th>
        <th>Trạng thái</th>
        <th>xem chi tiết</th>
    </tr>
    </thead>
    <tbody>

    @foreach($orders as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->id }}</td>
            <td>{{ $item->address }}, {{ $item->city }}</td>
            <td>
                @if($item->status->slug === 'chua-xu-ly')
                    <span class="badge bg-danger">{{$item->status->name}}</span>
                @elseif($item->status->slug === 'dang-giao-hang')
                    <span class="badge bg-primary">{{$item->status->name}}</span>
                @else
                    <span class="badge bg-success">{{$item->status->name}}</span>
                @endif
            </td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-info btn-sm" href="{{route('admin.orders.show', $item->id)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        chi tiết
                    </a>
                    <a class="btn btn-danger btn-sm delete-confirm"  href="{{route('admin.orders.destroy', $item->id)}}" data-id="{{$item->id}}">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
