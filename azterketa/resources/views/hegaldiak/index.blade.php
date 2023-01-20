<div class="mt-5">
        @foreach ($hegaldia as $hegaldi)
        <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">
                $hegaldia->irteera + ' --> ' + $hegaldia->helmuga + ' - ' + $hegaldia->irteeraData + ' (' + $hegaldia->iraupena + ')'
            </div>

            <div class="col-md-3 d-flex justify-content-end">
                <form action="{{ route('destroy', [$hegaldia->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>

        @endforeach
    </div>
</div>