<x-layout>
    <x-slot:title>Pre Test 1</x-slot:title>
    <div class="container mt-5">
        <x-offcanvas></x-offcanvas>
        <div class="row mt-5 gap-5 justify-content-center" style="height: 300px;">
            <div class="col-5 border border-dark p-5 rounded">
                <h3>No.1</h3>
                <div class="d-flex justify-content-center w-100 mt-5 mb-5 rounded">
                    <div class="card shadow-lg" style="width: 18rem;">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th class="w-50">Nama</th>
                                    <td>: {{ $nama }}</td>
                                </tr>
                                <tr>
                                    <th class="w-50">Usia</th>
                                    <td>: {{ $usia }}</td>
                                </tr>
                                <tr>
                                    <th class="w-50">Status</th>
                                    <td>: {{ $status }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5 border border-dark p-5 rounded">
                <h3>No.2</h3>
                <div class="d-flex justify-content-center w-100 mt-5 mb-5 rounded">
                    <div class="card shadow-lg" style="width: 18rem;">
                        <form action="{{route('pretest1.usiaku')}}" method="post">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <label for="usia" class="form-label">Usia</label>
                                <input id="usia" name="usia" class="form-control form-control-sm" type="number" placeholder="Masukan Usia" min="1">
                                <button type="submit" hidden>submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>