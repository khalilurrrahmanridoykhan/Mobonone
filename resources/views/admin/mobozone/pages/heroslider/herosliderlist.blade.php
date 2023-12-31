@extends('admin.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Home Heroslider List') }}</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @elseif (Session::has('errors'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('danger') }}
                            </div>
                        @endif

                        {{-- table header --}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <a name="" id="" class="btn btn-success"
                                        href="{{ route('admin.heroslider.create') }}" role="button">Create</a>
                                </div>
                                <div class="col-md-8">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="Search" name="keyword" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-info text-light" type="submit">Button</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        {{-- Table --}}

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 table-responsive p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="80">Id</th>
                                                <th width="80">Image</th>
                                                <th width="80">Slide Name</th>
                                                <th width="100">Status</th>
                                                <th width="100">Created</th>
                                                <th width="100">Edit</th>
                                                <th width="100">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($heroslider))
                                                @foreach ($heroslider as $herosliders)
                                                    <tr>
                                                        <td>{{ $herosliders->home_page_hero_slides_id }}</td>
                                                        <td>
                                                            @if (!empty($herosliders->font_img))
                                                                <img src="{{ asset('uploads/herosliders/fontground/small/' . $herosliders->font_img) }}"
                                                                    width="50" alt="">
                                                            @else
                                                                <img src="{{ asset('no_image/no_image_small.png') }}"
                                                                    width="50" alt="">
                                                            @endif
                                                        </td>
                                                        <td>{{ $herosliders->titile_main }}</td>
                                                        <td>{{ date('d/m/Y', strtotime($herosliders->created_at)) }}</td>
                                                        <td>
                                                            @if ($herosliders->status == 1)
                                                                <span class="badge bg-success">Active</span>
                                                            @else
                                                                <span class="badge bg-danger">Block</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span>
                                                                <a
                                                                    href="{{ route('admin.heroslider.edit', $herosliders->home_page_hero_slides_id) }}"><img
                                                                        src="{{ asset('admin/assets/myImages/edit-property-24.png') }}"
                                                                        alt=""></a>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ route('admin.heroslider.delete', $herosliders->home_page_hero_slides_id) }}"><img
                                                                    src="{{ asset('admin/assets/myImages/delete-24.png') }}"
                                                                    alt=""></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6">
                                                        The row is empty
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                @if (!empty($heroslider))
                                    {{ $heroslider->links('pagination::bootstrap-4') }}
                                @endif
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
