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
                <main class="p-6">
                    <h1 class="text-2xl font-semibold mb-4">TODOリスト</h1>

                    <!-- モーダル部分ここから -->
                    <div x-data="{ open: false }">
                        <!-- ボタン -->
                        <button @click="open = true"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">
                            ＋ 新規追加
                        </button>

                        <!-- モーダルの背景 -->
                        <div x-show="open" x-transition.opacity
                            class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                            <!-- モーダル本体 -->
                            <div @click.away="open = false" x-transition
                                class="bg-white rounded-lg shadow p-6 w-full max-w-md">
                                <h2 class="text-xl font-bold mb-4">TODOを追加</h2>
                                <input type="text" placeholder="タイトル"
                                    class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring focus:border-blue-300">
                                <div class="flex justify-end space-x-2">
                                    <button @click="open = false"
                                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">キャンセル</button>
                                    <button
                                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">追加</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- モーダル部分ここまで -->

                    <p class="text-gray-600 mt-6">ここにTODOリストの内容が入ります</p>
                </main>
            </main>
        </div>
    </div>
</x-app-layout>
