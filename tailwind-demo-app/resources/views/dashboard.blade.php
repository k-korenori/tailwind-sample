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
                            <form method="POST" action="{{ route('todos.store') }}">
                                @csrf
                                <input name="title" type="text" placeholder="タイトル"
                                    class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring focus:border-blue-300"
                                    required>
                                <div class="flex justify-end space-x-2">
                                    <button type="button" @click="open = false"
                                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                                        キャンセル
                                    </button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-500 rounded hover:bg-blue-600">
                                        追加
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- モーダル部分ここまで -->

                <!-- 一覧表示 -->
                <ul class="space-y-2">
                    @forelse($todos as $todo)
                        <li class="bg-white rounded shadow p-3 flex justify-between items-center">
                            <span>{{ $todo->title }}</span>
                            @if ($todo->is_done)
                                <span class="text-green-500 text-sm">完了</span>
                            @endif
                        </li>
                    @empty
                        <li class="text-gray-500">TODOはまだあああありません</li>
                    @endforelse
                </ul>
            </main>
        </div>
    </div>
</x-app-layout>
