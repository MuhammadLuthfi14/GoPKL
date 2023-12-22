<div class="relative z-50 h-full">
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content bg-primary h-screen">
            <!-- Page content here -->
            <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden fas fa-bars"></label>
        </div>
        <div class="drawer-side text-white ">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu min-h-full justify-between bg-primary px-6 lg:px-12 lg:w-80">
                <!-- Sidebar content here -->
                <div class="grid gap-6 lg:gap-12">
                    <a class="flex flex-col gap-y-3 justify-center items-center pt-10 lg:flex-row"
                        href="{{ route('VerifSiswa') }}">
                        <div>
                            <i class="fas fa-laugh-wink text-6xl -rotate-12"></i>
                        </div>
                        <div class="sidebar-brand-text text-2xl font-bold mx-2">
                            {{ auth()->user()->name }}
                        </div>
                    </a>
                    <div class="grid gap-4 opacity-60 border-y-2 py-5">
                        <li>
                            <details>
                                <summary>
                                    <i class="fas fa-check text-3xl"></i>
                                    <a class="hidden lg:block">Verifikasi Data</a>
                                </summary>
                                <ul class="p-2">
                                    <li><a href="{{ route('VerifSiswa') }}">Siswa</a></li>
                                    <li><a href="{{ route('VerifGuru') }}">Guru</a></li>
                                    <li><a href="{{ route('VerifPerusahaan') }}">Perusahaan</a></li>
                                </ul>
                            </details>
                        </li>
                        <li>
                            <div>
                                <a class="flex space-x-3 items-center" href="{{ route('pembimbing') }}">
                                    <i class="fas fa-school text-3xl"></i>
                                    <span class="hidden lg:block">Pembimbing</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a class="flex space-x-3 items-center" href="{{ route('siswa') }}">
                                    <i class="fas fa-users text-3xl"></i>
                                    <span class="hidden lg:block">Siswa</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a class="flex space-x-3 items-center" href="{{ route('guru') }}">
                                    <i class="fas fa-chalkboard-user text-3xl"></i>
                                    <span class="hidden lg:block">Guru</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div><a class="flex space-x-3 items-center" href="{{ route('perusahaan') }}">
                                    <i class="fas fa-industry text-3xl"></i>
                                    <span class="hidden lg:block">Perusahaan</span>
                                </a></div>
                        </li>
                    </div>
                </div>
                <div class="flex justify-center items-center pb-6">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn text-primary rounded-full font-bold">Log out</button>
                    </form>
                </div>

            </ul>
        </div>
    </div>
</div>
