<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran Antrian Rs Milano</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex items-center justify-center h-screen">
        <div class="p-1 rounded shadow-lg bg-gradient-to-r from-purple-500 via-green-500 to-blue-500">
            <div class="flex flex-col items-center p-4 space-y-2 bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-green-600 w-28 h-28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h1 class="text-4xl font-bold font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-500">Thank You !</h1>
                <p style="text-align: center;">Terimakasih telah mendaftar, silahkan tunggu pendaftaran anda di konfimasi admin,<br> pemberitahuan akan di simpaikan ke WhatsApp</p>
                <a href="<?= base_url("") ?>" class="inline-flex items-center px-4 py-2 text-white bg-indigo-600 border border-indigo-600 rounded rounded-full hover:bg-indigo-700 focus:outline-none focus:ring">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                    <span class="text-sm font-medium">
                        Home
                    </span>
                </a>
            </div>
        </div>
    </div>
</body>

</html>