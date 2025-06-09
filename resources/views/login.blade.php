<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <div style="border: 3px solid black">
        <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <input name="loginEmail" type="text" placeholder="email">
            <input name="loginPassword" type="password" placeholder="password">
            <button>Log in</button>
        </form>

        {{-- $table->string('id_pasien', 10)->primary();
            $table->foreignId('user_id')->unique()->constrained();
            $table->string('nama_pasien', 255);
            $table->string('jenis_kelamin', 255);
            $table->DATE('tanggal_lahir')->nullabel();
            $table->string('no_telp', 255);
            $table->text('alamat'); --}}
    </div>
</body>
</html> 