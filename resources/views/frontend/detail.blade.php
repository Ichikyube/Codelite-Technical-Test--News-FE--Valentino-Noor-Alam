<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
</head>
<body>
    <a href="{{ route('add') }}">tambahin</a>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tabel-pengguna"></tbody>
    </table>

    <script>
    $.ajax({
        url: "http://127.0.0.1:8000/api/user/{{$id}}",
        method: "GET",
        success: response => {
            let pengguna = response.data
            let updated_at = new Date(pengguna.updated_at)

            $("#nama").val(pengguna.nama)
            $("#email").val(pengguna.email)
            $("#updated_at").html(updated_at.toString())
        }
        function editUser(id) {
            let nama = $("#nama").val()
            let email = $("#email").val()
            let password = $("#password").val()

            if(nama === "") return alert("Nama tidak boleh kosong")
            if(email === "") return alert("Email tidak boleh kosong")

            let fd = new FormData();
            fd.append("nama", nama)
            fd.append("email", email)

            if(password !== "") fd.append("password", password);

            $.ajax({
                url: "http://127.0.0.1:8000/api/pengguna/{{ $id }}/edit"
                method: "POST",
                data: fd,
                processData: false,
                contentType:false,
                success: _ => {
                    window.location.href = "http://127.0.0.1:8000"
                }
            })

        }
    })
</script>
</body>
</html>

