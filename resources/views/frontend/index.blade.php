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
        url: "http://127.0.0.1:8000/api/user/list",
        method: "GET",
        dataType: "json",
        success: response => {

            let listPengguna = response.data
            let htmlString = ""
            loading: false
            for(let pengguna of listPengguna) {
                console.log(pengguna.id);
                htmlString += `<tr>
                    <td>${pengguna.name}</td>
                    <td>${pengguna.email}</td>
                    <td>
                        <a href="http://127.0.0.1:8000/detail/${pengguna.id}" target="_blank">
                            <button>Detail</button>
                        </a>
                    </td>
                    <td>
                        <button onclick="deleteUser(${pengguna.id})">Hapus</button>
                    </td>
                </tr>`

            }
            let html = $.parseHTML(htmlString)
            $("#tabel-pengguna").append(html)
        }
    })
    function deleteUser(id) {
        console.log("apa")
        $.ajax({
            url: `http://127.0.0.1:8000/api/user/${id}/delete`,
            data: { somefield: "Some field value", _token: '{{csrf_token()}}' },
            method: "POST",
            dataType: "json",
            success:  response=> {
                console.log("SUCCESS");
                window.location.href="";
            },
            error: err => {
                console.log(err)
            }
        })
    }
</script>
</body>
</html>
