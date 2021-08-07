@include('header')
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="p-12">
            <div class="flex items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <div class="ml-4 text-lg leading-7 font-semibold">
                    <a href="{{url('/viajes')}}" class="underline text-gray-900 ">Viajes</a>
                </div>
            </div>

            <table class="table" border="1" width="100%">
                <thead>
                    <th>Email</th>
                    <th>Fecha</th>
                    <th>Pais</th>
                    <th>Ciudad</th>
                </thead>
                <tbody>
                    @forelse ($data as $viaje)
                        <tr>
                            <td>{{ $viaje->email }}</td>
                            <td>{{ $viaje->fecha }}</td>
                            <td>{{ $viaje->pais }}</td>
                            <td>{{ $viaje->ciudad }}</td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <p class="">No records...</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $data->links() }}

        </div>
    </div>
@include('footer')
