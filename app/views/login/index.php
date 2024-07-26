<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login Dashboard</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body
        class="h-screen flex flex-col justify-center items-center bg-gray-100"
    >
        <div class="-mt-20 mb-28 font-bold text-4xl">
            WEBSITE KEGIATAN DOSEN
        </div>
        <div
            class="w-[600px] h-[600px] flex justify-center items-center flex-col bg-white rounded-xl shadow-xl"
        >
            <div class="text-4xl font-bold">LOGIN</div>
            <form action="">
                <div class="mt-14">
                    <input
                        type="text"
                        placeholder="Username"
                        class="border border-slate-950 p-4 w-[400px] text-xl"
                    />
                </div>
                <div class="mt-5">
                    <input
                        type="password"
                        placeholder="password"
                        class="border border-slate-950 p-4 w-[400px] text-xl"
                    />
                </div>
                <div class="mt-10 flex items-center justify-center">
                    <button
                        class="bg-green-300 hover:bg-green-400 w-[200px] border border-black p-6 text-xl font-semibold"
                    >
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>
