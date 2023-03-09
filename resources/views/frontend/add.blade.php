<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
</head>
<body>

    <div class="container mt-5">
        <a href="/" class="btn btn-success mb-3">List</a>
        @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert" style="width: 60%">
            <strong>{{ $message }}</strong>
          </div>
        @endif
    </div>
    <h5 class="card-header">Add User</h5>
    <form action="">
        @csrf
        <label for="nama">Nama</label>
        <input type="text" id="nama">
        <label for="email">Email</label>
        <input type="email" id="email">
        <label for="password">Password</label>
        <input type="password" id="password">
        <button onclick="add()">Submit</button>
    </form>
    <script>
        function add() {
            let name = $("#nama").val()
            let email = $("#email").val()
            let password = $("#password").val()

            if(nama === "") return alert("Nama tidak boleh kosong")
            if(email === "") return alert("Email tidak boleh kosong")
            if(password === "") return alert("Password tidak boleh kosong")
            let fd = new FormData();
            fd.append("name", name)
            fd.append("email", email)
            fd.append("password", password)
            $.ajax({
                url: "http://127.0.0.1:8000/api/user",
                method: "POST",
                data: fd,
                processData: false,
                contentType: false,
                success: _ => {
                    window.location.href = "http://127.0.0.1:8000"
                }
            })
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>

</body>
</html>
