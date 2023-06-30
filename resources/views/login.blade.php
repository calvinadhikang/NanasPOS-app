<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('sweetalert::alert')
    <div class="grid h-screen place-items-center">
        <div class="rounded-md w-1/2 bg-slate-300 p-4 shadow-xl">
            <h1 class="text-3xl font-bold text-center">Nanas POS App</h1>
            <form method="POST">
                @csrf
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-semibold text-lg">Username</span>
                    </label>
                    <input type="text" placeholder="Masukan Username..." class="input input-bordered w-full" name="username" required/>
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-semibold text-lg">Password</span>
                    </label>
                    <input type="password" placeholder="Masukan Password..." class="input input-bordered w-full" name="password" required/>
                </div>
                <button class="mt-5 btn btn-primary w-full">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
