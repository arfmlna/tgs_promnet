<x-layout>
    <x-slot:title>Pre Test 2</x-slot:title>
    <!-- Modal post-->
    <div class="modal modal-lg fade" id="post" tabindex="-1" aria-labelledby="postLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form id="form" action="" method="post">
                @csrf 
            <div id="methodPlaceholder"></div>
            <div id="inputHidden"></div>
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="postLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input id="nama" name="nama" class="form-control" type="text" placeholder="Masukan Usia" min="1">
                        </div>
                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur</label>
                            <input id="umur" name="umur" class="form-control" type="number" placeholder="Masukan Usia" min="1">
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input id="kelas" name="kelas" class="form-control" type="text" placeholder="Masukan Usia" min="1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <x-offcanvas></x-offcanvas>
        <!-- Button trigger modal -->
        <br>
        <button onclick="openModal('create')" type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#post">
            <i class="fa-solid fa-plus fa-beat"></i>
        </button>

        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $siswa) 
                <tr>
                    <th scope="row">{{$siswa->id}}</th>
                    <td>{{$siswa->nama}}</td>
                    <td>{{$siswa->umur}}</td>
                    <td>{{$siswa->kelas}}</td>
                    <td class="d-flex gap-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#post" onclick="openModal('edit', '{{$siswa->id}}')">
                            <i class="fa-solid fa-pen-to-square fa-shake"></i>
                        </button>
                        <form action="{{route('pretest2.delete', $siswa->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="fa-solid fa-trash fa-shake"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        const form = document.getElementById('form')
        const inputHidden = document.getElementById('inputHidden')
        var input = document.createElement('input');
        var methodPlaceholder = document.getElementById('methodPlaceholder')
        input.id = 'edit_id'; 
        input.name = 'edit_id';
        input.hidden = true;

        function openModal(action, id = null){
            id = parseInt(id)
            if (action == 'edit') {
                form.action = "{{route('pretest2.edit', "+ id +")}}"
                methodPlaceholder.innerHTML = '@method("PUT")'
                inputHidden.appendChild(input)
                fetch(`/pretest2_specific/${id}`)
                .then(response => response.json()) 
                .then(data => { 
                    document.getElementById('edit_id').value = data.id 
                    document.getElementById('nama').value = data.nama;
                    document.getElementById('umur').value = data.umur;
                    document.getElementById('kelas').value = data.kelas;
                });
            } else if (action == 'create') {
                    form.action = "{{route('pretest2.create')}}"
                    methodPlaceholder.innerHTML = '@method("POST")'
                    if (document.getElementById('edit_id')) { 
                        document.getElementById('edit_id').remove(); 
                        document.getElementById('nama').value = "";
                        document.getElementById('umur').value = "";
                        document.getElementById('kelas').value = "";
                }
            }
        }
    </script>
</x-layout>