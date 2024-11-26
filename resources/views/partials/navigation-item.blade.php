<div class="relative group" x-data="{ openMenu: false }">
    <!-- Menu Induk -->
    <a href="{{ $menu->id }}" class="nav-link {{ request()->is($menu->id) ? 'bg-blue-200 text-blue-700 rounded px-2 py-1' : '' }}" @click.prevent="openMenu = !openMenu">
        {{ $menu->text }}
    </a>

    <!-- Dropdown Menu (only visible when openMenu is true) -->
    @if ($menu->children->isNotEmpty())
        <div x-show="openMenu" x-transition class="absolute left-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 shadow-lg rounded-lg">
            @foreach ($menu->children as $child)
                <!-- Menu Anak -->
                <div x-data="{ openChild: false }">
                    <a href="{{ $child->id }}"
                       class="dropdown-link {{ request()->is($child->id) ? 'bg-blue-200 text-blue-700 rounded px-2 py-1' : '' }} block py-2 px-4 hover:bg-blue-100 dark:hover:bg-gray-700"
                       @click.prevent="openChild = !openChild">
                        {{ $child->text }}

                        <!-- Toggle symbol if there are children -->
                        @if ($child->children->isNotEmpty())
                            <span class="ml-2 text-gray-500 dark:text-gray-300"> &gt; </span>
                        @endif
                    </a>

                    <!-- Dropdown for Child -->
                    @if ($child->children->isNotEmpty())
                        <div x-show="openChild" x-transition class="absolute left-48 top-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 shadow-lg rounded-lg">
                            @foreach ($child->children as $subChild)
                                <!-- Sub-Child -->
                                <div x-data="{ openSubChild: false }">
                                    <a href="{{ $subChild->id }}"
                                       class="text-gray-600 dark:text-gray-300 block px-4 py-2 hover:bg-blue-100 dark:hover:bg-gray-700"
                                       @click.prevent="openSubChild = !openSubChild">
                                        {{ $subChild->text }}

                                        <!-- Toggle symbol if there are children -->
                                        @if ($subChild->children->isNotEmpty())
                                            <span class="ml-2 text-gray-500 dark:text-gray-300"> &gt; </span>
                                        @endif
                                    </a>

                                    <!-- Dropdown for Sub-Child -->
                                    @if ($subChild->children->isNotEmpty())
                                        <div x-show="openSubChild" x-transition class="absolute left-48 top-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 shadow-lg rounded-lg">
                                            @foreach ($subChild->children as $subSubChild)
                                                <!-- Sub-Sub-Child -->
                                                <a href="{{ $subSubChild->id }}"
                                                   class="text-gray-600 dark:text-gray-300 block px-4 py-2 hover:bg-blue-100 dark:hover:bg-gray-700">
                                                    {{ $subSubChild->text }}
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
