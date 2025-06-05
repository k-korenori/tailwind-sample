<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r hidden md:block">
            <div class="p-4 font-bold text-lg border-b">メニュー</div>
            <nav class="p-4 space-y-2">
                <a href="#" class="block text-gray-700 hover:text-blue-600">Dashboard</a>
                <a href="#" class="block text-gray-700 hover:text-blue-600">TODOリスト</a>
            </nav>
        </div>

        <!-- Main -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <div class="text-xl font-bold">ダッシュボード</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700">ログアウト</button>
                </form>
            </header>

            <!-- Content -->
            <main class="p-6">
                <h1 class="text-2xl font-semibold mb-4">TODOリスト</h1>
                <p class="text-gray-600">ここにTODOリストの内容が入ります</p>
            </main>
        </div>
    </div>
</x-app-layout>