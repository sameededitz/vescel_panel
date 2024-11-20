<div>
    <table class="table display responsive bordered-table mb-0" id="myTable" data-page-length='10'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Last Login</th>
                <th scope="col">Time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><a href="javascript:void(0)" class="text-primary-600"> {{ $loop->iteration }} </a></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->last_login ? $user->last_login->diffForHumans() : 'Never' }}</td>
                    <td>C: {{ $user->created_at->diffForHumans() }}<br>U: {{ $user->updated_at->diffForHumans() }}
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('edit-user', $user->id) }}"
                                class="w-32-px me-4 h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <form action="{{ route('delete-user', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
