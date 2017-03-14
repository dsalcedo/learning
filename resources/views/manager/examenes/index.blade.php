@extends('manager.layouts.app')

@section('titulo', 'Hackrhub')

@section('content')

    {{--<div>--}}
    {{--<a href="https://www.linkedin.com/profile/add?startTask=CERTIFICATION_NAME&org_namee=Hackrhub&cert_name=Testing&cert_url=demo.com&license_num=00001" rel="nofollow" target="_blank">--}}
    {{--<img src="https://download.linkedin.com/desktop/add2profile/buttons/en_US.png " alt="LinkedIn Add to Profile button">--}}
    {{--</a>--}}
    {{--</div>--}}
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <a href="{{ route('examenes.crear', $carrera->id) }}">
            Agregar
        </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        $('#linkCarreras').addClass('active');
    </script>
@endsection