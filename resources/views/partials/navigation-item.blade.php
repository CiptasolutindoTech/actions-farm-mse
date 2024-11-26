<div class="relative group">
    <!-- Menu Induk -->
    <a href="{{ $menu->id }}" class="nav-link {{ request()->is($menu->id) ? 'bg-blue-200 text-blue-700 rounded px-2 py-1' : '' }}">
        {{ $menu->text }}
    </a>

    <!-- Jika menu memiliki children -->
    @if ($menu->children->isNotEmpty())
        <div class="absolute left-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 shadow-lg rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            @foreach ($menu->children as $child)
                <!-- Menu Anak -->
                <a href="{{ $child->id }}"
                   class="dropdown-link {{ request()->is($child->id) ? 'bg-blue-200 text-blue-700 rounded px-2 py-1' : '' }} block py-2 px-4 hover:bg-blue-100 dark:hover:bg-gray-700">
                    {{ $child->text }}
                </a>

                <!-- Jika anak menu memiliki sub-child -->
                @if ($child->children->isNotEmpty())
                    <!-- Sub-Child akan muncul hanya ketika menu anak di-hover -->
                    <div class="absolute left-48 top-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 shadow-lg rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        @foreach ($child->children as $subChild)
                            <!-- Sub-Child -->
                            <a href="{{ $subChild->id }}"
                               class="text-gray-600 dark:text-gray-300 block px-4 py-2 hover:bg-blue-100 dark:hover:bg-gray-700">
                                {{ $subChild->text }}
                            </a>

                            <!-- Jika subChild memiliki lebih dalam lagi (sub-sub-child) -->
                            @if ($subChild->children->isNotEmpty())
                                <div class="absolute left-48 top-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 shadow-lg rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    @foreach ($subChild->children as $subSubChild)
                                        <!-- Sub-Sub-Child -->
                                        <a href="{{ $subSubChild->id }}"
                                           class="text-gray-600 dark:text-gray-300 block px-4 py-2 hover:bg-blue-100 dark:hover:bg-gray-700">
                                            {{ $subSubChild->text }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
