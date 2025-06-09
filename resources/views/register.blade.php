<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
    <p>Congrats new patient</p>
    <form action="/loguot" method="post">
        @csrf
        <button>Log Out</button>
    </form>

    <div style="border: 3px solid black">
        <h2>Konsultasi</h2>
        <form action="/konsultasi" method="post">
            @csrf
            <textarea name="pertanyaan" placeholder="Keluhan" ></textarea>
            <textarea name="jawaban" placeholder="Solusi"></textarea>
            <button>Simpan</button>
        </form>
    </div>

    @else
    <div style="max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; color: #333; margin-bottom: 20px;">Registration</h2>
    <form action="/register" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; color: #555;">Name</label>
            <input name="name" type="text" placeholder="Enter your name" 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; color: #555;">Email</label>
            <input name="email" type="email" placeholder="Enter your email" 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; color: #555;">Password</label>
            <input name="password" type="password" placeholder="Create a password" 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
        </div>
        
        <button type="submit" 
                style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
            Register
        </button>


        <div style="border: 3px solid black">
        <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <input name="loginEmail" type="text" placeholder="email">
            <input name="loginPassword" type="password" placeholder="password">
            <button>Log in</button>
        </form>
    </div>

    </form>
    @endauth
</div>
</body>
</html>
