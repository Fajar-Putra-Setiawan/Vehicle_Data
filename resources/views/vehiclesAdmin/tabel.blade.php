<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<table class="table table-striped text-small-on-mobile">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">No Plat</th>
            <th scope="col">Merk Mobil</th>
            <th scope="col">Kerusakan</th>
            <th scope="col">Catatan Khusus</th>
            <th scope="col">Photo</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vehicles as $vehicle)
            <tr>
                <th scope="row">{{ ($vehicles->currentPage() - 1) * $vehicles->perPage() + $loop->iteration }}</th>
                <td>{{ $vehicle->license_plate }}</td>
                <td>{{ $vehicle->car_merk }}</td>
                <td>{{ $vehicle->damage_details }}</td>
                <td>{{ $vehicle->special_notes }}</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('/storage/vehicle/'.$vehicle->vehicle_photo ) }}">
                        <img src="{{ asset('/storage/vehicle/'.$vehicle->vehicle_photo ) }}" alt="" style="width:100px; height:150px">
                    </a>
                </td>
                <td>{{ \Carbon\Carbon::parse($vehicle->entry_date)->format('l, d F Y') }}</td>
                <td>{{ 'Rp '.number_format($vehicle->total_price, 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('vehiclesAdmin.destroy', $vehicle->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center mt-4">
    @if ($vehicles->onFirstPage())
        <button class="btn btn-secondary mx-2" disabled>Previous</button>
    @else
        <a href="{{ $vehicles->previousPageUrl() }}" class="btn btn-primary mx-2">
            <i class="bi bi-arrow-left"></i>Previous
        </a>
    @endif

    @if ($vehicles->hasMorePages())
        <a href="{{ $vehicles->nextPageUrl() }}" class="btn btn-primary mx-2">
            Next<i class="bi bi-arrow-right"></i>
        </a>
    @else
        <button class="btn btn-secondary mx-2" disabled>Next</button>
    @endif

</div>



<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Pratinjau Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" alt="Gambar" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<script>
    // Ketika modal dibuka, ganti sumber gambar dengan gambar yang diklik
    $('#imageModal').on('show.bs.modal', function (e) {
        var imageUrl = $(e.relatedTarget).data('image');
        $('#modalImage').attr('src', imageUrl);
    });
</script>
